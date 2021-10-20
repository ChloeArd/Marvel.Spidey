<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\Creator;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class CreatorManager {

    use ManagerTrait;

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
                $creator[] = new Creator($info['id'], $info['firstname'], $info['lastname'], $info['picture']);
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
                $creator[] = new Creator($info['id'], $info['firstname'], $info['lastname'], $info['picture']);
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
            INSERT INTO movie (firstname, lastname, picture)
                VALUES (:firstname, :lastname, :picture) 
        ");

        $request->bindValue(':firstname', $creator->getFirstname());
        $request->bindValue(':lastname', $creator->getLastname());
        $request->bindValue(':picture', $creator->getPicture());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a creator
     * @param Creator $creator
     * @return bool
     */
    public function update (Creator $creator): bool {
        $request = DB::getInstance()->prepare("UPDATE movie SET firstname = :firstname, lastname = :lastname, picture = :picture WHERE id = :id");

        $request->bindValue(':id', $creator->getId());
        $request->bindValue(':firstname', $creator->setFirstname($creator->getFirstname()));
        $request->bindValue(':lastname', $creator->setLastname($creator->getLastname()));
        $request->bindValue(':picture', $creator->setPicture($creator->getPicture()));

        return $request->execute();
    }

    /**
     * Delete a creator
     * @param Creator $creator
     * @return bool
     */
    public function delete (Creator $creator): bool {
        $request = DB::getInstance()->prepare("DELETE FROM creator_characters WHERE creator_fk = :creator_fk");
        $request->bindValue(":creator_fk", $creator->getId());
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM creator WHERE id = :id");
        $request->bindValue(":id", $creator->getId());
        return $request->execute();
    }
}