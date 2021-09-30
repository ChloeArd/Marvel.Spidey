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
        <div id="menu">
            <img id="logoMarvel" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png">
            <a href="../index.php">Accueil</a>
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
    </header>

    <main>
        <div id="subMenu" class="flexColumn">
            <a class="linkMenuMobile colorWhite flexRow align" href="../index.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Accueil</a>
            <a class="linkMenuMobile colorWhite flexRow align" href="characters.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Personnages</a>
            <a class="linkMenuMobile colorWhite flexRow align" href="movies.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Films</a>
            <a class="linkMenuMobile colorWhite flexRow align" href="pictures.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Photos</a>
            <a class="linkMenuMobile colorWhite flexRow align" href=""><i class="fas fa-chevron-circle-right colorWhite"></i>Quiz</a>
            <a class="linkMenuMobile colorWhite flexRow align" href="memory.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Memory</a>
        </div>
        <h1 class="title">Nom du film</h1>

        <div id="infoMovie" class="flexRow contentCenter marginTop auto">
            <img class="imgMovies" src="https://fr.web.img3.acsta.net/c_310_420/pictures/16/03/11/09/46/182814.jpg">
            <div class="lineVertical2"></div>
            <div class="flexColumn marginTop">
                <p class="bold">Nom du film</p>
                <p class="description">2h 13 min</p>
                <p class="description">Action</p>
                <p class="description"><span class="sentenceGrey">Sortie le :</span> 12 juillet 2017</p>
                <p class="description"><span class="sentenceGrey">Réalisé par :</span> Prénom Nom</p>
                <p class="description"><span class="sentenceGrey">Avec :</span> acteur, acteur, actrice, ...</p>
            </div>
            <div class="lineVertical2"></div>
            <div id="synopsis" class="flexColumn width_40">
                <h3 class="bold marginTop red">Synopsis</h3>
                <p class="marginTop">Après ses spectaculaires débuts dans Captain America : Civil War, le jeune Peter Parker découvre peu à peu
                    sa nouvelle identité, celle de Spider-Man, le super-héros lanceur de toile. Galvanisé par son expérience avec
                    les Avengers, Peter rentre chez lui auprès de sa tante May, sous l’œil attentif de son nouveau mentor, Tony Stark.
                    Il s’efforce de reprendre sa vie d’avant, mais au fond de lui, Peter rêve de se prouver qu’il est plus que le
                    sympathique super héros du quartier. L’apparition d’un nouvel ennemi, le Vautour, va mettre en danger tout ce
                    qui compte pour lui...</p>
            </div>
        </div>

        <div class="video flexCenter">
            <iframe width="971" height="546" src="https://www.youtube.com/embed/tdFmJ8LR2PQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="lineHorizontal2"></div>
        <div class="width_70 auto">
            <h3 class="red">COMMENTAIRES</h3>

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