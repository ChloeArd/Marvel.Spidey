<?php
$manager = new \Chloe\Marvel\Model\Manager\PictureManager();
$picture = $manager->getPictureId($_GET['id']);?>
<main id="accountMain">
    <h1 class="title">Retirer le signalement d'une photo</h1>
    <div class="flexColumn flexCenter">
        <?php
        foreach ($picture as $value) {?>
            <h2 class="red title2 marginTop"> Voulez-vous vraiment retirer le signalement de cette photo ?</h2>
            <form id="delete" class="width_50 flexColumn flexCenter" method="post" action="">
                <div class="pictures">
                    <img class="width_100" src="../assets/img/picture/<?=$value->getPicture()?>" alt="<?=$value->getTitle()?>">
                </div>

                <input type="hidden" name="id" value="<?=$value->getId()?>">
                <input type="hidden" name="user_fk" value="<?=$value->getUserFk()->getId()?>">

                <input type="submit" name="send" class="disconnection buttonEnter" value="Retirer">
            </form>
            <?php
        }
        ?>
    </div>
</main>