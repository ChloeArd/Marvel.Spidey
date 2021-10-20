<?php

namespace Chloe\Marvel\Model\Entity;

class PictureActor {

    private ?int $id;
    private ?Picture $picture_fk;
    private ?Actor $actor_fk;

    /**
     * @param int|null $id
     * @param Picture|null $picture_fk
     * @param Actor|null $actor_fk
     */
    public function __construct(?int $id = null, ?Picture $picture_fk = null, ?Actor $actor_fk = null) {
        $this->id = $id;
        $this->picture_fk = $picture_fk;
        $this->actor_fk = $actor_fk;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): ?int {
        $this->id = $id;
        return $id;
    }

    /**
     * @return Picture|null
     */
    public function getPictureFk(): ?Picture {
        return $this->picture_fk;
    }

    /**
     * @param Picture|null $picture_fk
     */
    public function setPictureFk(?Picture $picture_fk): ?Picture {
        $this->picture_fk = $picture_fk;
        return $picture_fk;
    }

    /**
     * @return Actor|null
     */
    public function getActorFk(): ?Actor {
        return $this->actor_fk;
    }

    /**
     * @param Actor|null $actor_fk
     */
    public function setActorFk(?Actor $actor_fk): ?Actor {
        $this->actor_fk = $actor_fk;
        return $actor_fk;
    }
}