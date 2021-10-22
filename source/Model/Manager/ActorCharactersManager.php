<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\ActorCharacters;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class ActorCharactersManager {

    use ManagerTrait;

    private CharactersManager $charactersManager;
    private ActorManager $actorManager;

    public function __construct() {
        $this->charactersManager = new CharactersManager();
        $this->actorManager = new ActorManager();
    }

    /**
     * Return a actor of a character based on id.
     * @param $id
     * @return ActorCharacters
     */
    public function getActorCharacter($id): ActorCharacters {
        $request = DB::getInstance()->prepare("SELECT * FROM actor_characters WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $a_c = new ActorCharacters();
        if ($info) {
            $a_c->setId($info['id']);
            $actor = $this->actorManager->getActor($info['actor_fk']);
            $a_c->setActorFk($actor);
            $character = $this->charactersManager->getCharacter($info['characters_fk']);
            $a_c->setCharactersFk($character);
        }
        return $a_c;
    }

    /**
     * returns all actors of a character
     * @return array
     */
    public function getActorsCharacters(int $characters_fk): array {
        $a_c = [];
        $request = DB::getInstance()->prepare("SELECT * FROM actor_characters WHERE characters_fk = :characters_fk ORDER by id DESC");
        $request->bindValue(':characters_fk', $characters_fk);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $actor = ActorManager::getManager()->getActor($info['actor_fk']);
                $character = CharactersManager::getManager()->getCharacter($info['characters_fk']);
                if ($actor->getId()) {
                    if ($character->getId()) {
                        $a_c[] = new ActorCharacters($info['id'], $info['actor_fk'], $info['characters_fk']);
                    }
                }
            }
        }
        return $a_c;
    }

    /**
     * add a actor of a character
     * @param ActorCharacters $a_c
     * @return bool
     */
    public function add (ActorCharacters $a_c): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO actor_characters (actor_fk, characters_fk)
                VALUES (:actor_fk, :characters_fk) 
        ");

        $request->bindValue(':actor_fk', $a_c->getActorFk());
        $request->bindValue(':characters_fk', $a_c->getCharactersFk());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a actor of a character
     * @param ActorCharacters $a_c
     * @return bool
     */
    public function update (ActorCharacters $a_c): bool {
        $request = DB::getInstance()->prepare("UPDATE actor_characters SET actor_fk = :actor_fk, characters_fk = :characters_fk WHERE id = :id");

        $request->bindValue(':id', $a_c->getId());
        $request->bindValue(':actor_fk', $a_c->getActorFk());
        $request->bindValue(':characters_fk', $a_c->getCharactersFk());

        return $request->execute();
    }

    /**
     * delete actor of character
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM actor_characters WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}
