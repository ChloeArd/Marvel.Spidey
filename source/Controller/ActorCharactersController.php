<?php
namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Entity\ActorCharacters;
use Chloe\Marvel\Model\Manager\ActorCharactersManager;
use Chloe\Marvel\Model\Manager\ActorManager;
use Chloe\Marvel\Model\Manager\CharactersManager;

class ActorCharactersController {

    use ReturnViewTrait;

    /**
     * Add a character's actor
     * @param $a_c
     */
    public function add($a_c) {
        $id = intval($_GET['id']);
        $actorManager = new ActorManager();
        $actors = $actorManager->getActors();
        $charactersManager = new CharactersManager();
        $character = $charactersManager->getCharacterId($id);

        if (isset($a_c['send'])) {
            if (isset($a_c['actor_fk'], $a_c['characters_fk'])) {

                $creatorCharacterManager = new ActorCharactersManager();

                $actor_fk = intval($a_c['actor_fk']);
                $characters_fk = intval($a_c['characters_fk']);

                $actor_fk = $actorManager->getActor($actor_fk);
                $characters_fk = $charactersManager->getCharacter($characters_fk);
                if ($actor_fk->getId()) {
                    if ($characters_fk->getId()) {
                            $c = new ActorCharacters(null, $actor_fk, $characters_fk);
                        $creatorCharacterManager->add($c);

                        header("Location: ../index.php?controller=character&action=view&id=$id&success=2");
                    }
                }
            } else {
                header("Location: ../index.php?controller=actorCharacter&action=add&id=$id&error=3");
            }
        }
        $this->return("create/createActorCharacter", "Ajouter l' acteur/rice du personnage", ['actors' => $actors, 'character' => $character]);
    }

    /**
     * Delete a character's actor
     * @param $a_c
     */
    public function delete ($a_c) {
        if (isset($_SESSION["id"])) {
            if (isset($a_c['id'], $a_c['id2'])) {
                $actorCharactersManager = new ActorCharactersManager();

                $id = intval($a_c['id']);
                $id2 = intval($a_c['id2']);
                $actorCharactersManager->delete($id);
                header("Location: ../index.php?controller=character&action=view&id=$id2&success=2");
            }
            $this->return("delete/deleteActorCharacter", "Supprimer un(e) acteur/rice du personnage");
        }
    }

}