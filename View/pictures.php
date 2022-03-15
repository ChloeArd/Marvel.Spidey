<main>
    <h1 class="title">Photos</h1>

    <form method="post" action="#" class="flexRow flexRight width_80 auto marg40">
        <input class="form grey" type="text" placeholder="Rechercher une image" name="search">
        <input class="button" type="submit" value="Rechercher" name="submit">
    </form>

    <?php
    if (isset($_SESSION['id'])) {
        if ($_SESSION['role_fk'] != 2) {?>
            <div class="flexRow flexCenter containerView">
                <a href="../index.php?controller=picture&action=add"><i class="fas fa-plus buttonView"></i></a>
            </div>
            <?php
        }
        else {?>
                <div class="width_80 auto flexRow">
                    <a href="../index.php?controller=picture&action=add" class="button center width_10">Ajouter</a>
                </div>
        <?php }
    }
    ?>

    <div class="flexRow wrap picturesAll">
        <?php
        if (isset($var['pictures'])) {
            foreach ($var['pictures'] as $pictures) {?>
                <a class="pictures" href="../index.php?controller=picture&action=view&id=<?=$pictures->getId()?>">
                    <img class="width_100" src="../assets/img/picture/<?=$pictures->getPicture()?>" alt="<?=$pictures->getTitle()?>">
                </a>
            <?php
            }
        }
        ?>
    </div>
</main>