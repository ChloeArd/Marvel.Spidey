<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\Movie;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class MovieManager {

    use ManagerTrait;

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
            $movie->setDirector($info['director']);
            $movie->setActors($info['actors']);
            $movie->setSynopsis($info['synopsis']);
            $movie->setVideo($info['video']);
        }
        return $movie;
    }

    /**
     * returns all movies
     * @return array
     */
    public function getMovies(): array {
        $picture = [];
        $request = DB::getInstance()->prepare("SELECT * FROM movie ORDER by id DESC");
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $picture[] = new Movie($info['id'], $info['title'], $info['picture'], $info['date'], $info['time'], $info['director'],
                    $info['actors'], $info['synopsis'], $info['video']);
            }
        }
        return $picture;
    }

    /**
     * return one movie
     * @param int $id
     * @return array
     */
    public function getMovieId(int $id): array {
        $picture = [];
        $request = DB::getInstance()->prepare("SELECT * FROM movie WHERE id = :id");
        $request->bindValue(":id", $id);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $picture[] = new Movie($info['id'], $info['title'], $info['picture'], $info['date'], $info['time'], $info['director'],
                    $info['actors'], $info['synopsis'], $info['video']);
            }
        }
        return $picture;
    }

    /**
     * add a movie
     * @param Movie $movie
     * @return bool
     */
    public function add (Movie $movie): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO movie (title, picture, date, time, director, actors, synopsis, video)
                VALUES (:title, :picture, :date, :time, :director, :actors, :synopsis, :video) 
        ");

        $request->bindValue(':title', $movie->getTitle());
        $request->bindValue(':picture', $movie->getPicture());
        $request->bindValue(':date', $movie->getDate());
        $request->bindValue(':time', $movie->getTime());
        $request->bindValue(':director', $movie->getDirector());
        $request->bindValue(':actors', $movie->getActors());
        $request->bindValue(':synopsis', $movie->getSynopsis());
        $request->bindValue(':video', $movie->getVideo());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a movie
     * @param Movie $movie
     * @return bool
     */
    public function update (Movie $movie): bool {
        $request = DB::getInstance()->prepare("UPDATE movie SET title = :title, picture = :picture, date = :date, time = :time,
                 director = :director, actors = :actors, synopsis = :synopsis, video = :video WHERE id = :id");

        $request->bindValue(':id', $movie->getId());
        $request->bindValue(':title', $movie->setTitle($movie->getTitle()));
        $request->bindValue(':picture', $movie->setPicture($movie->getPicture()));
        $request->bindValue(':date', $movie->setDate($movie->getDate()));
        $request->bindValue(':time', $movie->setTime($movie->getTime()));
        $request->bindValue(':director', $movie->setDirector($movie->getDirector()));
        $request->bindValue(':actors', $movie->setActors($movie->getActors()));
        $request->bindValue(':synopsis', $movie->setSynopsis($movie->getSynopsis()));
        $request->bindValue(':video', $movie->setVideo($movie->getVideo()));

        return $request->execute();
    }

    /**
     * Delete a movie
     * @param Movie $movie
     * @return bool
     */
    public function delete (Movie $movie): bool {
        $request = DB::getInstance()->prepare("DELETE FROM comment_movie WHERE movie_fk = :movie_fk");
        $request->bindValue(":movie_fk", $movie->getId());
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM favorite_movie WHERE movie_fk = :movie_fk");
        $request->bindValue(":movie_fk", $movie->getId());
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM movie WHERE id = :id");
        $request->bindValue(":id", $movie->getId());
        return $request->execute();
    }
}