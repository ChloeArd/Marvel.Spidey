<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\Actor;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class ActorManager {

    use ManagerTrait;

    private UserManager $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

    /**
     * Return a actor based on id.
     * @param $id
     * @return Actor
     */
    public function getActor($id): Actor {
        $request = DB::getInstance()->prepare("SELECT * FROM actor WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $actor = new Actor();
        if ($info) {
            $actor->setId($info['id']);
            $actor->setFirstname($info['firstname']);
            $actor->setLastname($info['lastname']);
            $actor->setPicture($info['picture']);
            $actor->setBirthName($info['birthName']);
            $actor->setBirth($info['birth']);
            $actor->setNationality($info['nationality']);
            $actor->setProfession($info['profession']);
            $actor->setMovies($info['movies']);
            $actor->setBiography($info['biography']);
            $actor->setAwards($info['awards']);
            $actor->setPicture1($info['picture1']);
            $actor->setPicture2($info['picture2']);
            $actor->setPicture3($info['picture3']);
            $user = $this->userManager->getUser($info['user_fk']);
            $actor->setUserFk($user);
        }
        return $actor;
    }

    /**
     * returns all actors
     * @return array
     */
    public function getActors(): array {
        $actor = [];
        $request = DB::getInstance()->prepare("SELECT * FROM actor ORDER by id DESC");
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if ($user->getId()) {
                    $actor[] = new Actor($info['id'], $info['firstname'], $info['lastname'], $info['picture'], $info['birthName'], $info['birth'],
                        $info['nationality'], $info['profession'], $info['movies'], $info['biography'], $info['awards'], $info['picture1'],
                        $info['picture2'], $info['picture3'], $user);
                }
            }
        }
        return $actor;
    }

    /**
     * return one actor
     * @param int $id
     * @return array
     */
    public function getActorId(int $id): array {
        $actor = [];
        $request = DB::getInstance()->prepare("SELECT * FROM actor WHERE id = :id");
        $request->bindValue(":id", $id);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if ($user->getId()) {
                    $actor[] = new Actor($info['id'], $info['firstname'], $info['lastname'], $info['picture'], $info['birthName'], $info['birth'],
                        $info['nationality'], $info['profession'], $info['movies'], $info['biography'], $info['awards'], $info['picture1'],
                        $info['picture2'], $info['picture3'], $user);
                }
            }
        }
        return $actor;
    }

    /**
     * add a actor
     * @param Actor $actor
     * @return bool
     */
    public function add (Actor $actor): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO actor (firstname, lastname, picture, birthName, birth, nationality, profession, movies, biography, awards, picture1, picture2, picture3, user_fk)
                VALUES (:firstname, :lastname, :picture, :birthName, :birth, :nationality, :profession, :movies, :biography, :awards, :picture1, :picture2, :picture3, :user_fk) 
        ");

        $request->bindValue(':firstname', $actor->getFirstname());
        $request->bindValue(':lastname', $actor->getLastname());
        $request->bindValue(':picture', $actor->getPicture());
        $request->bindValue(':birthName', $actor->getBirthName());
        $request->bindValue(':birth', $actor->getBirth());
        $request->bindValue(':nationality', $actor->getNationality());
        $request->bindValue(':profession', $actor->getProfession());
        $request->bindValue(':movies', $actor->getMovies());
        $request->bindValue(':biography', $actor->getBiography());
        $request->bindValue(':awards', $actor->getAwards());
        $request->bindValue(':picture1', $actor->getPicture1());
        $request->bindValue(':picture2', $actor->getPicture2());
        $request->bindValue(':picture3', $actor->getPicture3());
        $request->bindValue(':user_fk', $actor->getUserFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a actor
     * @param Actor $actor
     * @return bool
     */
    public function update (Actor $actor): bool {
        $request = DB::getInstance()->prepare("UPDATE actor SET firstname = :firstname, lastname = :lastname, picture = :picture,
                 birthName = :birthName, birth = :birth, nationality = :nationality, profession = :profession, movies = :movies,
                 biography = :biography, awards = :awards, picture1 = :picture1, picture2 = :picture2, picture3 = :picture3 WHERE id = :id");

        $request->bindValue(':id', $actor->getId());
        $request->bindValue(':firstname', $actor->setFirstname($actor->getFirstname()));
        $request->bindValue(':lastname', $actor->setLastname($actor->getLastname()));
        $request->bindValue(':picture', $actor->setPicture($actor->getPicture()));
        $request->bindValue(':birthName', $actor->setBirthName($actor->getBirthName()));
        $request->bindValue(':birth', $actor->setBirth($actor->getBirth()));
        $request->bindValue(':nationality', $actor->setNationality($actor->getNationality()));
        $request->bindValue(':profession', $actor->setProfession($actor->getProfession()));
        $request->bindValue(':movies', $actor->setMovies($actor->getMovies()));
        $request->bindValue(':biography', $actor->setBiography($actor->getBiography()));
        $request->bindValue(':awards', $actor->setAwards($actor->getAwards()));
        $request->bindValue(':picture1', $actor->setPicture1($actor->getPicture1()));
        $request->bindValue(':picture2', $actor->setPicture2($actor->getPicture2()));
        $request->bindValue(':picture3', $actor->setPicture3($actor->getPicture3()));

        return $request->execute();
    }

    /**
     * Delete a actor
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM actor_characters WHERE actor_fk = :actor_fk");
        $request->bindValue(":actor_fk", $id);
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM actor WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}
