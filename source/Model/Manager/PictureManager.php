<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\Picture;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class PictureManager {

    use ManagerTrait;

    /**
     * Return a picture based on id.
     * @param $id
     * @return Picture
     */
    public function getPicture($id): Picture {
        $request = DB::getInstance()->prepare("SELECT * FROM picture WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $user = new Picture();
        if ($info) {
            $user->setId($info['id']);
            $user->setPicture($info['picture']);
            $user->setTitle($info['title']);
            $user->setDescription($info['description']);
        }
        return $user;
    }

    /**
     * returns all pictures
     * @return array
     */
    public function getPictures(): array {
        $picture = [];
        $request = DB::getInstance()->prepare("SELECT * FROM picture ORDER by id DESC");
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $picture[] = new Picture($info['id'], $info['picture'], $info['title'], $info['description']);
            }
        }
        return $picture;
    }

    /**
     * return one picture
     * @param int $id
     * @return array
     */
    public function getPictureId(int $id): array {
        $picture = [];
        $request = DB::getInstance()->prepare("SELECT * FROM picture WHERE id = :id");
        $request->bindValue(":id", $id);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $picture[] = new Picture($info['id'], $info['picture'], $info['title'], $info['description']);
            }
        }
        return $picture;
    }

    /**
     * add a picture
     * @param Picture $picture
     * @return bool
     */
    public function add (Picture $picture): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO picture (picture, title, description)
                VALUES (:picture, :title, :description) 
        ");

        $request->bindValue(':picture', $picture->getPicture());
        $request->bindValue(':title', $picture->getTitle());
        $request->bindValue(':description', $picture->getDescription());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a picture
     * @param Picture $picture
     * @return bool
     */
    public function update (Picture $picture): bool {
        $request = DB::getInstance()->prepare("UPDATE picture SET picture = :picture, title = :title, description = :description WHERE id = :id");

        $request->bindValue(':id', $picture->getId());
        $request->bindValue(':picture', $picture->getPicture());
        $request->bindValue(':title', $picture->getTitle());
        $request->bindValue(':description', $picture->setDescription($picture->getDescription()));

        return $request->execute();
    }

    /**
     * Delete a picture
     * @param Picture $picture
     * @return bool
     */
    public function delete (Picture $picture): bool {
        $request = DB::getInstance()->prepare("DELETE FROM comment_picture WHERE picture_fk = :picture_fk");
        $request->bindValue(":picture_fk", $picture->getId());
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM favorite_picture WHERE picture_fk = :picture_fk");
        $request->bindValue(":picture_fk", $picture->getId());
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM picture WHERE id = :id");
        $request->bindValue(":id", $picture->getId());
        return $request->execute();
    }
}