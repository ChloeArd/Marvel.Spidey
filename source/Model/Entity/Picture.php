<?php

namespace Chloe\Marvel\Model\Entity;

class Picture {

    private ?int $id;
    private ?string $picture;
    private ?string $title;
    private ?string $description;

    /**
     * @param int|null $id
     * @param string|null $picture
     * @param string|null $title
     * @param string|null $description
     */
    public function __construct(?int $id = null, ?string $picture = null, ?string $title = null, ?string $description = null) {
        $this->id = $id;
        $this->picture = $picture;
        $this->title = $title;
        $this->description = $description;
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
}