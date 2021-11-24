<?php

namespace Chloe\Marvel\Model\Entity;

class Actor {

    private ?int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $picture;
    private ?string $birthName;
    private ?string $birth;
    private ?string $nationality;
    private ?string $profession;
    private ?string $movies;
    private ?string $biography;
    private ?string $awards;
    private ?string $picture1;
    private ?string $picture2;
    private ?string $picture3;
    private ?User $user_fk;

    /**
     * @param int|null $id
     * @param string|null $firstname
     * @param string|null $lastname
     * @param string|null $picture
     * @param string|null $birthName
     * @param string|null $birth
     * @param string|null $nationality
     * @param string|null $profession
     * @param string|null $movies
     * @param string|null $biography
     * @param string|null $awards
     * @param string|null $picture1
     * @param string|null $picture2
     * @param string|null $picture3
     * @param User|null $user_fk
     */
    public function __construct(?int $id = null, ?string $firstname = null, ?string $lastname = null, ?string $picture = null,
    ?string $birthName = null, ?string $birth = null, ?string $nationality = null, ?string $profession =null, ?string $movies = null,
    ?string $biography = null, ?string $awards = null, ?string $picture1 = null, ?string $picture2 = null, ?string $picture3 = null,
    ?User $user_fk = null){
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->picture = $picture;
        $this->birthName = $birthName;
        $this->birth = $birth;
        $this->nationality = $nationality;
        $this->profession = $profession;
        $this->movies = $movies;
        $this->biography = $biography;
        $this->awards = $awards;
        $this->picture1 = $picture1;
        $this->picture2 = $picture2;
        $this->picture3 = $picture3;
        $this->user_fk = $user_fk;
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

    /**
     * @return string|null
     */
    public function getBirthName(): ?string {
        return $this->birthName;
    }

    /**
     * @param string|null $birthName
     */
    public function setBirthName(?string $birthName): ?string {
        $this->birthName = $birthName;
        return $birthName;
    }

    /**
     * @return string|null
     */
    public function getBirth(): ?string {
        return $this->birth;
    }

    /**
     * @param string|null $birth
     */
    public function setBirth(?string $birth): ?string {
        $this->birth = $birth;
        return $birth;
    }

    /**
     * @return string|null
     */
    public function getNationality(): ?string {
        return $this->nationality;
    }

    /**
     * @param string|null $nationality
     */
    public function setNationality(?string $nationality): ?string {
        $this->nationality = $nationality;
        return $nationality;
    }

    /**
     * @return string|null
     */
    public function getProfession(): ?string {
        return $this->profession;
    }

    /**
     * @param string|null $profession
     */
    public function setProfession(?string $profession): ?string {
        $this->profession = $profession;
        return $profession;
    }

    /**
     * @return string|null
     */
    public function getMovies(): ?string {
        return $this->movies;
    }

    /**
     * @param string|null $movies
     */
    public function setMovies(?string $movies): ?string {
        $this->movies = $movies;
        return $movies;
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
    public function getAwards(): ?string {
        return $this->awards;
    }

    /**
     * @param string|null $awards
     */
    public function setAwards(?string $awards): ?string {
        $this->awards = $awards;
        return $awards;
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


}