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

        <h1 class="title">Bienvenue, ChloeArd !</h1>

        <div  class="width_80 auto">
            <div class="flexCenter">
                <img class="imageChara" src="https://tse2.mm.bing.net/th?id=OIP.QV-PHx-CKWn3BZsxpDFsmgHaHa&pid=Api&P=0&w=300&h=300" alt="Prénom Nom">
            </div>
            <div id="accountPage" class="flexRow">
                <div id="menuAccount" class="menuAccount width_20 flexColumn">
                    <a href="#">Mon profil</a>
                    <a href="#">Mes photos</a>
                    <a href="#">Mes favoris</a>
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
                        <a href="#">Mon profil</a>
                        <a href="#">Mes photos</a>
                        <a href="#">Mes favoris</a>
                        <a href="#">Gestion des utilisateurs</a>
                        <a href="#">Gestion des personnages</a>
                        <a href="#">Gestion des films</a>
                        <a href="#">Gestion des photos</a>
                        <a href="#">Gestion des quiz</a>
                        <a class="disconnection" href="#">Me déconnecter</a>
                    </div>
                </div>

                <div class="menuAccount contentAccount width_80 flexCenter flexColumn">
                    <p class="red info width_100">Pseudo : <span class="colorWhite">ChloeArd</span></p>
                    <p class="red info width_100">Email : <span class="colorWhite">prenom.nom@gmail.com</span></p>
                    <a href="update/updateAccount.php" class="width_40 flexCenter edit1">Modifier <i class="far fa-edit"></i></a>
                    <a href="update/updatePassword.php" class="width_40 flexCenter edit2">Changer mon mot de passe<i class="far fa-edit"></i></a>
                    <a href="delete/deleteAccount.php" class="width_40 flexCenter disconnection deleteButton">Supprimer mon compte</a>
                </div>
            </div>
        </div>

    </main>

    <footer class="flexRow">
        <div class="flexRow flexCenter">
            <img class="width_70" src="https://cdn.discordapp.com/attachments/689017273050202134/872534195547828265/marvel.png">
        </div>
        <div class="flexRow flexCenter content">
            <a class="colorWhite" href="#">Mentions légales</a>
            <a class="colorWhite" href="contact.php">Contact</a>
        </div>
    </footer>

<script src="/assets/js/app2.js"></script>

</body>
</html>