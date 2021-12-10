<?php

namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Entity\Creator;
use Chloe\Marvel\Model\Manager\CreatorManager;
use Chloe\Marvel\Model\Manager\UserManager;
use function Chloe\Marvel\Controller\Traits\getRandomName;

class CreatorController {

    use ReturnViewTrait;

    /**
     * add a creator
     * @param $creator
     * @param $files
     */
    public function add($creator, $files) {
        if (isset($creator['send'])) {
            if (isset($creator['firstname'], $creator['lastname'], $files['picture'], $creator['user_fk'])) {

                $creatorManager = new CreatorManager();
                $userManager = new UserManager();

                $firstname = htmlentities(ucfirst(trim($creator['firstname'])));
                $lastname = htmlentities(ucfirst(trim($creator['lastname'])));
                $user_fk = intval($creator['user_fk']);

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
                            move_uploaded_file($tmpName, "./assets/img/creator/" . $namePicture);

                            $user_fk = $userManager->getUser($user_fk);
                            if ($user_fk->getId()) {
                                $c = new Creator(null, $firstname, $lastname, $namePicture, $user_fk);
                                $creatorManager->add($c);

                                header("Location: ../index.php?controller=character&action=viewAll&success=2");
                            }
                        } else {
                            header("Location: ../index.php?controller=creator&action=add&error=0");
                        }
                    } else {
                        header("Location: ../index.php?controller=creator&action=add&error=1");
                    }
                } else {
                    header("Location: ../index.php?controller=creator&action=add&error=2");
                }
            } else {
                header("Location: ../index.php?controller=creator&action=add&error=3");
            }
        }
        $this->return("create/createCreator", "Ajouter un(e) créateur/rice");
    }

    /**
     * update a creator
     * @param $creator
     * @param $files
     */
    public function update($creator, $files) {
        $id = intval($_GET['id']);
        if (isset($creator['send'])) {
            if (isset($creator['id'], $creator['firstname'], $creator['lastname'], $files['picture'], $creator['picture_1'])) {

                $creatorManager = new CreatorManager();
                $userManager = new UserManager();

                $id = intval($creator['id']);
                $firstname = htmlentities(ucfirst(trim($creator['firstname'])));
                $lastname = htmlentities(ucfirst(trim($creator['lastname'])));
                $picture_1 = $creator['picture_1'];

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
                            move_uploaded_file($tmpName, "./assets/img/creator/" . $namePicture);

                            // Remove image
                            unlink("./assets/img/creator/" . $picture_1);

                            $c = new Creator($id, $firstname, $lastname, $namePicture);
                            $creatorManager->update($c);

                            header("Location: ../index.php?controller=character&action=viewAll&success=2");
                        } else {
                            header("Location: ../index.php?controller=creator&action=update&id=$id&error=0");
                        }
                    } else {
                        header("Location: ../index.php?controller=creator&action=update&id=$id&error=1");
                    }
                } else {
                        $c = new Creator($id, $firstname, $lastname, $picture_1);
                        $creatorManager->update($c);

                        header("Location: ../index.php?controller=character&action=viewAll&success=2");
                }
            } else {
                header("Location: ../index.php?controller=creator&action=update&id=$id&error=2");
            }
        }
        $this->return("update/updateCreator", "Modifier un(e) créateur/rice");
    }

    /**
     * delete a creator
     * @param $creator
     */
    public function delete ($creator) {
        if (isset($_SESSION["id"])) {
            if (isset($creator['id'], $creator['picture'])) {
                $creatorManager = new CreatorManager();

                $id = intval($creator['id']);
                $picture = htmlentities($creator['picture']);

                unlink("./assets/img/creator/" . $picture);

                $creatorManager->delete($id);
                header("Location: ../index.php?controller=character&action=viewAll&success=5");
            }
            $this->return("delete/deleteCreator", "Supprimer un(e) créateur/rice");
        }
    }
}