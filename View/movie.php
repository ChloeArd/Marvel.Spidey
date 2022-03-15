<?php
if (isset($var['movie'])) {
    foreach ($var['movie'] as $movie) {?>
     <main>
        <h1 class="title"><?=$movie->getTitle()?></h1>

         <?php
         if (isset($_SESSION['role_fk'])) {
             if ($_SESSION['role_fk'] != 2) {?>
                 <div class="flexRow flexCenter containerView">
                     <a href="../index.php?controller=movie&action=update&id=<?=$movie->getId()?>"><i class="fas fa-edit buttonView"></i></a>
                     <a href="../index.php?controller=movie&action=delete&id=<?=$movie->getId()?>"><i class="fas fa-trash-alt buttonView"></i></a>
                 </div>
                 <?php
             }
         }  ?>
        <div id="infoMovie" class="flexRow contentCenter marginTop auto">
            <img class="imgMovies" src="../assets/img/movie/<?=$movie->getPicture()?>">
            <div class="lineVertical2"></div>
            <div class="flexColumn marginTop">
                <p class="bold"><?=$movie->getTitle()?></p>
                <p class="description"><?=$movie->getTime()?></p>
                <p class="description"><?=$movie->getGenre()?></p>
                <p class="description"><span class="sentenceGrey">Sortie le : </span> <?=$movie->getDate()?></p>
                <p class="description"><span class="sentenceGrey">Réalisé par : </span><?=$movie->getDirector()?></p>
                <p class="description"><span class="sentenceGrey">Avec : </span><?=$movie->getActors()?></p>
            </div>
            <div class="lineVertical2"></div>
            <div id="synopsis" class="flexColumn width_40">
                <h3 class="bold marginTop red">Synopsis</h3>
                <p class="marginTop"><?=$movie->getSynopsis()?></p>
            </div>
        </div>

        <div class="video flexCenter">
            <?=$movie->getVideo()?>
        </div>

        <div class="lineHorizontal2"></div>
        <div class="width_70 auto">
            <h3 class="red">COMMENTAIRES</h3>

            <?php
            if (isset($_SESSION['id'])) {?>
                <a class="button" href="../index.php?controller=commentMovie&action=add&id=<?=$movie->getId()?>">Ajouter un commentaire</a>
                <?php
            }
            else { ?>
                <p class="sentenceGrey">Tu dois te connecter pour ajouter un commentaire.</p>
                <a class="button" href="../index.php?controller=home&page=connection">Me connecter</a>
                <?php
            }
            ?>

            <div class="comment">
                <h4>Pseudo</h4>
                <p class="marginTop">Contenuuuuuuuu...</p>
            </div>
        </div>
    </main>
<?php
    }
}