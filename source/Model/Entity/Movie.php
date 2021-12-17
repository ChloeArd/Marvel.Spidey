<?php

namespace Chloe\Marvel\Model\Entity;

class Movie {

    private ?int $id;
    private ?string $title;
    private ?string $picture;
    private ?string $date;
    private ?string $time;
    private ?string $genre;
    private ?string $director;
    private ?string $actors;
    private ?string $synopsis;
    private ?string $video;
    private ?Actor $actor_fk;

    /**
     * @param int|null $id
     * @param string|null $title
     * @param string|null $picture
     * @param string|null $date
     * @param string|null $time
     * @param string|null $genre
     * @param string|null $director
     * @param string|null $actors
     * @param string|null $synopsis
     * @param string|null $video
     * @param Actor|null $actor_fk
     */
    public function __construct(?int $id = null, ?string $title = null, ?string $picture = null, ?string $date = null, ?string $time = null,
    ?string $genre = null, ?string $director = null, ?string $actors = null, ?string $synopsis = null, ?string $video = null, ?Actor $actor_fk = null) {
        $this->id = $id;
        $this->title = $title;
        $this->picture = $picture;
        $this->date = $date;
        $this->time = $time;
        $this->genre = $genre;
        $this->director = $director;
        $this->actors = $actors;
        $this->synopsis = $synopsis;
        $this->video = $video;
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
     * @return string|null
     */
    public function getTime(): ?string {
        return $this->time;
    }

    /**
     * @param string|null $time
     */
    public function setTime(?string $time): ?string {
        $this->time = $time;
        return $time;
    }

    /**
     * @return string|null
     */
    public function getGenre(): ?string {
        return $this->genre;
    }

    /**
     * @param string|null $genre
     */
    public function setGenre(?string $genre): ?string {
        $this->genre = $genre;
        return $genre;
    }

    /**
     * @return string|null
     */
    public function getDirector(): ?string {
        return $this->director;
    }

    /**
     * @param string|null $director
     */
    public function setDirector(?string $director): ?string {
        $this->director = $director;
        return $director;
    }

    /**
     * @return string|null
     */
    public function getActors(): ?string {
        return $this->actors;
    }

    /**
     * @param string|null $actors
     */
    public function setActors(?string $actors): ?string {
        $this->actors = $actors;
        return $actors;
    }

    /**
     * @return string|null
     */
    public function getSynopsis(): ?string {
        return $this->synopsis;
    }

    /**
     * @param string|null $synopsis
     */
    public function setSynopsis(?string $synopsis): ?string {
        $this->synopsis = $synopsis;
        return $synopsis;
    }

    /**
     * @return string|null
     */
    public function getVideo(): ?string {
        return $this->video;
    }

    /**
     * @param string|null $video
     */
    public function setVideo(?string $video): ?string {
        $this->video = $video;
        return $video;
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