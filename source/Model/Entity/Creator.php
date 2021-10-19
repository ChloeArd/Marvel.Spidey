<?php

namespace Chloe\Marvel\Model\Entity;

class Creator {

    private ?int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $picture;

    /**
     * @param int|null $id
     * @param string|null $firstname
     * @param string|null $lastname
     * @param string|null $picture
     */
    public function __construct(?int $id = null, ?string $firstname = null, ?string $lastname = null, ?string $picture = null) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->picture = $picture;
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
    public function getFirstname(): ?string {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): ?string {
        $this->firstname = $firstname;
        return $firstname;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): ?string {
        $this->lastname = $lastname;
        return $lastname;
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
}