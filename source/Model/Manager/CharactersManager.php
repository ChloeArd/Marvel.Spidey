<?php
namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\Characters;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class CharactersManager {

    use ManagerTrait;

    private UserManager $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

    /**
     * Return a character.
     * @param $id
     * @return Characters
     */
    public function getCharacter($id): Characters {
        $request = DB::getInstance()->prepare("SELECT * FROM characters WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $character = new Characters();
        if ($info) {
            $character->setId($info['id']);
            $character->setPseudo($info['pseudo']);
            $character->setFirstname($info['firstname']);
            $character->setLastname($info['lastname']);
            $character->setPicture($info['picture']);
            $character->setSpecies($info['species']);
            $character->setSex($info['sex']);
            $character->setSize($info['size']);
            $character->setHair($info['hair']);
            $character->setEyes($info['eyes']);
            $character->setOrigin($info['origin']);
            $character->setPlace($info['place']);
            $character->setPicturesBook($info['picturesBook']);
            $character->setTitleBook($info['titleBook']);
            $character->setActivity($info['activity']);
            $character->setCharacteristic($info['characteristic']);
            $character->setPowers($info['powers']);
            $character->setTeam($info['team']);
            $character->setParent($info['parent']);
            $character->setSituation($info['situation']);
            $character->setBiography($info['biography']);
            $character->setPicture1($info['picture1']);
            $character->setPicture2($info['picture2']);
            $character->setPicture3($info['picture3']);
            $user = $this->userManager->getUser($info['user_fk']);
            $character->setUserFk($user);
        }
        return $character;
    }

    /**
     * returns all characters
     * @return array
     */
    public function getCharacters(): array {
        $character = [];
        $request = DB::getInstance()->prepare("SELECT * FROM characters");
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if($user->getId()) {
                    $character[] = new Characters($info['id'], $info['pseudo'], $info['firstname'], $info['lastname'], $info['picture'],
                        $info['species'], $info['sex'], $info['size'], $info['hair'], $info['eyes'], $info['origin'], $info['place'],
                        $info['picturesBook'], $info['titleBook'], $info['activity'], $info['characteristic'], $info['powers'], $info['team'],
                        $info['parent'], $info['situation'], $info['biography'], $info['picture1'], $info['picture2'], $info['picture3'], $user);
                }
            }
        }
        return $character;
    }

    /**
     * return one character
     * @param int $id
     * @return array
     */
    public function getCharacterId(int $id): array {
        $character = [];
        $request = DB::getInstance()->prepare("SELECT * FROM characters WHERE id = :id");
        $request->bindValue(':id', $id);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if ($user->getId()) {
                    $character[] = new Characters($info['id'], $info['pseudo'], $info['firstname'], $info['lastname'], $info['picture'],
                        $info['species'], $info['sex'], $info['size'], $info['hair'], $info['eyes'], $info['origin'], $info['place'],
                        $info['picturesBook'], $info['titleBook'], $info['activity'], $info['characteristic'], $info['powers'], $info['team'],
                        $info['parent'], $info['situation'], $info['biography'], $info['picture1'], $info['picture2'], $info['picture3'], $user);
                }
            }
        }
        return $character;
    }

    /**
     * add a character
     * @param Characters $character
     * @return bool
     */
    public function add (Characters $character): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO characters (pseudo, firstname, lastname, picture, species, sex, size, hair, eyes, origin, place, picturesBook, titleBook, activity, characteristic, powers, team, parent, situation, biography, picture1, picture2, picture3, user_fk)
                VALUES (:pseudo, :firstname, :lastname, :picture, :species, :sex, :size, :hair, :eyes, :origin, :place, :picturesBook, :titleBook, :activity, :characteristic, :powers, :team, :parent, :situation, :biography, :picture1, :picture2, :picture3, :user_fk) 
        ");

        $request->bindValue(':pseudo', $character->getPseudo());
        $request->bindValue(':firstname', $character->getFirstname());
        $request->bindValue(':lastname', $character->getLastname());
        $request->bindValue(':picture', $character->getPicture());
        $request->bindValue(':species', $character->getSpecies());
        $request->bindValue(':sex', $character->getSex());
        $request->bindValue(':size', $character->getSize());
        $request->bindValue(':hair', $character->getHair());
        $request->bindValue(':eyes', $character->getEyes());
        $request->bindValue(':origin', $character->getOrigin());
        $request->bindValue(':place', $character->getPlace());
        $request->bindValue(':picturesBook', $character->getPicturesBook());
        $request->bindValue(':titleBook', $character->getTitleBook());
        $request->bindValue(':activity', $character->getActivity());
        $request->bindValue(':characteristic', $character->getCharacteristic());
        $request->bindValue(':powers', $character->getPowers());
        $request->bindValue(':team', $character->getTeam());
        $request->bindValue(':parent', $character->getParent());
        $request->bindValue(':situation', $character->getSituation());
        $request->bindValue(':biography', $character->getBiography());
        $request->bindValue(':picture1', $character->getPicture1());
        $request->bindValue(':picture2', $character->getPicture2());
        $request->bindValue(':picture3', $character->getPicture3());
        $request->bindValue(':user_fk', $character->getUserFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a character
     * @param Characters $character
     * @return bool
     */
    public function update (Characters $character): bool {
        $request = DB::getInstance()->prepare("UPDATE characters SET pseudo = :pseudo, firstname = :firstname, lastname = :lastname, picture = :picture, species = :species,
                      sex = :sex, size = :size, hair = :hair, eyes = :eyes, origin = :origin, place = :place, picturesBook = :picturesBook, titleBook = :titleBook, activity = :activity,
                      characteristic = :characteristic, powers = :powers, team = :team, parent = :parent, situation = :situation, biography = :biography, picture1 = :picture1, 
                      picture2 = :picture2, picture3 = :picture3 WHERE id = :id");

        $request->bindValue(':id', $character->getId());
        $request->bindValue(':pseudo', $character->setPseudo($character->getPseudo()));
        $request->bindValue(':firstname', $character->setFirstname($character->getFirstname()));
        $request->bindValue(':lastname', $character->setLastname($character->getLastname()));
        $request->bindValue(':picture', $character->setPicture($character->getPicture()));
        $request->bindValue(':species', $character->setSpecies($character->getSpecies()));
        $request->bindValue(':sex', $character->setSex($character->getSex()));
        $request->bindValue(':size', $character->setSize($character->getSize()));
        $request->bindValue(':hair', $character->setHair($character->getHair()));
        $request->bindValue(':eyes', $character->setEyes($character->getEyes()));
        $request->bindValue(':origin', $character->setOrigin($character->getOrigin()));
        $request->bindValue(':place', $character->setPlace($character->getPlace()));
        $request->bindValue(':picturesBook', $character->setPicturesBook($character->getPicturesBook()));
        $request->bindValue(':titleBook', $character->setTitleBook($character->getTitleBook()));
        $request->bindValue(':activity', $character->setActivity($character->getActivity()));
        $request->bindValue(':characteristic', $character->setCharacteristic($character->getCharacteristic()));
        $request->bindValue(':powers', $character->setPowers($character->getPowers()));
        $request->bindValue(':team', $character->setTeam($character->getTeam()));
        $request->bindValue(':parent', $character->setParent($character->getParent()));
        $request->bindValue(':situation', $character->setSituation($character->getSituation()));
        $request->bindValue(':biography', $character->setBiography($character->getBiography()));
        $request->bindValue(':picture1', $character->setPicture1($character->getPicture1()));
        $request->bindValue(':picture2', $character->setPicture2($character->getPicture2()));
        $request->bindValue(':picture3', $character->setPicture3($character->getPicture3()));

        return $request->execute();
    }

    /**
     * Delete a creator
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM creator_characters WHERE characters_fk = :characters_fk");
        $request->bindValue(":characters_fk", $id);
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM actor_characters WHERE characters_fk = :characters_fk");
        $request->bindValue(":characters_fk", $id);
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM characters WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }

}