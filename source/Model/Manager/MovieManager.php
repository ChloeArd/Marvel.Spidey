<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\Actor;
use Chloe\Marvel\Model\Entity\Movie;
use Chloe\Marvel\Model\Manager\ActorManager;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class MovieManager {

    use ManagerTrait;

    private ActorManager $actorManager;

    public function __construct() {
        $this->actorManager = new ActorManager();
    }

    /**
     * Return a movie based on id.
     * @param $id
     * @return Movie
     */
    public function getMovie($id): Movie {
        $request = DB::getInstance()->prepare("SELECT * FROM movie WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $movie = new Movie();
        if ($info) {
            $movie->setId($info['id']);
            $movie->setTitle($info['title']);
            $movie->setPicture($info['picture']);
            $movie->setDate($info['date']);
            $movie->setTime($info['time']);
            $movie->setGenre($info['genre']);
            $movie->setDirector($info['director']);
            $movie->setActors($info['actors']);
            $movie->setSynopsis($info['synopsis']);
            $movie->setVideo($info['video']);
            $movie->setActorFk($info['actor_fk']);
        }
        return $movie;
    }

    /**
     * return all movies
     * @param int $actor_fk
     * @return array
     */
    public function getMovies(int $actor_fk): array {
        $movie = [];
        $request = DB::getInstance()->prepare("SELECT * FROM movie WHERE actor_fk = :actor_fk ORDER by date DESC");
        $request->bindValue(':actor_fk', $actor_fk);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $actor = ActorManager::getManager()->getActor($info['actor_fk']);
                if($actor->getId()) {
                    $movie[] = new Movie($info['id'], $info['title'], $info['picture'], $info['date'], $info['time'], $info['genre'], $info['director'],
                        $info['actors'], $info['synopsis'], $info['video'], $actor);
                }
            }
        }
        return $movie;
    }

    /**
     * return one movie
     * @param int $id
     * @return array
     */
    public function getMovieId(int $id): array {
        $movie = [];
        $request = DB::getInstance()->prepare("SELECT * FROM movie WHERE id = :id");
        $request->bindValue(":id", $id);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $actor = ActorManager::getManager()->getActor($info['actor_fk']);
                if($actor->getId()) {
                    $movie[] = new Movie($info['id'], $info['title'], $info['picture'], $info['date'], $info['time'], $info['genre'], $info['director'],
                        $info['actors'], $info['synopsis'], $info['video'], $actor);
                }
            }
        }
        return $movie;
    }

    /**
     * add a movie
     * @param Movie $movie
     * @return bool
     */
    public function add (Movie $movie): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO movie (title, picture, date, time, genre, director, actors, synopsis, video, actor_fk)
                VALUES (:title, :picture, :date, :time, :genre, :director, :actors, :synopsis, :video, :actor_fk) 
        ");

        $request->bindValue(':title', $movie->getTitle());
        $request->bindValue(':picture', $movie->getPicture());
        $request->bindValue(':date', $movie->getDate());
        $request->bindValue(':time', $movie->getTime());
        $request->bindValue(':genre', $movie->getGenre());
        $request->bindValue(':director', $movie->getDirector());
        $request->bindValue(':actors', $movie->getActors());
        $request->bindValue(':synopsis', $movie->getSynopsis());
        $request->bindValue(':video', $movie->getVideo());
        $request->bindValue(':actor_fk', $movie->getActorFk());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a movie
     * @param Movie $movie
     * @return bool
     */
    public function update (Movie $movie): bool {
        $request = DB::getInstance()->prepare("UPDATE movie SET title = :title, picture = :picture, date = :date, time = :time, genre = :genre,
                 director = :director, actors = :actors, synopsis = :synopsis, video = :video, actor_fk = :actor_fk WHERE id = :id");

        $request->bindValue(':id', $movie->getId());
        $request->bindValue(':title', $movie->setTitle($movie->getTitle()));
        $request->bindValue(':picture', $movie->setPicture($movie->getPicture()));
        $request->bindValue(':date', $movie->setDate($movie->getDate()));
        $request->bindValue(':time', $movie->setTime($movie->getTime()));
        $request->bindValue(':genre', $movie->setGenre($movie->getGenre()));
        $request->bindValue(':director', $movie->setDirector($movie->getDirector()));
        $request->bindValue(':actors', $movie->setActors($movie->getActors()));
        $request->bindValue(':synopsis', $movie->setSynopsis($movie->getSynopsis()));
        $request->bindValue(':video', $movie->setVideo($movie->getVideo()));
        $request->bindValue(':actor_fk', $movie->setActorFk($movie->getActorFk()));

        return $request->execute();
    }

    /**
     * Delete a movie
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM comment_movie WHERE movie_fk = :movie_fk");
        $request->bindValue(":movie_fk", $id);
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM favorite_movie WHERE movie_fk = :movie_fk");
        $request->bindValue(":movie_fk", $id);
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM movie WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}