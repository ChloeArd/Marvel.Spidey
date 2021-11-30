<?php

namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Entity\Actor;
use Chloe\Marvel\Model\Manager\ActorManager;
use Chloe\Marvel\Model\Manager\PictureActorManager;
use Chloe\Marvel\Model\Manager\UserManager;
use function Chloe\Marvel\Controller\Traits\getRandomName;

class ActorController {

    use ReturnViewTrait;

    /**
     * display all characters, actors, creators
     */
    public function actor($id) {
        $manager = new ActorManager();
        $actor = $manager->getActorId($id);
        $title = $manager->getActor($id);
        $manager = new PictureActorManager();
        $picture = $manager->getPicturesActor($id);
        $this->return("actor", $title->getFirstname() . " " . $title->getLastname(), ["actor" => $actor, "picture" => $picture]);
    }

    /**
     * add a actor
     * @param $actor
     * @param $files
     * @throws \Exception
     */
    public function add($actor, $files) {
        if (isset($actor['send'])) {
            if (isset($actor['firstname'], $actor['lastname'], $files['picture'], $actor['birthName'], $actor['birth'], $actor['nationality'],
                $actor['profession'], $actor['biography'], $actor['movies'], $actor['awards'], $files['picture1'], $files['picture2'],
                $files['picture3'], $actor['user_fk'])) {

                $actorManager = new ActorManager();
                $userManager = new UserManager();

                $firstname = htmlentities(ucfirst(trim($actor['firstname'])));
                $lastname = htmlentities(ucfirst(trim($actor['lastname'])));
                $birthName = htmlentities(ucfirst(trim($actor['birthName'])));
                $birth = htmlentities(ucfirst(trim($actor['birth'])));
                $nationality = htmlentities(ucfirst(trim($actor['nationality'])));
                $profession= htmlentities(ucfirst(trim($actor['profession'])));
                $movies = $actor['movies'];
                $awards = $actor['awards'];
                $biography = $actor['biography'];
                $user_fk = intval($actor['user_fk']);

                // I check if all the photos are not empty
                if (!empty($files['picture']['name']) && !empty($files['picture1']['name']) && !empty($files['picture2']['name']) && !empty($files['picture3']['name'])) {
                    // Check if the image is of the correct type
                    if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture1']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture2']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture3']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                        $maxSize = 10 * 1024 * 1024; // = 10 Mo

                        // Check if the image is below 10Mo.
                        if ($files['picture']['size'] <= $maxSize && $files['picture1']['size'] <= $maxSize && $files['picture2']['size'] <= $maxSize && $files['picture3']['size'] <= $maxSize) {
                            $tmpName1 = $files['picture']['tmp_name'];
                            $tmpName2 = $files['picture1']['tmp_name'];
                            $tmpName3 = $files['picture2']['tmp_name'];
                            $tmpName4 = $files['picture3']['tmp_name'];

                            // Give a random name to the image.
                            $namePicture1 = getRandomName($files['picture']['name']);
                            $namePicture2 = getRandomName($files['picture1']['name']);
                            $namePicture3 = getRandomName($files['picture2']['name']);
                            $namePicture4 = getRandomName($files['picture3']['name']);

                            // The image is added to a folder.
                            move_uploaded_file($tmpName1, "./assets/img/actor/" . $namePicture1);
                            move_uploaded_file($tmpName2, "./assets/img/actor/" . $namePicture2);
                            move_uploaded_file($tmpName3, "./assets/img/actor/" . $namePicture3);
                            move_uploaded_file($tmpName4, "./assets/img/actor/" . $namePicture4);

                            $user_fk = $userManager->getUser($user_fk);
                            if ($user_fk->getId()) {
                                $a = new Actor(null, $firstname, $lastname, $namePicture1, $birthName, $birth, $nationality, $profession, $movies, $biography, $awards, $namePicture2, $namePicture3, $namePicture4, $user_fk);
                                $actorManager->add($a);

                                header("Location: ../index.php?controller=character&action=viewAll&success=2");
                            }
                        } else {
                            header("Location: ../index.php?controller=actor&action=add&error=0");
                        }
                    } else {
                        header("Location: ../index.php?controller=actor&action=add&error=1");
                    }
                } else {
                    header("Location: ../index.php?controller=actor&action=add&error=2");
                }
            } else {
                header("Location: ../index.php?controller=actor&action=add&error=3");
            }
        }
        $this->return("create/createActor", "Ajouter un(e) acteur/rice");
    }

    public function update($actor, $files) {
        $id = $_GET['id'];
        if (isset($actor['send'])) {
            if (isset($actor['id'], $actor['firstname'], $actor['lastname'], $files['picture'], $actor['picture_1'], $actor['birthName'], $actor['birth'], $actor['nationality'],
                $actor['profession'], $actor['biography'], $actor['movies'], $actor['awards'], $files['picture1'], $actor['picture_2'], $files['picture2'], $actor['picture_3'],
                $files['picture3'], $actor['picture_4'])) {

                $actorManager = new ActorManager();
                $userManager = new UserManager();

                $id = intval($actor['id']);
                $firstname = htmlentities(ucfirst(trim($actor['firstname'])));
                $lastname = htmlentities(ucfirst(trim($actor['lastname'])));
                $birthName = htmlentities(ucfirst(trim($actor['birthName'])));
                $birth = htmlentities(ucfirst(trim($actor['birth'])));
                $nationality = htmlentities(ucfirst(trim($actor['nationality'])));
                $profession= htmlentities(ucfirst(trim($actor['profession'])));
                $movies = $actor['movies'];
                $awards = $actor['awards'];
                $biography = $actor['biography'];
                $picture_1 = $actor['picture_1'];
                $picture_2 = $actor['picture_2'];
                $picture_3 = $actor['picture_3'];
                $picture_4 = $actor['picture_4'];

                // I check if all the photos are not empty
                if (!empty($files['picture']['name']) && !empty($files['picture1']['name']) && !empty($files['picture2']['name']) && !empty($files['picture3']['name'])) {
                    // Check if the image is of the correct type
                    if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture1']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture2']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture3']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                        $maxSize = 10 * 1024 * 1024; // = 10 Mo

                        // Check if the image is below 10Mo.
                        if ($files['picture']['size'] <= $maxSize && $files['picture1']['size'] <= $maxSize && $files['picture2']['size'] <= $maxSize && $files['picture3']['size'] <= $maxSize) {
                            $tmpName1 = $files['picture']['tmp_name'];
                            $tmpName2 = $files['picture1']['tmp_name'];
                            $tmpName3 = $files['picture2']['tmp_name'];
                            $tmpName4 = $files['picture3']['tmp_name'];

                            // Give a random name to the image.
                            $namePicture1 = getRandomName($files['picture']['name']);
                            $namePicture2 = getRandomName($files['picture1']['name']);
                            $namePicture3 = getRandomName($files['picture2']['name']);
                            $namePicture4 = getRandomName($files['picture3']['name']);

                            // The image is added to a folder.
                            move_uploaded_file($tmpName1, "./assets/img/actor/" . $namePicture1);
                            move_uploaded_file($tmpName2, "./assets/img/actor/" . $namePicture2);
                            move_uploaded_file($tmpName3, "./assets/img/actor/" . $namePicture3);
                            move_uploaded_file($tmpName4, "./assets/img/actor/" . $namePicture4);

                            // Removes images that are changed
                            unlink("./assets/img/actor/" . $picture_1);
                            unlink("./assets/img/actor/" . $picture_2);
                            unlink("./assets/img/actor/" . $picture_3);
                            unlink("./assets/img/actor/" . $picture_4);

                            $a = new Actor($id, $firstname, $lastname, $namePicture1, $birthName, $birth, $nationality, $profession, $movies, $biography, $awards, $namePicture2, $namePicture3, $namePicture4);
                            $actorManager->update($a);

                            header("Location: ../index.php?controller=actor&action=view&id=$id&success=0");
                        } else {
                            header("Location: ../index.php?controller=actor&action=update&id=$id&error=0");
                        }
                    } else {
                        header("Location: ../index.php?controller=actor&action=update&id=$id&error=1");
                    }
                } else {
                    $a = new Actor($id, $firstname, $lastname, $picture_1, $birthName, $birth, $nationality, $profession, $movies, $biography, $awards, $picture_2, $picture_3, $picture_4);
                    $actorManager->update($a);

                    header("Location: ../index.php?controller=actor&action=view&id=$id&success=0");
                }
            } else {
                header("Location: ../index.php?controller=actor&action=update&id=$id&error=3");
            }
        }
        $this->return("update/updateActor", "Modifier un(e) acteur/rice");
    }

    /**
     * delete a actor
     * @param $actor
     */
    public function delete ($actor) {
        if (isset($_SESSION["id"])) {
            if (isset($actor['id'], $actor['picture'], $actor['picture1'], $actor['picture2'], $actor['picture3'])) {
                $actorManager = new ActorManager();

                $id = intval($actor['id']);
                $picture = htmlentities($actor['picture']);
                $picture1 = htmlentities($actor['picture1']);
                $picture2 = htmlentities($actor['picture2']);
                $picture3 = htmlentities($actor['picture3']);

                unlink("./assets/img/actor/" . $picture);
                unlink("./assets/img/actor/" . $picture1);
                unlink("./assets/img/actor/" . $picture2);
                unlink("./assets/img/actor/" . $picture3);

                $actorManager->delete($id);
                header("Location: ../index.php?controller=character&action=viewAll&success=4");
            }
            $this->return("delete/deleteActor", "Supprimer un(e) acteur/rice");
        }
    }
}