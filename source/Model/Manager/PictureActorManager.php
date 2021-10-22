<?php

namespace Chloe\Marvel\Model\Manager;

use Chloe\Marvel\Model\DB;
use Chloe\Marvel\Model\Entity\PictureActor;
use Chloe\Marvel\Model\Manager\Traits\ManagerTrait;

require_once "Traits/ManagerTrait.php";

class PictureActorManager {

    use ManagerTrait;

    private PictureManager $pictureManager;
    private ActorManager $actorManager;

    public function __construct() {
        $this->pictureManager = new PictureManager();
        $this->actorManager = new ActorManager();
    }

    /**
     * Return a picture of a actor based on id.
     * @param $id
     * @return PictureActor
     */
    public function getPictureActor($id): PictureActor {
        $request = DB::getInstance()->prepare("SELECT * FROM picture_actor WHERE id = :id");
        $id = intval($id);
        $request->bindParam(":id", $id);
        $request->execute();
        $info = $request->fetch();
        $pictureActor = new PictureActor();
        if ($info) {
            $pictureActor->setId($info['id']);
            $picture = $this->pictureManager->getPicture($info['picture_fk']);
            $pictureActor->setPictureFk($picture);
            $actor = $this->actorManager->getActor($info['actor_fk']);
            $pictureActor->setActorFk($actor);
        }
        return $pictureActor;
    }

    /**
     * returns all pictures of a actor
     * @return array
     */
    public function getPicturesActor(int $actor_fk): array {
        $pictureActor = [];
        $request = DB::getInstance()->prepare("SELECT * FROM picture_actor WHERE actor_fk = :actor_fk ORDER by id DESC");
        $request->bindValue(':actor_fk', $actor_fk);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $picture = PictureManager::getManager()->getPicture($info['picture_fk']);
                $actor = ActorManager::getManager()->getActor($info['actor_fk']);
                if ($picture->getId()) {
                    if ($actor->getId()) {
                        $pictureActor[] = new PictureActor($info['id'], $info['picture_fk'], $info['actor_fk']);
                    }
                }
            }
        }
        return $pictureActor;
    }

    /**
     * add a picture of a actor
     * @param PictureActor $pictureActor
     * @return bool
     */
    public function add (PictureActor $pictureActor): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO picture_actor (picture_fk, actor_fk)
                VALUES (:picture_fk, :actor_fk) 
        ");

        $request->bindValue(':picture_fk', $pictureActor->getPictureFk());
        $request->bindValue(':actor_fk', $pictureActor->getActorFk());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a picture of a actor
     * @param PictureActor $pictureActor
     * @return bool
     */
    public function update (PictureActor $pictureActor): bool {
        $request = DB::getInstance()->prepare("UPDATE picture_actor SET picture_fk = :picture_fk, actor_fk = :actor_fk WHERE id = :id");

        $request->bindValue(':id', $pictureActor->getId());
        $request->bindValue(':picture_fk', $pictureActor->getPictureFk());
        $request->bindValue(':actor_fk', $pictureActor->getActorFk());

        return $request->execute();
    }

    /**
     * Delete a picture of a actor
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM picture_actor WHERE id = :id");
        $request->bindValue(":id", $id);
        return $request->execute();
    }
}