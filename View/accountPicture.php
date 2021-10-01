<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personnages MARVEL</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
</head>
<body class="backgroundBlack">

<div id="wrap">
    <header class="wrap">
        <div id="menu" class="flexRow flexCenter">
            <img id="logoMarvel" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png">
            <a href="../index.php">Accueil</a>
            <a href="characters.php">Personnages</a>
            <a href="movies.php">Films</a>
            <a href="pictures.php">Photos</a>
            <a href="">Quiz</a>
            <a href="memory.php">Memory</a>
        </div>
        <div class="account">
            <a href="create/registration.php">Inscription</a>
            <span class="colorWhite">/</span>
            <a href="connection.php">Connexion</a>
        </div>
        <div id="menuMobile" class="flexRow align width_100">
            <p id="logoMenu"><i class="fas fa-bars colorWhite"></i></p>
            <img id="logoMarvel" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png" alt="nom image">
        </div>
    </header>

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
                        for ($i = 0; $i < 6; $i++) { ?>
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img class="pictures" src="../assets/img/tom<?=$i+1?>.jpg" alt="Avatar"">
                                    </div>
                                    <div class="flip-card-back">
                                        <h1 class="red">Title</h1>
                                        <p class="datePubli">Publiée le : 00/00/0000</p>
                                        <div class="marginTop">
                                            <a href="#" class="linkMenuMobile logoEdit"><i class="far fa-edit"></i></a>
                                            <a href="#" class="linkMenuMobile logoDelete"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer class="flexRow">
        <div class="flexColumn flexCenter">
            <img class="width_70" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png">
        </div>
    </footer>
</div>

<script src="/assets/js/app2.js"></script>

</body>
</html>