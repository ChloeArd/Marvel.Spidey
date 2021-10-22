<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\Carousel;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class CarouselManager {

    use ManagerTrait;

    /**
     * display a carousel
     * @param $id
     * @return Carousel
     */
    public function getCarousel($id): Carousel {
        $request = DB::getInstance()->prepare("SELECT * FROM carousel WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $carousel = new Carousel();
        if ($info) {
            $carousel->setId($info['id']);
            $carousel->setPicture($info['picture']);
            $carousel->setTitle($info['title']);
        }
        return $carousel;
    }

    /**
     * return all pictures of carousel
     * @return array
     */
    public function getCarousels(): array {
        $carousel = [];
        $request = DB::getInstance()->prepare("SELECT * FROM carousel");
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $carousel[] = new Carousel($info['id'], $info['picture'], $info['title']);
            }
        }
        return $carousel;
    }

    /**
     * add a carousel
     * @param Carousel $carousel
     * @return bool
     */
    public function add (Carousel $carousel): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO carousel (picture, title)
                VALUES (:picture, :title) 
        ");

        $request->bindValue(':picture', $carousel->getPicture());
        $request->bindValue(':title', $carousel->getTitle());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Delete a carousel
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM carousel WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}