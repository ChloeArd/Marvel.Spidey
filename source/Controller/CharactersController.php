<?php

namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Manager\ActorCharactersManager;
use Chloe\Marvel\Model\Manager\ActorManager;
use Chloe\Marvel\Model\Manager\CharactersManager;
use Chloe\Marvel\Model\Manager\CreatorCharactersManager;
use Chloe\Marvel\Model\Manager\CreatorManager;

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

    public function add($character) {
        $manager = new ActorManager();
        $actors = $manager->getActors();
        $manager = new CreatorManager();
        $creators = $manager->getCreators();

        if (isset($character['pseudo'], $character['firstname'], $character['lastname'], $character['picture'], $character['species'],
        $character['sex'], $character['size'], $character['hair'], $character['eyes'], $character['origin'], $character['place'],
        $character['picturesBook'], $character['titleBook'], $character['activity'], $character['characteristic'], $character['powers'],
        $character['team'], $character['parent'], $character['situation'], $character['biography'], $character['picture1'], $character['picture2'],
        $character['picture3'], $character['actors'], $character['creators'])) {

        }
        $this->return("create/createCharacter", "Ajouter un personnages", ["actors" => $actors, "creators" => $creators]);
    }
}