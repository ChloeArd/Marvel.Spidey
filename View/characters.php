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

        <?php
        if (isset($_SESSION['role_fk'])) {
            if ($_SESSION['role_fk'] !== 2) {?>
                <div class="flexRow flexCenter containerView">
                    <a href="../index.php?controller=actor&action=add"><i class="fas fa-plus buttonView"></i></a>
                </div>
                <?php
            }
        }
        ?>


        <?php
        if (isset($_SESSION['role_fk'])) {
            if ($_SESSION['role_fk'] !== 2) {?>
            <h2 class="titleChara">CREATEURS</h2>
            <div class="flexRow flexCenter wrap">
                <?php
                if (isset($var['creators'])) {
                    foreach ($var['creators'] as $actor) { ?>
                        <a class="flexColumn flexCenter">
                            <img class="imageChara" src="../assets/img/creator/<?=$actor->getPicture()?>" alt="<?=$actor->getFirstname() . " " . $actor->getLastname()?>">
                            <p><?=strtoupper($actor->getFirstname()) . " " . strtoupper($actor->getLastname())?></p>
                        </a>
                        <?php
                        if (isset($_SESSION['role_fk'])) {
                            if ($_SESSION['role_fk'] !== 2) {?>
                                <div class="flexColumn flexCenter">
                                    <a href="../index.php?controller=character&action=update&id="><i class="fas fa-edit buttonView"></i></a>
                                    <a href="../index.php?controller=character&action=delete&id="><i class="fas fa-trash-alt buttonView"></i></a>
                                </div>
                                <?php
                            }
                        }
                    }
                }
                ?>
            </div>
            <div class="flexRow flexCenter containerView">
                <a href="../index.php?controller=creator&action=add"><i class="fas fa-plus buttonView"></i></a>
            </div>
            <?php
            }
        }
        ?>
    </main>