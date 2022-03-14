<main class="backgroundBlack">
    <h1 class="title">Gestion des photos signalés</h1>

    <div id="accountWidth" class="width_80 auto">
        <div id="accountPage" class="flexRow">

            <?php include "_Partials/menuAccount.php" ?>

            <div class="menuAccount contentAccount width_80 flexColumn">
                <div class="flexColumn wrap width_100">
                    <?php
                    if (isset($var['picture'])) {
                        if ($var['picture'] != []) {
                            foreach ($var['picture'] as $picture) {?>
                                <p class="colorWhite size15">Signalé le : <?=$picture->getDateReport()?></p>
                                <p class="grey size15">Raison : <?=$picture->getWhy()?></p>
                                <div class="pictures">
                                    <img class="width_100" src="../assets/img/picture/<?=$picture->getPicture()?>" alt="<?=$picture->getTitle()?>">
                                </div>
                                <div class="flexRow flexCenter containerView">
                                    <a href="../?controller=picture&action=reportRemove&id=<?=$picture->getId()?>"><i class="fas fa-eye buttonComment"></i></a>
                                    <a href="../?controller=picture&action=update&id=<?=$picture->getId()?>"><i class="fas fa-edit buttonComment"></i></a>
                                    <a href="../?controller=picture&action=delete&id=<?=$picture->getId()?>"><i class="fas fa-trash-alt buttonComment"></i></a>
                                </div>
                                <?php
                            }
                        }
                        else {?>
                            <p class="sentenceGrey center">Pour l'instant, aucun signalement !</p>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
