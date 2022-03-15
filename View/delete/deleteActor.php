<?php
$manager = new \Chloe\Marvel\Model\Manager\ActorManager();
if (isset($_GET['id'])) {
    $actor = $manager->getActorId($_GET['id']); ?>
    <main id="accountMain">
        <h1 class="title">Supprimer un(e) acteur/rice</h1>
        <div class="flexColumn flexCenter">
            <?php
            foreach ($actor as $value) {?>
                <h2 class="red title2 marginTop"> Voulez-vous vraiment supprimer <?=$value->getFirstname() . " " . $value->getLastname()?> ?</h2>
                <form id="delete" class="width_80 flexColumn flexCenter" method="post" action="">
                    <input type="hidden" name="id" value="<?=$value->getId()?>">
                    <input type="hidden" name="picture" value="<?=$value->getPicture()?>">
                    <input type="hidden" name="picture1" value="<?=$value->getPicture1()?>">
                    <input type="hidden" name="picture2" value="<?=$value->getPicture2()?>">
                    <input type="hidden" name="picture3" value="<?=$value->getPicture3()?>">
                    <input type="submit" class="disconnection buttonEnter" value="Supprimer">
                </form>
                <?php
            }
            ?>
        </div>
    </main>
<?php
}