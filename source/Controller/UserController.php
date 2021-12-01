<?php
namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Manager\UserManager;
use Chloe\Marvel\Model\Entity\User;
use function Chloe\Marvel\Controller\Traits\getRandomName;

class UserController {

    use ReturnViewTrait;

    /**
     * Account page
     * @param int $id
     */
    public function account() {
        $this->return("account", "Mon compte");
    }

    public function update($fields, $files) {
        $userManager = new UserManager();
        if (isset($_SESSION["id"])) {
            $userInfo = $userManager->getUserID($_SESSION['id']);
            if (isset($fields['id'], $fields['pseudo'], $fields['email'], $files['picture'], $fields['picture_1'])) {

                $id = intval($fields['id']);
                $pseudo = htmlentities(ucfirst(trim($fields['pseudo'])));
                $email = htmlentities(trim($fields['email']));
                $picture_1 = $fields['picture_1'];

                // Check if the email is valid.
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // I check if all the photos are not empty
                    if (!empty($files['picture']['name'])) {
                        // Check if the image is of the correct type
                        if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                            $maxSize = 10 * 1024 * 1024; // = 10 Mo

                            // Check if the image is below 10Mo.
                            if ($files['picture']['size'] <= $maxSize) {
                                $tmpName = $files['picture']['tmp_name'];

                                // Give a random name to the image.
                                $namePicture = getRandomName($files['picture']['name']);

                                // The image is added to a folder.
                                move_uploaded_file($tmpName, "./assets/img/user/" . $namePicture);

                                // Remove image
                                if ($picture_1 !== '' && $picture_1 !== null) {
                                    unlink("./assets/img/user/" . $picture_1);
                                }

                                $user = new User($id, $pseudo, $email, $namePicture);
                                $userManager->updateUser($user);

                                header("Location: ../index.php?controller=user&action=view&success=2");
                            } else {
                                header("Location: ../index.php?controller=user&action=updateAccount&id=$id&error=0");
                            }
                        } else {
                            header("Location: ../index.php?controller=user&action=updateAccount&id=$id&error=1");
                        }
                    } else {
                        $user = new User($id, $pseudo, $email, $picture_1);
                        $userManager->updateUser($user);

                        header("Location: ../index.php?controller=user&action=view&success=2");
                    }
                } else {
                    header("Location: ../index.php?controller=user&action=updateAccount&id=" . $_SESSION['id'] . "&error=2");
                }
            }
            $this->return('update/updateAccount', "Modification des informations personnelles", ['user' => $userInfo]);
        }
    }

}