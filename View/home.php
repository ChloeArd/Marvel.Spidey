<main>
    <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <?php
            for ($i = 1; $i < 16; $i++) {?>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$i?>"></li>
            <?php
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            if (isset($var['carousel'])) {
                foreach ($var['carousel'] as $carousel) {
                    if ($carousel->getId() == 1) {?>
                    <div class="carousel-item active">
                        <img src="../assets/img/carousel/<?=$carousel->getPicture()?>" class="d-block w-100" alt="<?=$carousel->getTitle()?>">
                    </div>
                <?php
                    }
                    else {?>
                        <div class="carousel-item">
                            <img src="../assets/img/carousel/<?=$carousel->getPicture()?>" class="d-block w-100" alt="<?=$carousel->getTitle()?>">
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </a>
    </div>
    <?php
    if (isset($_SESSION['role_fk'])) {
        if ($_SESSION['role_fk'] !== 2) {?>
            <div class="flexRow flexCenter containerView">
                <a href="../index.php?controller=carousel&action=add"><i class="fas fa-plus buttonView"></i></a>
                <a href="../index.php?controller=carousel&action=delete&id="><i class="fas fa-trash-alt buttonView"></i></a>
            </div>
        <?php
        }
    }
    ?>
    <h1 class="titleIndex"><span class="marvelWord">MARVEL.Spidey</span>, un site pour les <strong>fans de Marvel</strong> en particulier de <strong>Spider-Man</strong>.</h1> <br>
    <p class="subtitle">Vous pouvez y trouver la biographie de Spider-Man, les acteurs qui ont interpéter ce héros, les films qu'ils jouent, les créateurs de l'homme arraignée
        et enfin un quiz pour tester vos connaissances en tant que fan de Spidey ! </p>

    <img class="width_30" src="../assets/img/Personnages-celebres-Comics-Spiderman-300509.png">
</main>
