<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personnages MARVEL</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
</head>
<body>

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

    <main>
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

        <h1 class="title">Photo</h1>

        <div id="flexPicture" class="flexRow wrap picturesAll width_80 auto">
            <div id="modify1" class="width_60 flexRow">
                <div class="width_90">
                    <img class="pictures picture" src="../assets/img/tom1.jpg">
                </div>
                <div class="width_10">
                    <a href="#"><i class="far fa-star logoStar starPosition2"></i></a>
                </div>
            </div>
            <div id="commentPicture" class="width_40 flexCenter flexColumn">
                <h2 class="titlePicture">Spider-Man : Homecoming</h2>
                <h3 class="subtitle marginTop">Description....</h3>
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