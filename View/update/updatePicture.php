<?php
$manager = new \Chloe\Marvel\Model\Manager\PictureManager();
$pictures = $manager->getPictureId($_GET['id']);
foreach ($pictures as $picture) { ?>
    <main id="accountMain">
        <h1 class="title">Modifier une photo</h1>
        <div  class="width_80 auto">
            <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">

                <div class="width_40 auto">
                    <img class="width_100" src="../assets/img/picture/<?=$picture->getPicture()?>" alt="<?=$picture->getTitle()?>">
                </div>

                <label for="title">Titre *</label>
                <input class="form" type="text" name="title" id="title" value="<?=$picture->getTitle()?>" required>
                <label for="description">Description *</label>
                <textarea id="description" name="description" class="form" required><?=$picture->getDescription()?></textarea>

                <input type="hidden" name="picture" value="<?=$picture->getPicture()?>" required>
                <input name="date"  type="hidden" id="date" value="<?=$picture->getDate()?>">
                <input type="hidden" name="user_fk" value="<?=$picture->getUserFk()->getId()?>">
                <input type="hidden" name="id" value="<?=$picture->getId()?>">

                <input class="button width_50 auto" type="submit" value="modifier" name="send">
            </form>
        </div>
    </main>
<?php
}