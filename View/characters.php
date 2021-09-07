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

<header class="wrap">
    <div id="menu">
        <img id="logoMarvel" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png">
        <a id="acceuil" href="../index.php">Accueil</a>
        <a href="characters.php">Personnages</a>
        <a href="movies.php">Films</a>
        <a href="pictures.php">Photos</a>
        <a href="">Quiz</a>
        <a href="memory.php">Memory</a>
    </div>

    <div id="menuMobile" class="flexRow align width_100">
        <p id="logoMenu"><i class="fas fa-bars colorWhite"></i></p>
        <img id="logoMarvel" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png">
    </div>

    <div id="subMenu" class="flexColumn">
        <a class="linkMenuMobile flexRow align" href=""><i class="fas fa-chevron-circle-right"></i>Accueil</a>
        <a class="linkMenuMobile flexRow align" href=""><i class="fas fa-chevron-circle-right"></i>Personnages</a>
        <a class="linkMenuMobile flexRow align" href=""><i class="fas fa-chevron-circle-right"></i>Films</a>
    </div>
</header>

<main>
    <h1 class="title">TOUS LES PERSONNAGES SPIDER-MAN</h1>

    <form method="post" action="">
        <div class="right">
            <input class="form" type="text" placeholder="Personnages/Acteur" name="name">
            <input class="button" type="submit" value="Rechercher" name="send">
        </div>
    </form>

    <h2 class="titleChara">PERSONNAGES SPIDER-MAN</h2>
    <div class="flexRow flexCenter">
        <a href="character.php" class="flexColumn flexCenter">
            <img class="imageChara" src="../assets/img/230569264_268125674662999_2556334764745098310_n.jpg" alt="SPIDER-MAN">
            <p>SPIDER-MAN </p>
            <p class="sentenceGrey">PETER PARKER</p>
        </a>
        <a href="" class="flexColumn flexCenter">
            <img class="imageChara" src="../assets/img/morales.jpg" alt="SPIDER-MAN">
            <p>SPIDER-MAN</p>
            <p class="sentenceGrey">MILES MORALES</p>
        </a>
        <a href="" class="flexColumn flexCenter">
            <img class="imageChara" src="../assets/img/spider-man%20black.jpg" alt="SPIDER-MAN">
            <p>SPIDER-MAN NOIR</p>
            <p class="sentenceGrey">PETER PARKER</p>
        </a>
    </div>

    <h2 class="titleChara">ACTEURS</h2>
    <div class="flexRow flexCenter">
        <a href="" class="flexColumn flexCenter">
            <img class="imageChara" src="../assets/img/maguire.jpg" alt="Tobey Maguire">
            <p>Tobey Maguire</p>
        </a>
        <a href="" class="flexColumn flexCenter">
            <img class="imageChara" src="../assets/img/garfield.jpg" alt="Andrew Garfield">
            <p>Andrew Garfield</p>
        </a>
        <a href="actor.php" class="flexColumn flexCenter">
            <img class="imageChara" src="../assets/img/holland.jpg" alt="Tom Holland">
            <p>Tom Holland</p>
        </a>
    </div>

    <h2 class="titleChara">CREATEURS</h2>

</main>

<footer class="flexRow">
    <div class="flexColumn flexCenter">
        <img class="width_70" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png">
    </div>
</footer>

</body>
</html>