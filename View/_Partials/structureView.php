<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link id="logoPage" rel="icon" type="image/png" href="">
    <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<div id="wrap">
    <header class="wrap">
        <div id="menu" class="flexRow flexCenter">
            <img id="logoMarvel" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png" alt="MARVEL.Spidey">
            <a href="../../">Accueil</a>
            <a href="../characters.php">Personnages</a>
            <a href="../movies.php">Films</a>
            <a href="../pictures.php">Photos</a>
            <a href="">Quiz</a>
            <a href="../memory.php">Memory</a>
        </div>
        <div class="account">
            <?php
            if (isset($_SESSION['id'])) { ?>
                <a href="../../index.php?controller=user&action=view"><i class="fas fa-user-circle colorWhite margR"></i><?=$_SESSION['pseudo']?></a>
            <?php
            }
            else { ?>
                <a href="../../index.php?controller=home&page=registration">Inscription</a>
                <span class="colorWhite">/</span>
                <a href="../../index.php?controller=home&page=connection">Connexion</a>
            <?php
            }
            ?>
        </div>
        <div id="menuMobile" class="flexRow align width_100">
            <p id="logoMenu"><i class="fas fa-bars colorWhite"></i></p>
            <img id="logoMarvel" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png" alt="MARVEL.Spidey">
        </div>
    </header>

    <?= $html ?>

    <footer class="flexRow">
        <div class="flexRow flexCenter">
            <img class="width_70" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png" alt="MARVEL.Spidey">
        </div>
        <div class="flexRow flexCenter content">
            <a class="colorWhite" href="#">Mentions légales</a>
            <a class="colorWhite" href="#">Contact</a>
        </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="../../assets/js/app.js"></script>
</body>
</html>