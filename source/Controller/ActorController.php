<?php

namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Manager\ActorManager;
use Chloe\Marvel\Model\Manager\PictureActorManager;

class ActorController {

    use ReturnViewTrait;

    /**
     * display all characters, actors, creators
     */
    public function actor($id) {
        $manager = new ActorManager();
        $actor = $manager->getActorId($id);
        $title = $manager->getActor($id);
        $manager = new PictureActorManager();
        $picture = $manager->getPicturesActor($id);
        $this->return("actor", $title->getFirstname() . " " . $title->getLastname(), ["actor" => $actor, "picture" => $picture]);
    }
}