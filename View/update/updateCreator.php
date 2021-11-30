<?php
$manager = new \Chloe\Marvel\Model\Manager\CreatorManager();
$creators = $manager->getCreatorId($_GET['id']);
foreach ($creators as $creator) { ?>

    <main id="accountMain">
        <h1 class="title">Modifier un(e) créateur/rice</h1>
        <div  class="width_80 auto">
            <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">

                <div class="flexRow align">
                    <div class="flexColumn width_50 margR">
                        <label for="firstname">Son prénom *</label>
                        <input class="form" type="text" name="firstname" id="firstname" value="<?=$creator->getFirstname()?>" required>
                    </div>
                    <div class="flexColumn width_50">
                        <label for="lastname">Son nom *</label>
                        <input class="form" type="text" name="lastname" id="lastname" value="<?=$creator->getLastname()?>" required>
                    </div>
                </div>

                <label for="picture_4">Photo actuelle </label>
                <input type="hidden" name="picture_1" value="<?=$creator->getPicture()?>"">
                <img class="width_10" src="../../assets/img/creator/<?=$creator->getPicture()?>">

                <label for="picture">Nouvelle photo </label>
                <input class="button" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg">
                <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

                <input type="hidden" name="id" value="<?=$creator->getId()?>">

                <input class="button width_50 auto" type="submit" value="Modifier" name="send">
            </form>
        </div>
    </main>
<?php
}