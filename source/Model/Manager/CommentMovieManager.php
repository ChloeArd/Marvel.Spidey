<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\CommentMovie;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class CommentMovieManager {

    use ManagerTrait;

    private MovieManager $movieManager;
    private UserManager $userManager;

    public function __construct() {
        $this->movieManager = new MovieManager();
        $this->userManager = new UserManager();
    }

    /**
     * return the comment of movie
     * @param $id
     * @return CommentMovie
     */
    public function getCommentMovie($id): CommentMovie {
        $request = DB::getInstance()->prepare("SELECT * FROM comment_movie WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $commentMovie = new CommentMovie();
        if ($info) {
            $commentMovie->setId($info['id']);
            $commentMovie->setComment($info['comment']);
            $commentMovie->setDate($info['date']);
            $user = $this->userManager->getUser($info['user_fk']);
            $commentMovie->setUserFk($user);
            $movie = $this->movieManager->getMovie($info['movie_fk']);
            $commentMovie->setMovieFk($movie);
            $commentMovie->setReport($info['report']);
        }
        return $commentMovie;
    }

    /**
     * return all comments of a movie
     * @param int $movie_fk
     * @return array
     */
    public function getCommentsMovie(int $movie_fk): array {
        $commentMovie = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment_movie WHERE movie_fk = :movie_fk ORDER BY date DESC");
        $request->bindValue(":movie_fk", $movie_fk);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                $movie = MovieManager::getManager()->getMovie($info['movie_fk']);
                if ($user->getId()) {
                    if ($movie->getId()) {
                        $commentMovie[] = new CommentMovie($info['id'], $info['comment'], $info['date'], $user, $movie, $info['report']);
                    }
                }
            }
        }
        return $commentMovie;
    }

    /**
     * return one comment of a movie
     * @param int $movie_fk
     * @param int $id
     * @return array
     */
    public function getCommentMovieId(int $movie_fk, int $id): array {
        $commentMovie = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment_movie WHERE movie_fk = :movie_fk, id =:id");
        $request->bindValue(":movie_fk", $movie_fk);
        $request->bindValue(":id", $id);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                $movie = MovieManager::getManager()->getMovie($info['movie_fk']);
                if ($user->getId()) {
                    if ($movie->getId()) {
                        $commentMovie[] = new CommentMovie($info['id'], $info['comment'], $info['date'], $user, $movie, $info['report']);
                    }
                }
            }
        }
        return $commentMovie;
    }

    /**
     * add a comment to a movie
     * @param CommentMovie $commentMovie
     * @return bool
     */
    public function add (CommentMovie $commentMovie): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO comment_movie (comment, date, user_fk, movie_fk, report)
                VALUES (:comment, :date, :user_fk, :movie_fk, :report) 
        ");

        $request->bindValue(':comment', $commentMovie->getComment());
        $request->bindValue(":date", $commentMovie->getDate());
        $request->bindValue(":user_fk", $commentMovie->getUserFk());
        $request->bindValue(":movie_fk", $commentMovie->getMovieFk());
        $request->bindValue(":report", $commentMovie->getReport());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a comment to a movie
     * @param CommentMovie $commentMovie
     * @return bool
     */
    public function update (CommentMovie $commentMovie): bool {
        $request = DB::getInstance()->prepare("UPDATE comment_movie SET comment = :comment, date = :date WHERE id = :id");

        $request->bindValue(':id', $commentMovie->getId());
        $request->bindValue(':title', $commentMovie->setComment($commentMovie->getComment()));
        $request->bindValue(':picture', $commentMovie->setDate($commentMovie->getDate()));

        return $request->execute();
    }

    /**
     * Delete a comment to a movie
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM comment_movie WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}