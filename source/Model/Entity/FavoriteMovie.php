<?php

namespace Chloe\Marvel\Model\Entity;

class FavoriteMovie {

    private ?int $id;
    private ?User $user_fk;
    private ?Movie $movie_fk;

    /**
     * @param int|null $id
     * @param User|null $user_fk
     * @param Movie|null $movie_fk
     */
    public function __construct(?int $id = null, ?User $user_fk = null, ?Movie $movie_fk = null) {
        $this->id = $id;
        $this->user_fk = $user_fk;
        $this->movie_fk = $movie_fk;
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
     * @return Movie|null
     */
    public function getMovieFk(): ?Movie {
        return $this->movie_fk;
    }

    /**
     * @param Movie|null $movie_fk
     */
    public function setMovieFk(?Movie $movie_fk): ?Movie {
        $this->movie_fk = $movie_fk;
        return $movie_fk;
    }
}