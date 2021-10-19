<?php

namespace Chloe\Marvel\Model\Entity;

class FavoritePicture {

    private ?int $id;
    private ?User $user_fk;
    private ?Picture $picture_fk;

    /**
     * @param int|null $id
     * @param User|null $user_fk
     * @param Picture|null $picture_fk
     */
    public function __construct(?int $id = null, ?User $user_fk = null, ?Picture $picture_fk = null) {
        $this->id = $id;
        $this->user_fk = $user_fk;
        $this->picture_fk = $picture_fk;
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
     * @return User|null
     */
    public function getUserFk(): ?User {
        return $this->user_fk;
    }

    /**
     * @param User|null $user_fk
     */
    public function setUserFk(?User $user_fk): ?User {
        $this->user_fk = $user_fk;
        return $user_fk;
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
}
