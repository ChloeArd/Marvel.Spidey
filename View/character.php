<main>
    <?php
    if (isset($var['character'])) {
        foreach ($var['character'] as $character) { ?>
            <h1 class="title"><?=strtoupper($character->getPseudo()) . " (" . $character->getFirstname() . " " . $character->getLastname() . ")"?></h1>
                <div class="width_100 flexRow">
                    <div id="photoCharacter" class="width_30 flexColumn">
                        <img class="width_100" src="../assets/img/characters/<?=$character->getPicture1()?>">
                        <img class="width_100" src="../assets/img/characters/<?=$character->getPicture2()?>">
                        <img class="width_100" src="../assets/img/characters/<?=$character->getPicture3()?>">
                    </div>
                    <div id="descriptionCharacter" class="width_70 flexColumn">
                        <div class="flexCenter flexColumn">
                            <h1 class="marginTop"><?=strtoupper($character->getPseudo())?></h1>
                            <h2><?=$character->getFirstname() . " " . $character->getLastname()?></h2>
                            <div class="lineHorizontal width_90 lineTop"></div>
                                <div id="table" class="flexRow">
                                    <div class="lineVertical"></div>
                                    <div class="flexColumn flexCenter">
                                        <p class="bold">Espèce</p>
                                        <p><?=$character->getSpecies()?></p>
                                    </div>
                                    <div class="lineVertical"></div>
                                    <div class="flexColumn flexCenter">
                                        <p class="bold">Sexe</p>
                                        <p><?=$character->getSex()?></p>
                                    </div>
                                    <div class="lineVertical"></div>
                                    <div class="flexColumn flexCenter">
                                        <p class="bold">Taille</p>
                                        <p><?=$character->getSize()?></p>
                                    </div>
                                    <div class="lineVertical"></div>
                                    <div class="flexColumn flexCenter">
                                        <p class="bold">Cheveux</p>
                                        <p><?=$character->getHair()?></p>
                                    </div>
                                    <div class="lineVertical"></div>
                                    <div class="flexColumn flexCenter">
                                        <p class="bold">Yeux</p>
                                        <p><?=$character->getEyes()?></p>
                                    </div>
                                    <div class="lineVertical"></div>
                                    <div class="flexColumn flexCenter">
                                        <p class="bold">Origine</p>
                                        <p><?=$character->getOrigin()?></p>
                                    </div>
                                    <div class="lineVertical"></div>
                                    <div class="flexColumn flexCenter">
                                        <p class="bold">Lieu d'origine</p>
                                        <p><?=$character->getPlace()?></p>
                                    </div>
                                    <div class="lineVertical"></div>
                                </div>
                            <div class="lineHorizontal width_90 lineBottom"></div>
                        </div>

                        <h2 class="titleDescription">1ERE APPARITION</h2>
                        <div class="flexCenter flexColumn background">
                            <img class="width_20 picturesBook" src="../assets/img/characters/book/<?=$character->getPicturesBook()?>" alt="<?=$character->getTitleBook()?>">
                            <p><?=$character->getTitleBook()?></p>
                        </div>

                        <h2 class="titleDescription">CREATEURS</h2>
                        <div class="flexRow flexCenter wrap">
                            <?php
                            if (isset($var['creator'])) {
                                foreach ($var['creator'] as $creator) { ?>
                                    <div class="flexColumn flexCenter">
                                        <img class="imageChara" src="../assets/img/creator/<?=$creator->getCreatorFk()->getPicture()?>" alt="<?=$creator->getCreatorFk()->getFirstname() . " " . $creator->getCreatorFk()->getLastname()?>">
                                        <p><?=$creator->getCreatorFk()->getFirstname() . " " . $creator->getCreatorFk()->getLastname()?></p>
                                    </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                        <?php
                        if (isset($_SESSION['role_fk'])) {
                            if ($_SESSION['role_fk'] !== 2) {?>
                                <div class="flexRow flexCenter containerView">
                                    <a href="../index.php?controller=character&action=add"><i class="fas fa-plus buttonView"></i></a>
                                </div>
                                <?php
                            }
                        } ?>
                        <h2 class="titleDescription">ACTIVITES</h2>
                        <p class="center background"><?=$character->getActivity()?></p>
                        <?php
                        if ($character->getCharacteristic() !== "") {?>
                            <h2 class="titleDescription">CARACTERISTIQUES</h2>
                            <p class="center"><?=$character->getCharacteristic()?></p>
                            <?php
                        } ?>
                        <h2 class="titleDescription">POUVOIRS</h2>
                        <div class="background">
                            <ul class="auto width_70">
                                <?=$character->getPowers()?>
                            </ul>
                        </div>
                        <?php
                        if ($character->getTeam() !== "") { ?>
                            <h2 class="titleDescription">EQUIPE</h2>
                            <div class="flexCenter">
                                <?php
                                if ($character->getTeam() === "Avengers") {?>
                                    <img class="width_20 team" src="https://clipground.com/images/avengers-a-logo-4.png" alt="<?=$character->getTeam()?>">
                                    <?php
                                }
                                ?>
                            </div>
                            <p class="center"><?=$character->getTeam()?></p>
                            <?php
                        }
                            ?>
                        <h2 class="titleDescription">FAMILLE</h2>
                        <p class="center background"><?=$character->getParent()?></p>
                        <?php if ($character->getSituation() !== "") {?>
                            <h2 class="titleDescription">EDUCATION</h2>
                            <p class="center"><?=$character->getSituation()?></p>
                            <?php
                        } ?>
                        <h2 class="titleDescription">BIOGRAPHIE</h2>
                        <div class="background">
                            <div class="width_70 auto">
                                <p><?=$character->getBiography()?></p>
                            </div>
                        </div>
                        <?php
                        if (isset($var['actor'])) {
                            if ($var['actor'] !== []) {?>
                                <h2 class="titleDescription">ACTEURS</h2>
                                <div class="flexRow flexCenter wrap">
                                    <?php
                                    foreach ($var['actor'] as $actor) {?>
                                        <a href="../index.php?controller=actor&action=view&id=<?=$actor->getId()?>" class="flexColumn flexCenter">
                                            <img class="imageChara" src="../assets/img/<?=$actor->getActorFk()->getPicture()?>" alt="<?=$actor->getActorFk()->getFirstname() . " " . $actor->getActorFk()->getLastname()?>">
                                            <p><?=$actor->getActorFk()->getFirstname() . " " . $actor->getActorFk()->getLastname()?></p>
                                        </a>
                                    <?php
                                    } ?>
                                </div>
                                <?php
                                if (isset($_SESSION['role_fk'])) {
                                    if ($_SESSION['role_fk'] !== 2) {?>
                                        <div class="flexRow flexCenter containerView">
                                            <a href="../index.php?controller=character&action=add"><i class="fas fa-plus buttonView"></i></a>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            else {
                                if (isset($_SESSION['role_fk'])) {
                                    if ($_SESSION['role_fk'] !== 2) {?>
                                        <h2 class="titleDescription">ACTEURS</h2>
                                        <div class="flexRow flexCenter containerView">
                                            <a href="../index.php?controller=character&action=add"><i class="fas fa-plus buttonView"></i></a>
                                        </div>
                                        <?php
                                    }
                                }
                            }

                        } ?>
                    </div>
                </div>
            <?php
        }
    }
    ?>
</main>
