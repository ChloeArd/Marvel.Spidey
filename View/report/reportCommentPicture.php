<?php
$id = $_GET['id'];
$manager = new \Chloe\Marvel\Model\Manager\CommentPictureManager();
$comment = $manager->getCommentPictureId($_GET['id'], $_GET['id2']);
date_default_timezone_set("Europe/Paris"); ?>
<main id="accountMain">
    <h1 class="title">Signaler un commentaire</h1>
    <div class="flexColumn flexCenter">
        <?php
        foreach ($comment as $value) {?>
            <h2 class="red title2 marginTop"> Voulez-vous vraiment signaler ce commentaire ?</h2>
            <form id="delete" class="width_50 flexColumn flexCenter" method="post" action="">
                <div class="comment">
                    <h4><?=$value->getUserFk()->getPseudo()?></h4>
                    <p class="marginTop"><?=$value->getComment()?></p>
                </div>

                <label for="why">Pourquoi ? *</label>
                <textarea id="why" name="why" class="form width_100" required></textarea>

                <input type="hidden" name="date_report" value="<?= date('d/m/Y') ?>">
                <input type="hidden" name="id" value="<?=$value->getId()?>">
                <input type="hidden" name="picture_fk" value="<?=$value->getPictureFk()->getId()?>">
                <input type="hidden" name="user_fk" value="<?=$value->getUserFk()->getId()?>">

                <input type="submit" name="send" class="disconnection buttonEnter" value="Signaler">
            </form>
            <?php
        }
        ?>
    </div>
</main>