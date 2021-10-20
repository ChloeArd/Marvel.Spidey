<?php

namespace Chloe\Marvel\Model\Entity;

class ActorCharacters {

    private ?int $id;
    private ?Actor $actor_fk;
    private ?Characters $characters_fk;

    /**
     * @param int|null $id
     * @param Actor|null $actor_fk
     * @param Characters|null $characters_fk
     */
    public function __construct(?int $id = null, ?Actor $actor_fk = null, ?Characters $characters_fk = null) {
        $this->id = $id;
        $this->actor_fk = $actor_fk;
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