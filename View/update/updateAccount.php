<?php
if (isset($var['user'])) {
    foreach ($var['user'] as $user) {?>
        <main class="backgroundBlack">
            <h1 class="title">Modifier mes informations personnelles</h1>
            <div  class="width_80 auto">
                <form id="formConnect" method="post" action="" class="flexColumn width_60" enctype="multipart/form-data">
                    <label for="picture" class="colorWhite">Sélectionner une image de profil (PNG, JPEG, JPG)</label>
                    <input class="button" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg">
                    <span class="colorWhite">(Max: 6Mo)</span>
                    <input name="picture_1" type="hidden" value="<?=$user->getPicture()?>">
                    <?php
                        if ($user->getPicture() !== '' && $user->getPicture() !== null) {?>
                            <img class="width_20" src="../../assets/img/user/<?=$user->getPicture()?>">
                            <?php
                        } ?>
                    <label for="pseudo" class="colorWhite">Pseudo</label>
                    <input id="pseudo" class="form backgroundBlack" type="text" name="pseudo" value="<?=$user->getPseudo()?>">
                    <label for="email" class="colorWhite">Email</label>
                    <input id="email" class="form backgroundBlack" type="email" name="email" value="<?=$user->getEmail()?>">
                    <input type="hidden" name="id" value="<?=$user->getId()?>">
                    <input class="button" type="submit" value="Enregistrer" name="send">
                </form>
            </div>
        </main>
    <?php
    }
}
