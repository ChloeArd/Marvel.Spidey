<?php
namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Entity\CreatorCharacters;
use Chloe\Marvel\Model\Manager\CharactersManager;
use Chloe\Marvel\Model\Manager\CreatorCharactersManager;
use Chloe\Marvel\Model\Manager\CreatorManager;

class CreatorCharactersController {

    use ReturnViewTrait;

    public function add($c_c) {
        $id = intval($_GET['id']);
        $creatorManager = new CreatorManager();
        $creators = $creatorManager->getCreators();
        $charactersManager = new CharactersManager();
        $character = $charactersManager->getCharacterId($id);

        if (isset($c_c['send'])) {
            if (isset($c_c['creator_fk'], $c_c['characters_fk'])) {

                $creatorCharacterManager = new CreatorCharactersManager();

                $creator_fk = intval($c_c['creator_fk']);
                $characters_fk = intval($c_c['characters_fk']);

                $creator_fk = $creatorManager->getCreator($creator_fk);
                $characters_fk = $charactersManager->getCharacter($characters_fk);
                if ($creator_fk->getId()) {
                    if ($characters_fk->getId()) {
                        $c = new CreatorCharacters(null, $creator_fk, $characters_fk);
                        $creatorCharacterManager->add($c);

                        header("Location: ../index.php?controller=character&action=view&id=$id&success=2");
                    }
                }
            } else {
                header("Location: ../index.php?controller=creatorCharacter&action=add&id=$id&error=3");
            }
        }
        $this->return("create/createCreatorCharacter", "Ajouter le/la créateur/rice du personnage", ['creators' => $creators, 'character' => $character]);
    }

    public function delete ($c_c) {
        if (isset($_SESSION["id"])) {
            if (isset($c_c['id'], $c_c['id2'])) {
                $creatorCharactersManager = new CreatorCharactersManager();

                $id = intval($c_c['id']);
                $id2 = intval($c_c['id2']);
                $creatorCharactersManager->delete($id);
                header("Location: ../index.php?controller=character&action=view&id=$id2&success=2");
            }
            $this->return("delete/deleteCreatorCharacter", "Supprimer un personnage");
        }
    }

}