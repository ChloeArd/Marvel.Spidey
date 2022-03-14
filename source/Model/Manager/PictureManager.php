<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\Picture;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class PictureManager {

    use ManagerTrait;

    private UserManager $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

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
        $picture = new Picture();
        if ($info) {
            $picture->setId($info['id']);
            $picture->setPicture($info['picture']);
            $picture->setTitle($info['title']);
            $picture->setDescription($info['description']);
            $picture->setDate($info['date']);
            $user = $this->userManager->getUser($info['user_fk']);
            $picture->setUserFk($user);
            $picture->setReport($info['report']);
            $picture->setWhy($info['why']);
            $picture->setDateReport($info['date_report']);
        }
        return $picture;
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
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if ($user->getId()) {
                    $picture[] = new Picture($info['id'], $info['picture'], $info['title'], $info['description'], $info['date'], $user);
                }
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
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if ($user->getId()) {
                    $picture[] = new Picture($info['id'], $info['picture'], $info['title'], $info['description'], $info['date'], $user, $info['report']);
                }
            }
        }
        return $picture;
    }

    /**
     * all pictures report
     * @return array
     */
    public function getPicturesReport(): array {
        $picture = [];
        $request = DB::getInstance()->prepare("SELECT * FROM picture WHERE report = :report ORDER BY date_report DESC");
        $request->bindValue(":report", 1);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if ($user->getId()) {
                    $picture[] = new Picture($info['id'], $info['picture'], $info['title'], $info['description'], $info['date'], $user, $info['report'], $info['why'], $info['date_report']);
                }
            }
        }
        return $picture;
    }

    /**
     * all photos that a user has posted
     * @param int $user_fk
     * @return array
     */
    public function getPicturesUser(int $user_fk): array {
        $picture = [];
        $request = DB::getInstance()->prepare("SELECT * FROM picture WHERE user_fk = :user_fk ORDER by id DESC");
        $request->bindValue(":user_fk", $user_fk);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if ($user->getId()) {
                    $picture[] = new Picture($info['id'], $info['picture'], $info['title'], $info['description'], $info['date'], $user, $info['report']);
                }
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
            INSERT INTO picture (picture, title, description, date, user_fk, report)
                VALUES (:picture, :title, :description, :date, :user_fk, :report) 
        ");

        $request->bindValue(':picture', $picture->getPicture());
        $request->bindValue(':title', $picture->getTitle());
        $request->bindValue(':description', $picture->getDescription());
        $request->bindValue(':date', $picture->getDate());
        $request->bindValue(':user_fk', $picture->getUserFk()->getId());
        $request->bindValue(":report", $picture->getReport());


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
     * report a picture
     * @param Picture $picture
     * @return bool
     */
    public function report (Picture $picture): bool {
        $request = DB::getInstance()->prepare("UPDATE picture SET report = :report, why = :why, date_report = :date_report WHERE id = :id");

        $request->bindValue(':id', $picture->getId());
        $request->bindValue(':report', 1);
        $request->bindValue(':why', $picture->setWhy($picture->getWhy()));
        $request->bindValue(':date_report', $picture->setDateReport($picture->getDateReport()));


        return $request->execute();
    }

    /**
     * report remove a picture
     * @param Picture $picture
     * @return bool
     */
    public function reportRemove (Picture $picture): bool {
        $request = DB::getInstance()->prepare("UPDATE picture SET report = :report, why = :why, date_report = :date_report WHERE id = :id");

        $request->bindValue(':id', $picture->getId());
        $request->bindValue(':report', 0);
        $request->bindValue(':why', null);
        $request->bindValue(':date_report', null);

        return $request->execute();
    }

    /**
     * Delete a picture
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM comment_picture WHERE picture_fk = :picture_fk");
        $request->bindValue(":picture_fk", $id);
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM favorite_picture WHERE picture_fk = :picture_fk");
        $request->bindValue(":picture_fk", $id);
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM picture WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}