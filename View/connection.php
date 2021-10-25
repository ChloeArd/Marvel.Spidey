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
    <h1 class="title">Connectez-vous</h1>

    <form id="formConnect" method="post" action="../assets/php/connection.php" class="flexColumn">
        <label for="pseudo">Pseudo</label>
        <input id="pseudo" class="form" type="text" name="pseudo" required>
        <label for="password">Mot de passe</label>
        <input id="password" class="form" type="password" name="password" required>
        <a href="#" class="red forget">Mot de passe oublié ?</a>
        <input class="button" type="submit" value="Me connecter" name="send">
    </form>
</main>