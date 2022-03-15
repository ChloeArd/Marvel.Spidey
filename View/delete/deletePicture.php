<?php
$manager = new \Chloe\Marvel\Model\Manager\PictureManager();
if (isset($_GET['id'])) {
    $picture = $manager->getPictureId($_GET['id']); ?>
    <main id="accountMain">
        <h1 class="title">Supprimer une photo</h1>
        <div class="flexColumn flexCenter">
            <?php
            foreach ($picture as $value) {?>
                <h2 class="red title2 marginTop"> Voulez-vous vraiment supprimer cette photo ?</h2>
                <form id="delete" class="width_80 flexColumn flexCenter" method="post" action="">
                    <img class="width_30" src="../../assets/img/picture/<?=$value->getPicture()?>">
                    <input type="hidden" name="id" value="<?=$value->getId()?>">
                    <input type="hidden" name="picture" value="<?=$value->getPicture()?>">
                    <input type="submit" class="disconnection buttonEnter" value="Supprimer">
                </form>
                <?php
            }
            ?>
        </div>
    </main>
<?php
}