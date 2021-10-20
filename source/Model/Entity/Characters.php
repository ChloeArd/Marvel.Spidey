<?php

namespace Chloe\Marvel\Model\Entity;

class Characters {

    private ?int $id;
    private ?string $pseudo;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $picture;
    private ?string $species;
    private ?string $sex;
    private ?string $size;
    private ?string $hair;
    private ?string $eyes;
    private ?string $origin;
    private ?string $place;
    private ?string $picturesBook;
    private ?string $titleBook;
    private ?string $activity;
    private ?string $characteristic;
    private ?string $powers;
    private ?string $team;
    private ?string $parent;
    private ?string $situation;
    private ?string $biography;
    private ?string $picture1;
    private ?string $picture2;
    private ?string $picture3;

    /**
     * @param int|null $id
     * @param string|null $pseudo
     * @param string|null $firstname
     * @param string|null $lastname
     * @param string|null $picture
     * @param string|null $species
     * @param string|null $sex
     * @param string|null $size
     * @param string|null $hair
     * @param string|null $eyes
     * @param string|null $origin
     * @param string|null $place
     * @param string|null $picturesBook
     * @param string|null $titleBook
     * @param string|null $activity
     * @param string|null $characteristic
     * @param string|null $powers
     * @param string|null $team
     * @param string|null $parent
     * @param string|null $situation
     * @param string|null $biography
     * @param string|null $picture1
     * @param string|null $picture2
     * @param string|null $picture3
     */
    public function __construct(?int $id = null, ?string $pseudo = null, ?string $firstname = null, ?string $lastname = null,
    ?string $picture = null, ?string $species = null, ?string $sex = null, ?string $size = null, ?string $hair = null,
    ?string $eyes = null, ?string $origin = null, ?string $place = null, ?string $picturesBook = null, ?string $titleBook = null,
    ?string $activity = null, ?string $characteristic = null, ?string $powers = null, ?string $team = null, ?string $parent = null,
    ?string $situation = null, ?string $biography = null, ?string $picture1 = null, ?string $picture2 = null, ?string $picture3 = null,) {
    $this->id = $id;
    $this->pseudo = $pseudo;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->picture = $picture;
    $this->species = $species;
    $this->sex = $sex;
    $this->size = $size;
    $this->hair = $hair;
    $this->eyes = $eyes;
    $this->origin = $origin;
    $this->place = $place;
    $this->picturesBook = $picturesBook;
    $this->titleBook = $titleBook;
    $this->activity = $activity;
    $this->characteristic = $characteristic;
    $this->powers = $powers;
    $this->team = $team;
    $this->parent = $parent;
    $this->situation = $situation;
    $this->biography = $biography;
    $this->picture1 = $picture1;
    $this->picture2 = $picture2;
    $this->picture3 = $picture3;
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
    public function getPseudo(): ?string {
        return $this->pseudo;
    }

    /**
     * @param string|null $pseudo
     */
    public function setPseudo(?string $pseudo): ?string {
        $this->pseudo = $pseudo;
        return $pseudo;
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

    /**
     * @return string|null
     */
    public function getSpecies(): ?string {
        return $this->species;
    }

    /**
     * @param string|null $species
     */
    public function setSpecies(?string $species): ?string {
        $this->species = $species;
        return $species;
    }

    /**
     * @return string|null
     */
    public function getSex(): ?string {
        return $this->sex;
    }

    /**
     * @param string|null $sex
     */
    public function setSex(?string $sex): ?string {
        $this->sex = $sex;
        return $sex;
    }

    /**
     * @return string|null
     */
    public function getSize(): ?string {
        return $this->size;
    }

    /**
     * @param string|null $size
     */
    public function setSize(?string $size): ?string {
        $this->size = $size;
        return $size;
    }

    /**
     * @return string|null
     */
    public function getHair(): ?string {
        return $this->hair;
    }

    /**
     * @param string|null $hair
     */
    public function setHair(?string $hair): ?string {
        $this->hair = $hair;
        return $hair;
    }

    /**
     * @return string|null
     */
    public function getEyes(): ?string {
        return $this->eyes;
    }

    /**
     * @param string|null $eyes
     */
    public function setEyes(?string $eyes): ?string {
        $this->eyes = $eyes;
        return $eyes;
    }

    /**
     * @return string|null
     */
    public function getOrigin(): ?string {
        return $this->origin;
    }

    /**
     * @param string|null $origin
     */
    public function setOrigin(?string $origin): ?string {
        $this->origin = $origin;
        return $origin;
    }

    /**
     * @return string|null
     */
    public function getPlace(): ?string {
        return $this->place;
    }

    /**
     * @param string|null $place
     */
    public function setPlace(?string $place): ?string {
        $this->place = $place;
        return $place;
    }

    /**
     * @return string|null
     */
    public function getPicturesBook(): ?string {
        return $this->picturesBook;
    }

    /**
     * @param string|null $picturesBook
     */
    public function setPicturesBook(?string $picturesBook): ?string {
        $this->picturesBook = $picturesBook;
        return $picturesBook;
    }

    /**
     * @return string|null
     */
    public function getTitleBook(): ?string {
        return $this->titleBook;
    }

    /**
     * @param string|null $titleBook
     */
    public function setTitleBook(?string $titleBook): ?string {
        $this->titleBook = $titleBook;
        return $titleBook;
    }

    /**
     * @return string|null
     */
    public function getActivity(): ?string {
        return $this->activity;
    }

    /**
     * @param string|null $activity
     */
    public function setActivity(?string $activity): ?string {
        $this->activity = $activity;
        return $activity;
    }

    /**
     * @return string|null
     */
    public function getCharacteristic(): ?string {
        return $this->characteristic;
    }

    /**
     * @param string|null $characteristic
     */
    public function setCharacteristic(?string $characteristic): ?string {
        $this->characteristic = $characteristic;
        return $characteristic;
    }

    /**
     * @return string|null
     */
    public function getPowers(): ?string {
        return $this->powers;
    }

    /**
     * @param string|null $powers
     */
    public function setPowers(?string $powers): ?string {
        $this->powers = $powers;
        return $powers;
    }

    /**
     * @return string|null
     */
    public function getTeam(): ?string {
        return $this->team;
    }

    /**
     * @param string|null $team
     */
    public function setTeam(?string $team): ?string {
        $this->team = $team;
        return $team;
    }

    /**
     * @return string|null
     */
    public function getParent(): ?string {
        return $this->parent;
    }

    /**
     * @param string|null $parent
     */
    public function setParent(?string $parent): ?string {
        $this->parent = $parent;
        return $parent;
    }

    /**
     * @return string|null
     */
    public function getSituation(): ?string {
        return $this->situation;
    }

    /**
     * @param string|null $situation
     */
    public function setSituation(?string $situation): ?string {
        $this->situation = $situation;
        return $situation;
    }

    /**
     * @return string|null
     */
    public function getBiography(): ?string {
        return $this->biography;
    }

    /**
     * @param string|null $biography
     */
    public function setBiography(?string $biography): ?string {
        $this->biography = $biography;
        return $biography;
    }

    /**
     * @return string|null
     */
    public function getPicture1(): ?string {
        return $this->picture1;
    }

    /**
     * @param string|null $picture1
     */
    public function setPicture1(?string $picture1): ?string {
        $this->picture1 = $picture1;
        return $picture1;
    }

    /**
     * @return string|null
     */
    public function getPicture2(): ?string {
        return $this->picture2;
    }

    /**
     * @param string|null $picture2
     */
    public function setPicture2(?string $picture2): ?string {
        $this->picture2 = $picture2;
        return $picture2;
    }

    /**
     * @return string|null
     */
    public function getPicture3(): ?string {
        return $this->picture3;
    }

    /**
     * @param string|null $picture3
     */
    public function setPicture3(?string $picture3): ?string {
        $this->picture3 = $picture3;
        return $picture3;
    }
}