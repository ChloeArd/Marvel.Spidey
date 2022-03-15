 <main>
        <h1 class="title">Films</h1>

     <?php
     if (isset($_SESSION['id'])) {
         if ($_SESSION['role_fk'] != 2) {?>
             <div class="flexRow flexCenter containerView">
                 <a href="../index.php?controller=movie&action=add"><i class="fas fa-plus buttonView"></i></a>
             </div>
             <?php
         }
     }

     if (isset($var['movies_TH'])) { ?>
         <h2 class="titleChara">SPIDER-MAN : TOM HOLLAND</h2>
         <div id="containerMovies" class="width_80 flexRow wrap auto flexCenter">
         <?php
        foreach ($var['movies_TH'] as $movie) {?>
            <a href="../index.php?controller=movie&action=view&id=<?=$movie->getId()?>" class="width_px center">
                <img class="imgMovies" src="../assets/img/movie/<?=$movie->getPicture()?>" alt="<?=$movie->getTitle()?>">
                <p class="titleMovies"><?=$movie->getTitle()?></p>
            </a>
        <?php
         } ?>
         </div>
    <?php
     }

     if (isset($var['movies_AG'])) { ?>
     <h2 class="titleChara">SPIDER-MAN : ANDREW GARFIELD</h2>
     <div id="containerMovies" class="width_80 flexRow wrap auto flexCenter">
         <?php
         foreach ($var['movies_AG'] as $movie) {?>
             <a href="../index.php?controller=movie&action=view&id=<?=$movie->getId()?>" class="width_px center">
                 <img class="imgMovies" src="../assets/img/movie/<?=$movie->getPicture()?>" alt="<?=$movie->getTitle()?>">
                 <p class="titleMovies"><?=$movie->getTitle()?></p>
             </a>
             <?php
         } ?>
     </div>
     <?php
     }

     if (isset($var['movies_TM'])) { ?>
         <h2 class="titleChara">SPIDER-MAN : TOBEY MAGUIRE</h2>
         <div id="containerMovies" class="width_80 flexRow wrap auto flexCenter">
             <?php
             foreach ($var['movies_TM'] as $movie) {?>
                 <a href="../index.php?controller=movie&action=view&id=<?=$movie->getId()?>" class="width_px center">
                     <img class="imgMovies" src="../assets/img/movie/<?=$movie->getPicture()?>" alt="<?=$movie->getTitle()?>">
                     <p class="titleMovies"><?=$movie->getTitle()?></p>
                 </a>
                 <?php
             } ?>
         </div>
         <?php
     }
     ?>

    </main>