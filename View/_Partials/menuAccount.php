    <div id="menuAccount" class="menuAccount width_20 flexColumn">
        <a href="../?controller=user&action=view&id=<?=$_SESSION['id']?>">Mon profil</a>
        <a href="../?controller=picture&action=myPicture&id=<?=$_SESSION['id']?>">Mes photos</a>
        <a href="../?controller=picture&favorite=view">Mes favoris</a>
        <a href="#">Gestion des utilisateurs
            <a href="../?controller=commentPicture&action=reportView">Gestions des commentaires signalés</a>
            <a href="../?controller=picture&action=reportView">Gestions des photos signalés</a>
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
            <a href="../?controller=user&action=view&id=<?=$_SESSION['id']?>">Mon profil</a>
            <a href="../?controller=picture&action=myPicture&id=<?=$_SESSION['id']?>">Mes photos</a>
            <a href="../?controller=picture&favorite=view">Mes favoris</a>
            <a href="#">Gestion des utilisateurs</a>
            <a href="../?controller=commentPicture&action=reportView">Gestions des commentaires signalés</a>
            <a href="../?controller=picture&action=reportView">Gestions des photos signalés</a>
            <a href="#">Gestion des personnages</a>
            <a href="#">Gestion des films</a>
            <a href="#">Gestion des photos</a>
            <a href="#">Gestion des quiz</a>
            <a class="disconnection" href="#">Me déconnecter</a>
        </div>
    </div>