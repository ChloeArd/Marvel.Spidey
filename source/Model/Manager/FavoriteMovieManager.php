<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\FavoriteMovie;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class FavoriteMovieManager {

    use ManagerTrait;

    private UserManager $userManger;
    private MovieManager $movieManager;

    public function __construct() {
        $this->userManger = new UserManager();
        $this->movieManager = new MovieManager();
    }

    /**
     * return a favorite movie
     * @param $id
     * @return FavoriteMovie
     */
    public function getFavoriteMovie($id): FavoriteMovie {
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_movie WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $favMovie = new FavoriteMovie();
        if ($info) {
            $favMovie->setId($info['id']);
            $user = $this->userManger->getUser($info['user_fk']);
            $favMovie->setUserFk($user);
            $movie = $this->movieManager->getMovie($info['movie_fk']);
            $favMovie->setMovieFk($movie);
        }
        return $favMovie;
    }

    /**
     * returns all the movies to a user's favorites
     * @param int $user_fk
     * @return array
     */
    public function getFavoritesMovies(int $user_fk): array {
        $favMovie = [];
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_movie WHERE user_fk = :user_fk");
        $request->bindValue(":user_fk", $user_fk);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                $movie = MovieManager::getManager()->getMovie($info['movie_fk']);
                if ($user->getId()) {
                    if ($movie->getId()) {
                        $favMovie[] = new FavoriteMovie($info['id'], $user, $movie);
                    }
                }
            }
        }
        return $favMovie;
    }

    /**
     * add a favorite movie
     * @param FavoriteMovie $favoriteMovie
     * @return bool
     */
    public function add (FavoriteMovie $favoriteMovie): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO favorite_movie (user_fk, movie_fk)
                VALUES (:user_fk, :movie_fk) 
        ");

        $request->bindValue(':user_fk', $favoriteMovie->getUserFk());
        $request->bindValue(':movie_fk', $favoriteMovie->getMovieFk());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * delete a favorite movie
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM favorite_movie WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}