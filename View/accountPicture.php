 <main class="backgroundBlack">
    <h1 class="title">Mes photos</h1>

    <div id="accountWidth" class="width_80 auto">
        <div id="accountPage" class="flexRow">

            <?php include "_Partials/menuAccount.php" ?>

            <div class="menuAccount contentAccount width_80 flexCenter flexColumn">
                <p class="sentenceGrey">* Survolez la photo que vous voulez modifier ou supprimer *</p>
                <div class="flexRow wrap picturesAll width_100">
                    <?php
                    if (isset($var['pictures'])) {
                        foreach ($var['pictures'] as $pictures) {?>
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img class="pictures" src="../assets/img/picture/<?=$pictures->getPicture()?>" alt="<?=$pictures->getTitle()?>">
                                </div>
                                <div class="flip-card-back">
                                    <h1 class="red"><?=$pictures->getTitle()?></h1>
                                    <p class="datePubli">Publiée le : <?=$pictures->getDate()?></p>
                                    <div class="marginTop">
                                        <a href="../index.php?controller=picture&action=update&id=<?=$pictures->getId()?>" class="linkMenuMobile logoEdit"><i class="far fa-edit"></i></a>
                                        <a href="#" class="linkMenuMobile logoDelete"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
