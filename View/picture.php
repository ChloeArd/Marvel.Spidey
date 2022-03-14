<main>
    <h1 class="title">Photo</h1>

    <?php
    if (isset($var['picture'])) {
        foreach ($var['picture'] as $picture) {
            if (isset($_SESSION['role_fk'])) {
                if ($_SESSION['role_fk'] !== 2 || $picture->getUserFk()->getId() === $_SESSION['id']) {?>
                    <div class="flexRow flexCenter containerView">
                        <a href="../index.php?controller=picture&action=update&id=<?=$picture->getId()?>"><i class="fas fa-edit buttonView"></i></a>
                        <a href="../index.php?controller=picture&action=delete&id=<?=$picture->getId()?>"><i class="fas fa-trash-alt buttonView"></i></a>
                    </div>
                    <?php
                }
            }  ?>
            <div id="flexPicture" class="flexRow wrap width_80">
                <div id="modify1" class="width_60 flexRow">
                    <div class="width_90">
                        <img class="pictures picture" src="../assets/img/picture/<?=$picture->getPicture()?>" alt="<?=$picture->getTitle()?>">
                    </div>
                    <div class="width_10">
                        <form method="post" action="">
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="picture_fk" value="">
                            <input type="hidden" name="user_fk" value="">
                            <button type="submit" name="send"><i class='far fa-star logoStar starPosition2'></i></button>
                        </form>
                        <a href="../?controller=picture&action=report&id=<?=$picture->getId()?>"><i class="fas fa-exclamation-triangle logoStar starPosition3"></i></a>
                    </div>
                </div>
                <div id="commentPicture" class="width_40 flexColumn">
                    <h2 class="titlePicture"><?=$picture->getTitle()?></h2>
                    <h3 class="subtitle marginTop"><?=$picture->getDescription()?></h3>

                    <h4>Importée par <span class="bold"><?=$picture->getUserFk()->getPseudo()?></span></h4>
                    <div class="width_90 auto">

                        <div class="lineHorizontal2"></div>

                        <div class="center marg40">
                            <?php
                            if (isset($_SESSION['id'])) {?>
                                <a class="button" href="../?controller=commentPicture&action=add&id=<?=$picture->getId()?>">Ajouter un commentaire</a>
                                <?php
                                }
                            else { ?>
                                    <p class="sentenceGrey">Tu dois te connecter pour ajouter un commentaire.</p>
                                <a class="button" href="../?controller=home&page=connection">Me connecter</a>
                            <?php
                            }
                            ?>
                        </div>

                        <h3 class="grey">COMMENTAIRES</h3>

                        <?php
                        if (isset($var['comment'])) {
                            foreach ($var['comment'] as $comment) { ?>
                                <div class="comment">
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        if ($_SESSION['role_fk'] !== 2 || $comment->getUserFk()->getId() === $_SESSION['id']) {?>
                                            <div class="flexRow flexCenter end">
                                                <a href="../?controller=commentPicture&action=update&id=<?=$comment->getPictureFk()->getId()?>&id2=<?=$comment->getId()?>"><i class="fas fa-edit buttonComment"></i></a>
                                                <a href="../?controller=commentPicture&action=delete&id=<?=$comment->getPictureFk()->getId()?>&id2=<?=$comment->getId()?>"><i class="fas fa-trash-alt buttonComment"></i></a>
                                                <a href="../?controller=commentPicture&action=report&id=<?=$comment->getPictureFk()->getId()?>&id2=<?=$comment->getId()?>"><i class="fas fa-exclamation-triangle logoStar"></i></a>
                                            </div>
                                            <?php
                                        }
                                    }
                                    else {?>
                                        <div class="flexRow flexCenter end">
                                            <a href=""><i class="fas fa-exclamation-triangle logoStar"></i></a>
                                        </div>
                                    <?php
                                    }?>
                                    <h4><?=$comment->getUserFk()->getPseudo()?></h4>
                                    <p class="marginTop"><?=$comment->getComment()?></p>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</main>