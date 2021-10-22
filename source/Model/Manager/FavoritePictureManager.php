<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\FavoritePicture;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class FavoritePictureManager {

    use ManagerTrait;

    private UserManager $userManger;
    private PictureManager $pictureManager;

    public function __construct() {
        $this->userManger = new UserManager();
        $this->pictureManager = new PictureManager();
    }

    /**
     * return a favorite picture
     * @param $id
     * @return FavoritePicture
     */
    public function getFavoritePicture($id): FavoritePicture {
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_picture WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $favPicture = new FavoritePicture();
        if ($info) {
            $favPicture->setId($info['id']);
            $user = $this->userManger->getUser($info['user_fk']);
            $favPicture->setUserFk($user);
            $picture = $this->pictureManager->getPicture($info['picture_fk']);
            $favPicture->setPictureFk($picture);
        }
        return $favPicture;
    }

    /**
     * returns all the pictures to a user's favorites
     * @param int $user_fk
     * @return array
     */
    public function getFavoritesPictures(int $user_fk): array {
        $favPicture = [];
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_picture WHERE user_fk = :user_fk");
        $request->bindValue(":user_fk", $user_fk);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                $picture = PictureManager::getManager()->getPicture($info['picture_fk']);
                if ($user->getId()) {
                    if ($picture->getId()) {
                        $favPicture[] = new FavoritePicture($info['id'], $user, $picture);
                    }
                }
            }
        }
        return $favPicture;
    }

    /**
     * add a favorite picture
     * @param FavoritePicture $favoritePicture
     * @return bool
     */
    public function add (FavoritePicture $favoritePicture): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO favorite_picture (user_fk, picture_fk)
                VALUES (:user_fk, :picture_fk) 
        ");

        $request->bindValue(':user_fk', $favoritePicture->getUserFk());
        $request->bindValue(':picture_fk', $favoritePicture->getPictureFk());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * delete a favorite picture
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM favorite_picture WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}