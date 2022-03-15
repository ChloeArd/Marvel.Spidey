<?php
$manager = new \Chloe\Marvel\Model\Manager\CreatorManager();
if (isset($_GET['id'])) {
    $creator = $manager->getCreatorId($_GET['id']); ?>
    <main id="accountMain">
        <h1 class="title">Supprimer un(e) créateur/rice</h1>
        <div class="flexColumn flexCenter">
            <?php
            foreach ($creator as $value) {?>
                <h2 class="red title2 marginTop"> Voulez-vous vraiment supprimer <?=$value->getFirstname() . " " . $value->getLastname()?> ?</h2>
                <form id="delete" class="width_80 flexColumn flexCenter" method="post" action="">
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