<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\Creator;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class CreatorManager {

    use ManagerTrait;

    private UserManager $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

    /**
     * Return a creator based on id.
     * @param $id
     * @return Creator
     */
    public function getCreator($id): Creator {
        $request = DB::getInstance()->prepare("SELECT * FROM creator WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $creator = new Creator();
        if ($info) {
            $creator->setId($info['id']);
            $creator->setFirstname($info['firstname']);
            $creator->setLastname($info['lastname']);
            $creator->setPicture($info['picture']);
            $user = $this->userManager->getUser($info['user_fk']);
            $creator->setUserFk($user);
        }
        return $creator;
    }

    /**
     * returns all creators
     * @return array
     */
    public function getCreators(): array {
        $creator = [];
        $request = DB::getInstance()->prepare("SELECT * FROM creator");
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if ($user->getId()) {
                    $creator[] = new Creator($info['id'], $info['firstname'], $info['lastname'], $info['picture'], $user);
                }
            }
        }
        return $creator;
    }

    /**
     * return one creator
     * @param int $id
     * @return array
     */
    public function getCreatorId(int $id): array {
        $creator = [];
        $request = DB::getInstance()->prepare("SELECT * FROM creator WHERE id = :id");
        $request->bindValue(":id", $id);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if ($user->getId()) {
                    $creator[] = new Creator($info['id'], $info['firstname'], $info['lastname'], $info['picture'], $user);
                }
            }
        }
        return $creator;
    }

    /**
     * add a creator
     * @param Creator $creator
     * @return bool
     */
    public function add (Creator $creator): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO creator (firstname, lastname, picture, user_fk)
                VALUES (:firstname, :lastname, :picture, :user_fk) 
        ");

        $request->bindValue(':firstname', $creator->getFirstname());
        $request->bindValue(':lastname', $creator->getLastname());
        $request->bindValue(':picture', $creator->getPicture());
        $request->bindValue(':user_fk', $creator->getUserFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a creator
     * @param Creator $creator
     * @return bool
     */
    public function update (Creator $creator): bool {
        $request = DB::getInstance()->prepare("UPDATE creator SET firstname = :firstname, lastname = :lastname, picture = :picture WHERE id = :id");

        $request->bindValue(':id', $creator->getId());
        $request->bindValue(':firstname', $creator->setFirstname($creator->getFirstname()));
        $request->bindValue(':lastname', $creator->setLastname($creator->getLastname()));
        $request->bindValue(':picture', $creator->setPicture($creator->getPicture()));

        return $request->execute();
    }

    /**
     * Delete a creator
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM creator_characters WHERE creator_fk = :creator_fk");
        $request->bindValue(":creator_fk", $id);
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM creator WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}