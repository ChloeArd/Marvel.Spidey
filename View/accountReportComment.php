<main class="backgroundBlack">
    <h1 class="title">Gestion des commentaires signalés</h1>

    <div id="accountWidth" class="width_80 auto">
        <div id="accountPage" class="flexRow">
            <div id="menuAccount" class="menuAccount width_20 flexColumn">
                <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id']?>">Mon profil</a>
                <a href="../index.php?controller=picture&action=myPicture&id=<?=$_SESSION['id']?>">Mes photos</a>
                <a href="accountFavorites.php">Mes favoris</a>
                <a href="#">Gestion des utilisateurs
                <a href="../index.php?controller=commentPicture&action=reportView">Gestions des commentaires signalés</a>
                <a href="#">Gestion des personnages</a>
                <a href="#">Gestion des films</a>
                <a href="#">Gestion des photos</a>
                <a href="#">Gestion des quiz</a>
                <a class="disconnection" href="#">Me déconnecter</a>
            </div>
            <div class="flexColumn align">
                <div class="auto">
                    <i id="menuAccountMobile" class="fas fa-caret-down colorWhite"></i>
                </div>
                <div id="subMenuAccount" class="width_20 flexColumn">
                    <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id']?>">Mon profil</a>
                    <a href="../index.php?controller=picture&action=myPicture&id=<?=$_SESSION['id']?>">Mes photos</a>
                    <a href="accountFavorites.php">Mes favoris</a>
                    <a href="#">Gestion des utilisateurs</a>
                    <a href="../index.php?controller=commentPicture&action=reportView">Gestions des commentaires signalés</a>
                    <a href="#">Gestion des personnages</a>
                    <a href="#">Gestion des films</a>
                    <a href="#">Gestion des photos</a>
                    <a href="#">Gestion des quiz</a>
                    <a class="disconnection" href="#">Me déconnecter</a>
                </div>
            </div>

            <div class="menuAccount contentAccount width_80 flexColumn">
                <div class="flexColumn wrap width_100">
                    <?php
                    if (isset($var['comment'])) {
                        if ($var['comment'] != []) {
                            foreach ($var['comment'] as $comment) {?>
                                <p class="colorWhite size15">Signalé le : <?=$comment->getDateReport()?></p>
                                <p class="grey size15">Raison : <?=$comment->getWhy()?></p>
                                <div class="comment bgWhiteComment">
                                    <h4><?=$comment->getUserFk()->getPseudo()?></h4>
                                    <p class="marginTop"><?=$comment->getComment()?></p>
                                </div>
                                <div class="flexRow flexCenter containerView">
                                    <a href="../index.php?controller=commentPicture&action=reportRemove&id=<?=$comment->getPictureFk()->getId()?>&id2=<?=$comment->getId()?>"><i class="fas fa-eye buttonComment"></i></a>
                                    <a href="../index.php?controller=commentPicture&action=update&id=<?=$comment->getPictureFk()->getId()?>&id2=<?=$comment->getId()?>"><i class="fas fa-edit buttonComment"></i></a>
                                    <a href="../index.php?controller=commentPicture&action=delete&id=<?=$comment->getPictureFk()->getId()?>&id2=<?=$comment->getId()?>"><i class="fas fa-trash-alt buttonComment"></i></a>
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
