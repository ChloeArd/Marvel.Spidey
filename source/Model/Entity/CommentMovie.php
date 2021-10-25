<?php

namespace Chloe\Marvel\Model\Entity;

class CommentMovie {

    private ?int $id;
    private ?string $comment;
    private ?string $date;
    private ?User $user_fk;
    private ?Movie $movie_fk;
    private ?int $report;
    private ?string $why;
    private ?string $date_report;

    /**
     * @param int|null $id
     * @param string|null $comment
     * @param string|null $date
     * @param User|null $user_fk
     * @param Movie|null $movie_fk
     * @param int|null $report
     * @param string|null $why
     * @param string|null $date_report
     */
    public function __construct(?int $id = null, ?string $comment = null, ?string $date = null, ?User $user_fk = null,
    ?Movie $movie_fk = null, ?int $report = null, ?string $why = null, ?string $date_report = null) {
        $this->id = $id;
        $this->comment = $comment;
        $this->date = $date;
        $this->user_fk = $user_fk;
        $this->movie_fk = $movie_fk;
        $this->report = $report;
        $this->why = $why;
        $this->date_report = $date_report;
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
     * @return string|null
     */
    public function getComment(): ?string {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): ?string {
        $this->comment = $comment;
        return $comment;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): ?string {
        $this->date = $date;
        return $date;
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

    /**
     * @return int|null
     */
    public function getReport(): ?int {
        return $this->report;
    }

    /**
     * @param int|null $report
     */
    public function setReport(?int $report): ?int {
        $this->report = $report;
        return $report;
    }

    /**
     * @return string|null
     */
    public function getWhy(): ?string {
        return $this->why;
    }

    /**
     * @param string|null $why
     */
    public function setWhy(?string $why): ?string {
        $this->why = $why;
        return $why;
    }

    /**
     * @return string|null
     */
    public function getDateReport(): ?string {
        return $this->date_report;
    }

    /**
     * @param string|null $date_report
     */
    public function setDateReport(?string $date_report): ?string {
        $this->date_report = $date_report;
        return $date_report;
    }
}