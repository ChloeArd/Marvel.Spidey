<?php
$manager = new \Chloe\Marvel\Model\Manager\CarouselManager();
$carousel = $manager->getCarousels();
?>
<main id="accountMain">
    <h1 class="title">Supprimer une image du carousel</h1>
    <div class="flexColumn flexCenter">
        <h2 class="red title2"> Voulez-vous vraiment supprimer l'image ?</h2>
        <form id="delete" class="width_80 flexColumn flexCenter" method="post" action="">
            <select>
                <?php
                foreach ($carousel as $value) {?>
                    <option value="<?=$value->getId()?>" name="id" id="id"><?=$value->getTitle()?> - image <?=$value->getId()?></option>
                <?php
                }  ?>
            </select>
            <input type="submit" class="disconnection buttonEnter" value="Supprimer">
        </form>
    </div>
</main>