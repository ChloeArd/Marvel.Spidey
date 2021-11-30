<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\CreatorCharacters;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class CreatorCharactersManager {

    use ManagerTrait;

    private CreatorManager $creatorManager;
    private CharactersManager $charactersManager;

    public function __construct() {
        $this->creatorManager = new CreatorManager();
        $this->charactersManager = new CharactersManager();
    }

    /**
     * Return a creator of a character
     * @param $id
     * @return CreatorCharacters
     */
    public function getCreatorCharacter($id): CreatorCharacters {
        $request = DB::getInstance()->prepare("SELECT * FROM creator_characters WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $c_c = new CreatorCharacters();
        if ($info) {
            $c_c->setId($info['id']);
            $creator = $this->creatorManager->getCreator($info['creator_fk']);
            $c_c->setCreatorFk($creator);
            $character = $this->charactersManager->getCharacter($info['characters_fk']);
            $c_c->setCharactersFk($character);
        }
        return $c_c;
    }

    /**
     * return all creators of a character
     * @param int $characters_fk
     * @return array
     */
    public function getCreatorsCharacter(int $characters_fk): array {
        $creatorCharacter = [];
        $request = DB::getInstance()->prepare("SELECT * FROM creator_characters WHERE characters_fk = :characters_fk");
        $request->bindValue(":characters_fk", $characters_fk);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $creator = CreatorManager::getManager()->getCreator($info['creator_fk']);
                $character = CharactersManager::getManager()->getCharacter($info['characters_fk']);
                if ($creator->getId()) {
                    if ($character->getId()) {
                        $creatorCharacter[] = new CreatorCharacters($info['id'], $creator, $character);
                    }
                }
            }
        }
        return $creatorCharacter;
    }

    /**
     * return all creators of a character
     * @param int $characters_fk
     * @param int $creator_fk
     * @return array
     */
    public function getCreatorsCharacter2(int $creator_fk, int $characters_fk): array {
        $creatorCharacter = [];
        $request = DB::getInstance()->prepare("SELECT * FROM creator_characters WHERE characters_fk = :characters_fk AND creator_fk = :creator_fk");
        $request->bindValue(":characters_fk", $characters_fk);
        $request->bindValue(":creator_fk", $creator_fk);

        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $creator = CreatorManager::getManager()->getCreator($creator_fk);
                $character = CharactersManager::getManager()->getCharacter($characters_fk);
                if ($creator->getId()) {
                    if ($character->getId()) {
                        $creatorCharacter[] = new CreatorCharacters($info['id'], $creator, $character);
                    }
                }
            }
        }
        return $creatorCharacter;
    }

    /**
     * add a creator with a character
     * @param CreatorCharacters $c_c
     * @return bool
     */
    public function add (CreatorCharacters $c_c): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO creator_characters (creator_fk, characters_fk)
                VALUES (:creator_fk, :characters_fk) 
        ");

        $request->bindValue(':creator_fk', $c_c->getCreatorFk()->getId());
        $request->bindValue(':characters_fk', $c_c->getCharactersFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * delete a creator and a character
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM creator_characters WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}
