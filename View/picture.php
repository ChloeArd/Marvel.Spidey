<main>
    <h1 class="title">Photo</h1>

    <?php
    if (isset($var['picture'])) {
        foreach ($var['picture'] as $picture) {?>
            <div id="flexPicture" class="flexRow wrap picturesAll width_80 auto">
                <div id="modify1" class="width_60 flexRow">
                    <div class="width_90">
                        <img class="pictures picture" src="../assets/img/picture/<?=$picture->getPicture()?>" alt="<?=$picture->getTitle()?>">
                    </div>
                    <div class="width_10">
                        <a href="#"><i class="far fa-star logoStar starPosition2"></i></a>
                        <a href=""><i class="fas fa-exclamation-triangle logoStar starPosition3"></i></a>
                    </div>
                </div>
                <div id="commentPicture" class="width_40 flexCenter flexColumn">
                    <h2 class="titlePicture"><?=$picture->getTitle()?></h2>
                    <h3 class="subtitle marginTop"><?=$picture->getDescription()?></h3>
                    <div class="width_90 auto">

                        <div class="lineHorizontal2"></div>

                        <h3 class="grey">COMMENTAIRES</h3>

                        <div class="comment">
                            <h4>Pseudo</h4>
                            <p class="marginTop">Contenuuuuuuuu...</p>
                        </div>
                        <div class="comment">
                            <h4>Pseudo</h4>
                            <p class="marginTop">Contenuuuuuuuu...</p>
                        </div>
                        <div class="comment">
                            <h4>Pseudo</h4>
                            <p class="marginTop">Contenuuuuuuuu...</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</main>