<?php
$manager = new \Chloe\Marvel\Model\Manager\CommentPictureManager();
$comments = $manager->getCommentPictureId(intval($_GET['id']), intval($_GET['id2']));

foreach($comments as $comment) {?>
    <main id="accountMain">
        <h1 class="title">Modifier un commentaire</h1>
        <div  class="width_80 auto">
            <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">

                <label for="comment">Commentaire *</label>
                <textarea id="comment" name="comment" class="form" required><?=$comment->getComment()?></textarea>

                <input name="date"  type="hidden" id="date" value="<?=$comment->getDate()?>">
                <input type="hidden" name="user_fk" value="<?=$comment->getUserFk()->getId()?>">
                <input type="hidden" name="picture_fk" value="<?=$comment->getPictureFk()->getId()?>">
                <input type="hidden" name="id" value="<?=$comment->getId()?>">

                <input class="button width_50 auto" type="submit" value="Modifier" name="send">
            </form>
        </div>
    </main>
    <?php
}