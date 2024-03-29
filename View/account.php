 <main class="backgroundBlack">
     <div id="accountPage">
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

        <h1 class="title">Mon profil</h1>
        <h2 class="colorWhite marginTop">Bienvenue, <?=$_SESSION['pseudo']?> !</h2>

        <div  class="width_80 auto">
            <div class="flexCenter">
                <?php
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['picture'] !== '' && $_SESSION['picture'] !== null) {?>
                        <img class="imageChara" src="../assets/img/user/<?=$_SESSION['picture']?>" alt="<?=$_SESSION['pseudo']?>">
                    <?php
                    }
                    else { ?>
                        <img class="imageChara" src="https://tse2.mm.bing.net/th?id=OIP.QV-PHx-CKWn3BZsxpDFsmgHaHa&pid=Api&P=0&w=300&h=300" alt="Prénom Nom">
                    <?php
                    }
                }
                ?>
            </div>
            <div id="accountPage" class="flexRow">

                <?php include "_Partials/menuAccount.php" ?>

                <div class="menuAccount contentAccount width_80 flexCenter flexColumn">
                    <p class="red info width_100">Pseudo : <span class="colorWhite"><?=$_SESSION['pseudo']?></span></p>
                    <p class="red info width_100">Email : <span class="colorWhite"><?=$_SESSION['email']?></span></p>
                    <a href="../index.php?controller=user&action=updateAccount&id=<?=$_SESSION['id']?>" class="width_40 flexCenter edit1">Modifier <i class="far fa-edit"></i></a>
                    <a href="update/updatePassword.php" class="width_40 flexCenter edit2 center">Changer mon mot de passe<i class="far fa-edit"></i></a>
                    <a href="delete/deleteAccount.php" class="width_40 flexCenter disconnection center deleteButton">Supprimer mon compte</a>
                </div>
            </div>
        </div>
     </div>
</main>