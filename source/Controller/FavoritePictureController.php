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
        $this->return("favoritesAccountView", "Mes favoris", ['favoritesUserFind' => $manager->favoritesByUser($user_fk)]);
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
     * @param $favoriteFind
     * @return void
     */
    public function deleteFavorite($favoriteFind) {
        if (isset($favoriteFind['id'], $favoriteFind['adFind_fk'], $favoriteFind['user_fk'])) {
            $userManager = new UserManager();
            $adFindManager = new AdFindManager();
            $favoriteManager = new FavoriteFindManager();

            $id = intval($favoriteFind['id']);
            $adFind_fk = intval($favoriteFind['adFind_fk']);
            $user_fk = intval($favoriteFind['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            $adFind_fk = $adFindManager->getAd($adFind_fk);
            if ($user_fk->getId()) {
                if ($adFind_fk->getId()) {
                    $favorite = new FavoriteFind($id);
                    $favoriteManager->delete($favorite);
                }
            }
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