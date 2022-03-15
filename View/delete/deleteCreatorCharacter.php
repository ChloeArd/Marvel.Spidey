<?php
$manager = new \Chloe\Marvel\Model\Manager\CreatorCharactersManager();
if (isset($_GET['id2'], $_GET['id'])) {
    $c_c = $manager->getCreatorsCharacter2($_GET['id2'], $_GET['id']);?>

    <main id="accountMain">
        <h1 class="title">Supprimer le/la créateur/rice d'un personnage</h1>
        <div class="flexColumn flexCenter">
            <?php
            foreach ($c_c as $value) {?>
                <h2 class="red title2 marginTop"> Voulez-vous vraiment supprimer le/la créateur/rice <?=$value->getCreatorFk()->getFirstname() . " " . $value->getCreatorFk()->getLastname()?> de <?=$value->getCharactersFk()->getPseudo() . " (" . $value->getCharactersFk()->getFirstname() . " " . $value->getCharactersFk()->getLastname() . ")"?>?</h2>
                <form id="delete" class="width_80 flexColumn flexCenter" method="post" action="">
                    <input type="hidden" name="id" value="<?=$value->getId()?>">
                    <input type="hidden" name="id2" value="<?=$value->getCharactersFk()->getId()?>">
                    <input type="submit" class="disconnection buttonEnter" value="Supprimer">
                </form>
                <?php
            }
            ?>
        </div>
    </main>
    <?php
}