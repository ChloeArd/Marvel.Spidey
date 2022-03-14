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
<!-- add the class 'backgroundBlack' if we are on the profile -->
<body class="<?php if (isset($_GET['controller']) && $_GET['controller'] === 'user'
                        || isset($_GET['action']) && $_GET['action'] === "myPicture"
                        || isset($_GET['action']) && $_GET['action'] === "reportView") {
    echo "backgroundBlack";
} ?>">

<div id="wrap">
    <header class="wrap">
        <div id="menu" class="flexRow flexCenter">
            <img id="logoMarvel" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png" alt="MARVEL.Spidey">
            <a href="../../">Accueil</a>
            <a href="../../index.php?controller=character&action=viewAll">Personnages</a>
            <a href="../../index.php?controller=movie&action=viewAll">Films</a>
            <a href="../../index.php?controller=picture&action=viewAll">Photos</a>
            <a href="">Quiz</a>
            <a href="../memory.php">Memory</a>
        </div>
        <div class="account">
            <?php
            if (isset($_SESSION['id'])) { ?>
                <a href="../../index.php?controller=user&action=view&id=<?=$_SESSION['id']?>"><i class="fas fa-user-circle colorWhite margR"></i><?=$_SESSION['pseudo']?></a>
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

    <div id="subMenu" class="flexColumn">
        <a class="linkMenuMobile colorWhite flexRow align" href="../../"><i class="fas fa-chevron-circle-right colorWhite"></i>Accueil</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="../../index.php?controller=character&action=viewAll"><i class="fas fa-chevron-circle-right colorWhite"></i>Personnages</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="../../index.php?controller=movie&action=viewAll"><i class="fas fa-chevron-circle-right colorWhite"></i>Films</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="../../index.php?controller=picture&action=viewAll"><i class="fas fa-chevron-circle-right colorWhite"></i>Photos</a>
        <a class="linkMenuMobile colorWhite flexRow align" href=""><i class="fas fa-chevron-circle-right colorWhite"></i>Quiz</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="../memory.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Memory</a>
        <?php
        if (isset($_SESSION['id'])) { ?>
            <a class="linkMenuMobile colorWhite flexRow align" href="../../index.php?controller=user&action=view"><i class="fas fa-chevron-circle-right colorWhite"></i><i class="fas fa-user-circle colorWhite margR"></i><?=$_SESSION['pseudo']?></a>
            <?php
        }
        else { ?>
            <a class="linkMenuMobile colorWhite flexRow align" href="../../index.php?controller=home&page=registration"><i class="fas fa-chevron-circle-right colorWhite"></i>Inscription</a>
            <a class="linkMenuMobile colorWhite flexRow align" href="../../index.php?controller=home&page=connection"><i class="fas fa-chevron-circle-right colorWhite"></i>Connexion</a>
            <?php
        }
        ?>
    </div>

    <?= $html ?>

    <footer class="flexRow">
        <div class="flexRow flexCenter">
            <img class="width_70" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png" alt="MARVEL.Spidey">
        </div>
        <div class="flexRow flexCenter content">
            <a class="colorWhite" href="#">Mentions légales</a>
            <a class="colorWhite" href="../../index.php?controller=home&page=contact">Contact</a>
        </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="../../assets/js/app.js"></script>
<script src="../../assets/js/app2.js"></script>
</body>
</html>