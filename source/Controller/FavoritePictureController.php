<?php

namespace Chloe\Marvel\Controller;


use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Entity\FavoritePicture;
use Chloe\Marvel\Model\Manager\FavoritePictureManager;
use Chloe\Marvel\Model\Manager\PictureManager;
use Chloe\Marvel\Model\Manager\UserManager;

class FavoritePictureController {

    use ReturnViewTrait;

    /**
     * Displays the favorites of the picture to a single user.
     * @param int $user_fk
     */
    public function favoritesUser(int $user_fk) {
        $manager = new FavoritePictureManager();
        $this->return("accountFavorites", "Mes favoris", ['favoritesUser' => $manager->getFavoritesPictures($user_fk)]);
    }

    /**
     * See if the user has bookmarked the ad.
     * @param $adFind_fk
     * @param $user_fk
     */
    public function favorite($adFind_fk, $user_fk) {
        $manager = new FavoriteFindManager();
        $this->return("adFindCommentView", "Anim'Nord : Annonce", ['favoritesUserFind' => $manager->favorite($adFind_fk,$user_fk)]);
    }

    /**
     * add a favorite picture
     * @param $user
     * @return void
     */
    public function addFavorite($id, $user) {
        if ($_GET['id']) {
            $userManager = new UserManager();
            $pictureManager = new PictureManager();
            $favoriteManager = new FavoritePictureManager();

            $user_fk = $userManager->getUser($user);
            $picture_fk = $pictureManager->getPicture($id);
            if($user_fk->getId()) {
                if ($picture_fk->getId()) {
                    $favorite = new FavoritePicture(null, $user_fk, $picture_fk);
                    $favoriteManager->add($favorite);
                    header("Location: ../?controller=picture&action=view&id=$id&success=3");
                }
            }
        }
        $this->return("picture", "");
    }

    /**
     * Delete a favorite picture using its id.
     * @param $favorite
     * @return void
     */
    public function deleteView($favorite) {
        if (isset($favorite['id'], $favorite['picture_fk'])) {
            $favoriteManager = new FavoritePictureManager();

            $id = intval($favorite['id']);
            $favoriteManager->delete($id);
            header("Location: ../?controller=picture&favorite=view&success=0");
        }
        $this->return("accountFavorites", "Mes favoris");
    }

    public function delete($favorite) {
        if (isset($favorite['id'], $favorite['picture_fk'])) {
            $favoriteManager = new FavoritePictureManager();

            $id = intval($favorite['id']);
            $favoriteManager->delete($id);
            $idPicture = $favorite['picture_fk'];
            header("Location: ../?controller=picture&action=view&id=$idPicture&success=4");

        }
        $this->return("picture", "");
    }
}