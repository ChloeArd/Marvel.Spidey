    <main>
        <h1 class="title">TOUS LES PERSONNAGES SPIDER-MAN</h1>

        <form method="post" action="">
            <div class="right">
                <input class="form" type="text" placeholder="Personnages/Acteur" name="name">
                <input class="button" type="submit" value="Rechercher" name="send">
            </div>
        </form>

        <h2 class="titleChara">PERSONNAGES SPIDER-MAN</h2>
        <div class="flexRow flexCenter wrap">
            <?php
            if (isset($var['characters'])) {
                foreach ($var['characters'] as $character) { ?>
                    <a href="../index.php?controller=character&action=view&id=<?=$character->getId()?>" class="flexColumn flexCenter">
                        <img class="imageChara" src="../assets/img/characters/<?=$character->getPicture()?>" alt="<?=$character->getPseudo()?>>">
                        <p><?=strtoupper($character->getPseudo())?> </p>
                        <p class="sentenceGrey"><?=strtoupper($character->getFirstname()) . " " . strtoupper($character->getLastname())?> </p>
                    </a>
                    <?php
                }
            }
            ?>
            <a href="" class="flexColumn flexCenter">
                <img class="imageChara" src="../assets/img/morales.jpg" alt="SPIDER-MAN">
                <p>SPIDER-MAN</p>
                <p class="sentenceGrey">MILES MORALES</p>
            </a>
            <a href="" class="flexColumn flexCenter">
                <img class="imageChara" src="../assets/img/spider-man%20black.jpg" alt="SPIDER-MAN">
                <p>SPIDER-MAN NOIR</p>
                <p class="sentenceGrey">PETER PARKER</p>
            </a>
        </div>

        <h2 class="titleChara">ACTEURS</h2>
        <div class="flexRow flexCenter wrap">
            <?php
            if (isset($var['actors'])) {
                foreach ($var['actors'] as $actor) { ?>
                    <a href="../index.php?controller=actor&action=view&id=<?=$actor->getId()?>" class="flexColumn flexCenter">
                        <img class="imageChara" src="../assets/img/<?=$actor->getPicture()?>" alt="<?=$actor->getFirstname() . " " . $actor->getLastname()?>">
                        <p><?=strtoupper($actor->getFirstname()) . " " . strtoupper($actor->getLastname())?></p>
                    </a>
                    <?php
                }
            }
            ?>
        </div>

        <h2 class="titleChara">CREATEURS</h2>

    </main>