<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personnages MARVEL</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/memory.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <a id="acceuil" href="../index.php">Acceuil</a>
    <a href="characters.php">Personnages</a>
    <a href="movies.php">Films</a>
    <a href="pictures.php">Photos</a>
    <a href="">Quiz</a>
    <a href="memory.php">Mémory</a>
</header>

<main>
    <h1 class="title">MEMORY</h1>

    <div id="container">

        <div id="game">
            <div class="case" id="case1"></div>
            <div class="case" id="case2"></div>
            <div class="case" id="case3"></div>
            <div class="case" id="case4"></div>
            <div class="case" id="case5"></div>
            <div class="case" id="case6"></div>
            <div class="case" id="case7"></div>
            <div class="case" id="case8"></div>
            <div class="case" id="case9"></div>
            <div class="case" id="case10"></div>
            <div class="case" id="case11"></div>
            <div class="case" id="case12"></div>
        </div>

        <div id="window">
            <div id="endGame"> Fin de partie !</div>
            <div id="scoreGame"> Le score final : <span id="score">0</span>/6</div>
            <button id="replay">Rejouer</button>
        </div>
    </div>

</main>

<footer class="flexRow">
    <div class="flexColumn flexCenter">
        <img class="width_70" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png">
    </div>
</footer>

<script src="/assets/js/memory.js"></script>

</body>
</html>