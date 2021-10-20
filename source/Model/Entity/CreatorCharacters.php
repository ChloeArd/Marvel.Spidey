<?php

namespace Chloe\Marvel\Model\Entity;

class CreatorCharacters {

    private ?int $id;
    private ?Creator $creator_fk;
    private ?Characters $characters_fk;

    /**
     * @param int|null $id
     * @param Creator|null $creator_fk
     * @param Characters|null $characters_fk
     */
    public function __construct(?int $id = null, ?Creator $creator_fk = null, ?Characters $characters_fk = null) {
        $this->id = $id;
        $this->creator_fk = $creator_fk;
        $this->characters_fk = $characters_fk;
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
     * @return Creator|null
     */
    public function getCreatorFk(): ?Creator {
        return $this->creator_fk;
    }

    /**
     * @param Creator|null $creator_fk
     */
    public function setCreatorFk(?Creator $creator_fk): ?Creator {
        $this->creator_fk = $creator_fk;
        return $creator_fk;
    }

    /**
     * @return Characters|null
     */
    public function getCharactersFk(): ?Characters {
        return $this->characters_fk;
    }

    /**
     * @param Characters|null $characters_fk
     */
    public function setCharactersFk(?Characters $characters_fk): ?Characters {
        $this->characters_fk = $characters_fk;
        return $characters_fk;
    }
}