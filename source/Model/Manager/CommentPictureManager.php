<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\CommentPicture;
use Chloe\Marvel\Model\Entity\PictureActor;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class CommentPictureManager {

    use ManagerTrait;

    private PictureManager $pictureManager;
    private UserManager $userManager;

    public function __construct() {
        $this->pictureManager = new PictureManager();
        $this->userManager = new UserManager();
    }

    /**
     * return the comment of a picture
     * @param $id
     * @return CommentPicture
     */
    public function getCommentPicture($id): CommentPicture {
        $request = DB::getInstance()->prepare("SELECT * FROM comment_picture WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $commentPicture = new CommentPicture();
        if ($info) {
            $commentPicture->setId($info['id']);
            $commentPicture->setComment($info['comment']);
            $commentPicture->setDate($info['date']);
            $user = $this->userManager->getUser($info['user_fk']);
            $commentPicture->setUserFk($user);
            $picture = $this->pictureManager->getPicture($info['picture_fk']);
            $commentPicture->setPictureFk($picture);
            $commentPicture->setReport($info['report']);
            $commentPicture->setWhy($info['why']);
            $commentPicture->setDateReport($info['date_report']);
        }
        return $commentPicture;
    }

    /**
     * return all comments of a picture
     * @param int $picture_fk
     * @return array
     */
    public function getCommentsPicture(int $picture_fk): array {
        $commentPicture = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment_picture WHERE picture_fk = :picture_fk AND report = :report ORDER BY id DESC");
        $request->bindValue(":picture_fk", $picture_fk);
        $request->bindValue(':report', 0);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                $picture = PictureManager::getManager()->getPicture($info['picture_fk']);
                if ($user->getId()) {
                    if ($picture->getId()) {
                        $commentPicture[] = new CommentPicture($info['id'], $info['comment'], $info['date'], $user, $picture);
                    }
                }
            }
        }
        return $commentPicture;
    }



    /**
     * return one comment of a picture
     * @param int $picture_fk
     * @param int $id
     * @return array
     */
    public function getCommentPictureId(int $picture_fk, int $id): array {
        $commentPicture = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment_picture WHERE picture_fk = :picture_fk AND id = :id");
        $request->bindValue(":picture_fk", $picture_fk);
        $request->bindValue(":id", $id);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                $picture = PictureManager::getManager()->getPicture($info['picture_fk']);
                if ($user->getId()) {
                    if ($picture->getId()) {
                        $commentPicture[] = new CommentPicture($info['id'], $info['comment'], $info['date'], $user, $picture, $info['report']);
                    }
                }
            }
        }
        return $commentPicture;
    }

    /**
     * all comments of a picture report
     * @return array
     */
    public function getCommentsPictureReport(): array {
        $commentPicture = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment_picture WHERE report = :report ORDER BY date_report DESC");
        $request->bindValue(":report", 1);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                $picture = PictureManager::getManager()->getPicture($info['picture_fk']);
                if ($user->getId()) {
                    if ($picture->getId()) {
                        $commentPicture[] = new CommentPicture($info['id'], $info['comment'], $info['date'], $user, $picture, $info['report'], $info['why'], $info['date_report']);
                    }
                }
            }
        }
        return $commentPicture;
    }

    /**
     * add a comment to a picture
     * @param CommentPicture $commentPicture
     * @return bool
     */
    public function add (CommentPicture $commentPicture): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO comment_picture (comment, date, user_fk, picture_fk, report)
                VALUES (:comment, :date, :user_fk, :picture_fk, :report) 
        ");

        $request->bindValue(':comment', $commentPicture->getComment());
        $request->bindValue(":date", $commentPicture->getDate());
        $request->bindValue(":user_fk", $commentPicture->getUserFk()->getId());
        $request->bindValue(":picture_fk", $commentPicture->getPictureFk()->getId());
        $request->bindValue(":report", $commentPicture->getReport());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a comment to a picture
     * @param CommentPicture $commentPicture
     * @return bool
     */
    public function update (CommentPicture $commentPicture): bool {
        $request = DB::getInstance()->prepare("UPDATE comment_picture SET comment = :comment WHERE id = :id");

        $request->bindValue(':id', $commentPicture->getId());
        $request->bindValue(':comment', $commentPicture->setComment($commentPicture->getComment()));

        return $request->execute();
    }

    /**
     * report remove a comment
     * @param CommentPicture $commentPicture
     * @return bool
     */
    public function report (CommentPicture $commentPicture): bool {
        $request = DB::getInstance()->prepare("UPDATE comment_picture SET report = :report, why = :why, date_report = :date_report WHERE id = :id");

        $request->bindValue(':id', $commentPicture->getId());
        $request->bindValue(':report', 1);
        $request->bindValue(':why', $commentPicture->setWhy($commentPicture->getWhy()));
        $request->bindValue(':date_report', $commentPicture->setDateReport($commentPicture->getDateReport()));


        return $request->execute();
    }

    /**
     * report a comment
     * @param CommentPicture $commentPicture
     * @return bool
     */
    public function reportRemove (CommentPicture $commentPicture): bool {
        $request = DB::getInstance()->prepare("UPDATE comment_picture SET report = :report, why = :why, date_report = :date_report WHERE id = :id");

        $request->bindValue(':id', $commentPicture->getId());
        $request->bindValue(':report', 0);
        $request->bindValue(':why', null);
        $request->bindValue(':date_report', null);

        return $request->execute();
    }

    /**
     * Delete a comment to a picture
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM comment_picture WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}