<?php
$id = $_GET['id'];
$manager = new \Chloe\Marvel\Model\Manager\CommentPictureManager();
$comment = $manager->getCommentPictureId($_GET['id'], $_GET['id2']);?>
<main id="accountMain">
    <h1 class="title">Retirer le signalement d'un commentaire</h1>
    <div class="flexColumn flexCenter">
        <?php
        foreach ($comment as $value) {?>
            <h2 class="red title2 marginTop"> Voulez-vous vraiment retirer le signalement de ce commentaire ?</h2>
            <form id="delete" class="width_50 flexColumn flexCenter" method="post" action="">
                <div class="comment">
                    <h4><?=$value->getUserFk()->getPseudo()?></h4>
                    <p class="marginTop"><?=$value->getComment()?></p>
                </div>

                <input type="hidden" name="id" value="<?=$value->getId()?>">
                <input type="hidden" name="picture_fk" value="<?=$value->getPictureFk()->getId()?>">
                <input type="hidden" name="user_fk" value="<?=$value->getUserFk()->getId()?>">

                <input type="submit" name="send" class="disconnection buttonEnter" value="Retirer">
            </form>
            <?php
        }
        ?>
    </div>
</main>