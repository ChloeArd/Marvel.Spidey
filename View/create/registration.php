<main>
    <div id="subMenu" class="flexColumn">
        <a class="linkMenuMobile colorWhite flexRow align" href="../../index.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Accueil</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="../characters.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Personnages</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="../movies.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Films</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="../pictures.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Photos</a>
        <a class="linkMenuMobile colorWhite flexRow align" href=""><i class="fas fa-chevron-circle-right colorWhite"></i>Quiz</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="../memory.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Memory</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="registration.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Inscription</a>
        <a class="linkMenuMobile colorWhite flexRow align" href="../connection.php"><i class="fas fa-chevron-circle-right colorWhite"></i>Connexion</a>
    </div>
    <h1 class="title">Inscrivez-vous</h1>

    <form id="formConnect" method="post" action="../../assets/php/registration.php" class="flexColumn">
        <label for="pseudo">Pseudo *</label>
        <input id="pseudo" class="form" type="text" name="pseudo" required>
        <label for="email">Email *</label>
        <input id="email" class="form" type="email" name="email" required>
        <label for="password">Mot de passe *</label>
        <p class="alertMdp">Le mdp doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et doit etre supérieur à 8 caractères.</p>
        <input id="password" class="form" type="password" name="password" required>
        <label for="password">Répet du mot de passe *</label>
        <input id="password" class="form" type="password" name="passwordR" required>
        <input class="button" type="submit" value="M'inscrire" name="send">
    </form>
</main>