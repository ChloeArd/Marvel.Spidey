<main>
    <h1 class="title">Photos</h1>

    <form method="post" action="#" class="flexRow">
        <input class="form grey" type="text" name="search">
        <input class="button" type="submit" value="Rechercher" name="submit">
    </form>

    <?php
    if (isset($_SESSION['id'])) {?>
        <div class="flexRow flexCenter containerView">
            <a href="../index.php?controller=picture&action=add"><i class="fas fa-plus buttonView"></i></a>
        </div>
        <?php
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