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
use function Chloe\Marvel\Model\getRandomName;


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

    // create a character
    public function add($character, $files) {
        $manager = new ActorManager();
        $actors = $manager->getActors();
        $manager = new CreatorManager();
        $creators = $manager->getCreators();

        if (isset($character['send'])) {
            if (isset($character['pseudo'], $character['firstname'], $character['lastname'], $files['picture'], $character['species'],
                $character['sex'], $character['size'], $character['size2'], $character['hair'], $character['eyes'], $character['origin'], $character['place'],
                $files['picturesBook'], $character['titleBook'], $character['activity'], $character['powers'], $character['parent'], $character['biography'], $files['picture1'], $files['picture2'],
                $files['picture3'], $character['actors'], $character['creators'], $character['user_fk'])) {

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
                    $size = $size1 . "m" . $size2;
                }
                else {
                    header("Location: ../index.php?controller=character&action=add&error=6");
                }

                if ($character['sex'] === "") {
                    header("Location: ../index.php?controller=character&action=add&error=7");
                }

                // We recover the hair colors, which has a maximum of 3 colors
                if (count($character['hair']) === 1) {
                    $hair = $character['hair'][0];
                } elseif (count($character['hair']) === 2) {
                    $hair = $character['hair'][0] . ", " . $character['hair'][1];
                } elseif (count($character['hair']) === 3) {
                    $hair = $character['hair'][0] . ", " . $character['hair'][1] . ", " . $character['hair'][2];
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


                //
                //
                //
                //
                //
                // creators et actors aussi a récupérer !

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
                        }
                        else {
                            header("Location: ../index.php?controller=character&action=add&error=2");
                        }
                    }
                    else {
                        header("Location: ../index.php?controller=character&action=add&error=3");
                    }
                }
                else {
                    header("Location: ../index.php?controller=character&action=add&error=4");
                }
            }
            else {
                header("Location: ../index.php?controller=character&action=add&error=5");
            }
        }


        $this->return("create/createCharacter", "Ajouter un personnages", ["actors" => $actors, "creators" => $creators]);
    }
}