<?php

namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Entity\Characters;
use Chloe\Marvel\Model\Manager\ActorCharactersManager;
use Chloe\Marvel\Model\Manager\ActorManager;
use Chloe\Marvel\Model\Manager\CharactersManager;
use Chloe\Marvel\Model\Manager\CreatorCharactersManager;
use Chloe\Marvel\Model\Manager\CreatorManager;
use Chloe\Marvel\Model\Manager\UserManager;
use function Chloe\Marvel\Controller\Traits\getRandomName;

class CharactersController {

    use ReturnViewTrait;

    /**
     * display all characters, actors, creators
     */
    public function charactersPage() {
        $manager = new CharactersManager();
        $characters = $manager->getCharacters();
        $manager = new ActorManager();
        $actors = $manager->getActors();
        $manager = new CreatorManager();
        $creators = $manager->getCreators();
        $this->return("characters", "Les personnages", ["characters" => $characters, "actors" => $actors, "creators" => $creators]);
    }

    public function character($id) {
        $manager = new CharactersManager();
        $title = $manager->getCharacter($id);
        $character = $manager->getCharacterId($id);
        $manager = new CreatorCharactersManager();
        $creator = $manager->getCreatorsCharacter($id);
        $manager = new ActorCharactersManager();
        $actor = $manager->getActorsCharacters($id);
        $this->return("character", $title->getPseudo() . " - " . $title->getFirstname() . " " . $title->getLastname(), ["character" => $character, "creator" => $creator, "actor" => $actor]);
    }

