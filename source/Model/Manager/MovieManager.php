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