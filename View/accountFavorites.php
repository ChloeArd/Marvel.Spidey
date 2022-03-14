<main id="accountMain">
    <div id="subMenu" class="flexColumn">
        <a class="linkMenuMobile colorWhite flexRow align" href="../index.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Accueil</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="characters.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Personnages</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="movies.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Films</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="pictures.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Photos</a>
        <a class="linkMenuMobile colorWhite flexRow align" href=""><i class="fas fa-chevron-circle-right colorWhite"></i>Quiz</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="memory.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Memory</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="create/registration.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Inscription</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="connection.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Connexion</a>
    </div>

    <h1 class="title">Mes Favoris</h1>

    <div id="accountWidth" class="width_80 auto">
        <div id="accountPage" class="flexRow">

            <?php include "_Partials/menuAccount.php" ?>

            <div class="menuAccount contentAccount width_80 flexColumn">
                <h3 class="colorWhite de">Mes photos favorites</h3>
                <div class="flexRow wrap picturesAll width_100">
                    <?php if (isset($var['favoritesUser'])) {
                        if ($var['favoritesUser'] != []) {
                            foreach ($var['favoritesUser'] as $favoritePicture) {   ?>
                                <img class="pictures" src="../assets/img/picture/<?=$favoritePicture->getPictureFk()->getPicture()?>">
                                <div class="width_10">
                                    <form method="post" action="../?controller=picture&favorite=view&delete=ok&id=<?=$favoritePicture->getPictureFk()->getId() ?>&user=<?=$_SESSION['id'] ?>">
                                        <input type="hidden" name="id" value="<?=$favoritePicture->getId() ?>">
                                        <input type="hidden" name="picture_fk" value="<?=$favoritePicture->getPictureFk()->getId() ?>">
                                        <button type="submit" name="send"><i class='fas fa-star logoStar starPosition2'></i></button>
                                    </form>
                                </div>
                        <?php
                            }
                        }
                        else {?>
                            <div class="flexCenter width_100"><p class="sentenceGrey center">Pour l'instant, aucune photo en favoris !</p></div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <h3 class="colorWhite">Mes films favoris</h3>
                <div id="containerMovies" class="width_80 flexRow wrap auto flexCenter">
                    <a href="movie.php" class="width_px center">
                        <img class="imgMovies"
                             src="https://fr.web.img3.acsta.net/c_310_420/pictures/16/03/11/09/46/182814.jpg">
                        <p class="titleMovies">Captain America : Civil War</p>
                        <div class="width_10">
                            <a href="#"><i class="fas fa-star logoStar starPosition"></i></a>
                        </div>

                    </a>
                    <a href="movie.php" class="width_px center">
                        <img class="imgMovies"
                             src="https://fr.web.img3.acsta.net/c_310_420/pictures/16/03/11/09/46/182814.jpg">
                        <p class="titleMovies">Captain America : Civil War</p>
                        <div class="width_10">
                            <a href="#"><i class="fas fa-star logoStar starPosition"></i></a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</main>