    /** create a character
     * @param $character
     * @param $files
     */
    public function add($character, $files) {
        if (isset($character['send'])) {
            if (isset($character['pseudo'], $character['firstname'], $character['lastname'], $files['picture'], $character['species'],
                $character['sex'], $character['size'], $character['size2'], $character['hair'], $character['eyes'], $character['origin'], $character['place'],
                $files['picturesBook'], $character['titleBook'], $character['activity'], $character['powers'], $character['parent'], $character['biography'], $files['picture1'], $files['picture2'],
                $files['picture3'], $character['user_fk'])) {

                $characterManager = new CharactersManager();
                $userManager = new UserManager();

                $pseudo = htmlentities(ucfirst(trim($character['pseudo'])));
                $firstname = htmlentities(ucfirst(trim($character['firstname'])));
                $lastname = htmlentities(ucfirst(trim($character['lastname'])));
                $species = htmlentities(ucfirst(trim($character['species'])));
                $sex = htmlentities(ucfirst(trim($character['sex'])));
                $size1 = htmlentities(trim($character['size']));
                $size2 = htmlentities(trim($character['size2']));
                $origin = htmlentities(ucfirst(trim($character['origin'])));
                $place = htmlentities(ucfirst(trim($character['place'])));
                $titleBook = htmlentities(ucfirst(trim($character['titleBook'])));
                $activity = htmlentities(ucfirst(trim($character['activity'])));
                $powers = $character['powers'];
                $parent = htmlentities(ucfirst(trim($character['parent'])));
                $biography = $character['biography'];
                $user_fk = intval($character['user_fk']);


                if (0 <= intval($size1) || intval($size1) <= 2 && 0 <= intval($size2) || intval($size2) <= 99) {
                    if (intval($size2) < 10) {
                        $size2 = "0" . $size2;
                    }
                    $size = $size1 . "m" . $size2;
                } else {
                    header("Location: ../index.php?controller=character&action=add&error=6");
                }

                if ($character['sex'] === "") {
                    header("Location: ../index.php?controller=character&action=add&error=7");
                }

                // We recover the hair colors, which has a maximum of 3 colors
                if (count($character['hair']) === 1) {
                    $hair = $character['hair'][0];
                } elseif (count($character['hair']) === 2) {
                    $hair = $character['hair'][0] . " et " . $character['hair'][1];
                } elseif (count($character['hair']) === 3) {
                    $hair = $character['hair'][0] . ", " . $character['hair'][1] . " et " . $character['hair'][2];
                } else {
                    header("Location: ../index.php?controller=character&action=add&error=0");
                }

                // We recover the eyes color
                if (count($character['eyes']) === 1) {
                    $eyes = $character['eyes'][0];
                } else {
                    header("Location: ../index.php?controller=character&action=add&error=1");
                }

                // Non-mandatory criteria
                if (isset($character['characteristic'])) {
                    $characteristic = htmlentities(ucfirst(trim($character['characteristic'])));
                } else {
                    $characteristic = "";
                }

                if (isset($character['team'])) {
                    $team = htmlentities(ucfirst(trim($character['team'])));
                } else {
                    $team = "";
                }

                if (isset($character['situation'])) {
                    $situation = htmlentities(ucfirst(trim($character['situation'])));
                } else {
                    $situation = "";
                }

                // I check if all the photos are not empty
                if (!empty($files['picture']['name']) && !empty($files['picturesBook']['name']) && !empty($files['picture1']['name']) && !empty($files['picture2']['name']) && !empty($files['picture3']['name'])) {
                    // Check if the image is of the correct type
                    if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picturesBook']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture1']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture2']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture3']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                        $maxSize = 10 * 1024 * 1024; // = 10 Mo

                        // Check if the image is below 10Mo.
                        if ($files['picture']['size'] <= $maxSize && $files['picturesBook']['size'] <= $maxSize && $files['picture1']['size'] <= $maxSize && $files['picture2']['size'] <= $maxSize && $files['picture3']['size'] <= $maxSize) {
                            $tmpName1 = $files['picture']['tmp_name'];
                            $tmpName2 = $files['picturesBook']['tmp_name'];
                            $tmpName3 = $files['picture1']['tmp_name'];
                            $tmpName4 = $files['picture2']['tmp_name'];
                            $tmpName5 = $files['picture3']['tmp_name'];

                            // Give a random name to the image.
                            $namePicture1 = getRandomName($files['picture']['name']);
                            $namePicture2 = getRandomName($files['picturesBook']['name']);
                            $namePicture3 = getRandomName($files['picture1']['name']);
                            $namePicture4 = getRandomName($files['picture2']['name']);
                            $namePicture5 = getRandomName($files['picture3']['name']);

                            // The image is added to a folder.
                            move_uploaded_file($tmpName1, "./assets/img/characters/" . $namePicture1);
                            move_uploaded_file($tmpName2, "./assets/img/characters/book/" . $namePicture2);
                            move_uploaded_file($tmpName3, "./assets/img/characters/" . $namePicture3);
                            move_uploaded_file($tmpName4, "./assets/img/characters/" . $namePicture4);
                            move_uploaded_file($tmpName5, "./assets/img/characters/" . $namePicture5);

                            $user_fk = $userManager->getUser($user_fk);
                            if ($user_fk->getId()) {
                                $c = new Characters(null, $pseudo, $firstname, $lastname, $namePicture1, $species, $sex, $size, $hair, $eyes, $origin, $place, $namePicture2, $titleBook, $activity, $characteristic, $powers, $team, $parent, $situation, $biography, $namePicture3, $namePicture4, $namePicture5, $user_fk);
                                $characterManager->add($c);

                                header("Location: ../index.php?controller=character&action=viewAll&success=0");
                            }
                        } else {
                            header("Location: ../index.php?controller=character&action=add&error=2");
                        }
                    } else {
                        header("Location: ../index.php?controller=character&action=add&error=3");
                    }
                } else {
                    header("Location: ../index.php?controller=character&action=add&error=4");
                }
            } else {
                header("Location: ../index.php?controller=character&action=add&error=5");
            }
        }
        $this->return("create/createCharacter", "Ajouter un personnage");
    }

    /**
     * update a character
     * @param $character
     * @param $files
     */
    public function update($character, $files) {
        $id = $_GET['id'];
        if (isset($character['send'])) {
            if (isset($character['id'], $character['pseudo'], $character['firstname'], $character['lastname'], $character['picture_1'], $files['picture'], $character['species'],
                $character['sex'], $character['size'], $character['size2'], $character['hair'], $character['eyes'], $character['origin'], $character['place'],
                $character['picture_2'], $files['picturesBook'], $character['titleBook'], $character['activity'], $character['powers'], $character['parent'], $character['biography'],
                $character['picture_3'], $files['picture1'], $character['picture_4'], $files['picture2'], $character['picture_5'], $files['picture3'], $character['user_fk'])) {

                $characterManager = new CharactersManager();
                $userManager = new UserManager();

                $id = intval($character['id']);
                $pseudo = htmlentities(ucfirst(trim($character['pseudo'])));
                $firstname = htmlentities(ucfirst(trim($character['firstname'])));
                $lastname = htmlentities(ucfirst(trim($character['lastname'])));
                $species = htmlentities(ucfirst(trim($character['species'])));
                $sex = htmlentities(ucfirst(trim($character['sex'])));
                $size1 = htmlentities(trim($character['size']));
                $size2 = htmlentities(trim($character['size2']));
                $origin = htmlentities(ucfirst(trim($character['origin'])));
                $place = htmlentities(ucfirst(trim($character['place'])));
                $titleBook = htmlentities(ucfirst(trim($character['titleBook'])));
                $activity = htmlentities(ucfirst(trim($character['activity'])));
                $powers = $character['powers'];
                $parent = htmlentities(ucfirst(trim($character['parent'])));
                $biography = $character['biography'];
                $user_fk = intval($character['user_fk']);
                $picture_1 = $character['picture_1'];
                $picture_2 = $character['picture_2'];
                $picture_3 = $character['picture_3'];
                $picture_4 = $character['picture_4'];
                $picture_5 = $character['picture_5'];


                if (0 <= intval($size1) || intval($size1) <= 2 && 0 <= intval($size2) || intval($size2) <= 99) {
                    if (intval($size2) < 10) {
                        $size2 = "0" . $size2;
                    }
                    $size = $size1 . "m" . $size2;
                } else {
                    header("Location: ../index.php?controller=character&action=update&id=$id&error=6");
                }

                if ($character['sex'] === "") {
                    header("Location: ../index.php?controller=character&action=update&id=$id&error=7");
                }

                // We recover the hair colors, which has a maximum of 3 colors
                if (count($character['hair']) === 1) {
                    $hair = $character['hair'][0];
                } elseif (count($character['hair']) === 2) {
                    $hair = $character['hair'][0] . " et " . $character['hair'][1];
                } elseif (count($character['hair']) === 3) {
                    $hair = $character['hair'][0] . ", " . $character['hair'][1] . " et " . $character['hair'][2];
                } else {
                    header("Location: ../index.php?controller=character&action=update&id=$id&error=0");
                }

                // We recover the eyes color
                if (count($character['eyes']) === 1) {
                    $eyes = $character['eyes'][0];
                } else {
                    header("Location: ../index.php?controller=character&action=update&id$id&error=1");
                }

                // Non-mandatory criteria
                if (isset($character['characteristic'])) {
                    $characteristic = htmlentities(ucfirst(trim($character['characteristic'])));
                } else {
                    $characteristic = "";
                }

                if (isset($character['team'])) {
                    $team = htmlentities(ucfirst(trim($character['team'])));
                } else {
                    $team = "";
                }

                if (isset($character['situation'])) {
                    $situation = htmlentities(ucfirst(trim($character['situation'])));
                } else {
                    $situation = "";
                }

                // I check if all the photos are not empty
                if (!empty($files['picture']['name']) && !empty($files['picturesBook']['name']) && !empty($files['picture1']['name']) && !empty($files['picture2']['name']) && !empty($files['picture3']['name'])) {
                    // Check if the image is of the correct type
                    if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picturesBook']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture1']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture2']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"]) && in_array($files['picture3']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                        $maxSize = 10 * 1024 * 1024; // = 10 Mo

                        // Check if the image is below 10Mo.
                        if ($files['picture']['size'] <= $maxSize && $files['picturesBook']['size'] <= $maxSize && $files['picture1']['size'] <= $maxSize && $files['picture2']['size'] <= $maxSize && $files['picture3']['size'] <= $maxSize) {
                            $tmpName1 = $files['picture']['tmp_name'];
                            $tmpName2 = $files['picturesBook']['tmp_name'];
                            $tmpName3 = $files['picture1']['tmp_name'];
                            $tmpName4 = $files['picture2']['tmp_name'];
                            $tmpName5 = $files['picture3']['tmp_name'];

                            // Give a random name to the image.
                            $namePicture1 = getRandomName($files['picture']['name']);
                            $namePicture2 = getRandomName($files['picturesBook']['name']);
                            $namePicture3 = getRandomName($files['picture1']['name']);
                            $namePicture4 = getRandomName($files['picture2']['name']);
                            $namePicture5 = getRandomName($files['picture3']['name']);

                            // The image is added to a folder.
                            move_uploaded_file($tmpName1, "./assets/img/characters/" . $namePicture1);
                            move_uploaded_file($tmpName2, "./assets/img/characters/book/" . $namePicture2);
                            move_uploaded_file($tmpName3, "./assets/img/characters/" . $namePicture3);
                            move_uploaded_file($tmpName4, "./assets/img/characters/" . $namePicture4);
                            move_uploaded_file($tmpName5, "./assets/img/characters/" . $namePicture5);

                            // Removes images that are changed
                            unlink("./assets/img/characters/" . $picture_1);
                            unlink("./assets/img/characters/book/" . $picture_2);
                            unlink("./assets/img/characters/" . $picture_3);
                            unlink("./assets/img/characters/" . $picture_4);
                            unlink("./assets/img/characters/" . $picture_5);

                            $user_fk = $userManager->getUser($user_fk);
                            if ($user_fk->getId()) {
                                $c = new Characters($id, $pseudo, $firstname, $lastname, $namePicture1, $species, $sex, $size, $hair, $eyes, $origin, $place, $namePicture2, $titleBook, $activity, $characteristic, $powers, $team, $parent, $situation, $biography, $namePicture3, $namePicture4, $namePicture5, $user_fk);
                                $characterManager->update($c);

                                header("Location: ../index.php?controller=character&action=view&id=$id&success=0");
                            }
                        } else {
                            header("Location: ../index.php?controller=character&action=update&id=$id&error=2");
                        }
                    } else {
                        header("Location: ../index.php?controller=character&action=update&id=$id&error=3");
                    }
                } else {
                    $user_fk = $userManager->getUser($user_fk);
                    if ($user_fk->getId()) {
                        $c = new Characters($id, $pseudo, $firstname, $lastname, $picture_1, $species, $sex, $size, $hair, $eyes, $origin, $place, $picture_2, $titleBook, $activity, $characteristic, $powers, $team, $parent, $situation, $biography, $picture_3, $picture_4, $picture_5, $user_fk);
                        $characterManager->update($c);

                        header("Location: ../index.php?controller=character&action=view&id=$id&success=0");
                    }
                }
            } else {
                header("Location: ../index.php?controller=character&action=update&id=$id&error=5");
            }
        }
        $this->return("update/updateCharacter", "Modifier un personnage");
    }

    /**
     * delete a character
     * @param $character
     */
    public function delete ($character) {
        if (isset($_SESSION["id"])) {
            if (isset($character['id'], $character['picture'], $character['picturesBook'], $character['picture1'], $character['picture2'], $character['picture3'])) {
                $charactersManager = new CharactersManager();

                $id = intval($character['id']);
                $picture = htmlentities($character['picture']);
                $picturesBook = htmlentities($character['picturesBook']);
                $picture1 = htmlentities($character['picture1']);
                $picture2 = htmlentities($character['picture2']);
                $picture3 = htmlentities($character['picture3']);

                unlink("./assets/img/characters/" . $picture);
                unlink("./assets/img/characters/book/" . $picturesBook);
                unlink("./assets/img/characters/" . $picture1);
                unlink("./assets/img/characters/" . $picture2);
                unlink("./assets/img/characters/" . $picture3);

                $charactersManager->delete($id);
                header("Location: ../index.php?controller=character&action=viewAll&success=3");
            }
            $this->return("delete/deleteCharacter", "Supprimer un personnage");
        }
    }
}

