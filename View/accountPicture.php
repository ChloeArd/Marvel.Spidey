 <main class="backgroundBlack">
    <h1 class="title">Mes photos</h1>

    <div id="accountWidth" class="width_80 auto">
        <div id="accountPage" class="flexRow">
            <div id="menuAccount" class="menuAccount width_20 flexColumn">
                <a href="account.php">Mon profil</a>
                <a href="accountPicture.php">Mes photos</a>
                <a href="accountFavorites.php">Mes favoris</a>
                <a href="#">Gestion des utilisateurs</a>
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
                    <a href="account.php">Mon profil</a>
                    <a href="accountPicture.php">Mes photos</a>
                    <a href="accountFavorites.php">Mes favoris</a>
                    <a href="#">Gestion des utilisateurs</a>
                    <a href="#">Gestion des personnages</a>
                    <a href="#">Gestion des films</a>
                    <a href="#">Gestion des photos</a>
                    <a href="#">Gestion des quiz</a>
                    <a class="disconnection" href="#">Me déconnecter</a>
                </div>
            </div>

            <div class="menuAccount contentAccount width_80 flexCenter flexColumn">
                <p class="sentenceGrey">*Survolez la photo que vous voulez modifier ou supprimer*</p>
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
                                        <a href="#" class="linkMenuMobile logoEdit"><i class="far fa-edit"></i></a>
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
