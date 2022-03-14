<?php

namespace Chloe\Marvel\Model\Entity;

class Picture {

    private ?int $id;
    private ?string $picture;
    private ?string $title;
    private ?string $description;
    private ?string $date;
    private ?User $user_fk;
    private ?int $report;
    private ?string $why;
    private ?string $date_report;

    /**
     * @param int|null $id
     * @param string|null $picture
     * @param string|null $title
     * @param string|null $description
     * @param string|null $date
     * @param User|null $user_fk
     */
    public function __construct(?int $id = null, ?string $picture = null, ?string $title = null, ?string $description = null, ?string $date = null,
                                ?User $user_fk = null, ?int $report = null, ?string $why = null, ?string $date_report = null) {
        $this->id = $id;
        $this->picture = $picture;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->user_fk = $user_fk;
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
    public function getPicture(): ?string {
        return $this->picture;
    }

    /**
     * @param string|null $picture
     */
    public function setPicture(?string $picture): ?string {
        $this->picture = $picture;
        return $picture;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): ?string {
        $this->title = $title;
        return $title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): ?string {
        $this->description = $description;
        return $description;
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