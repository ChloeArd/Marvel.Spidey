<?php
$manager = new \Chloe\Marvel\Model\Manager\ActorManager();
$actors = $manager->getActorId($_GET['id']);
foreach ($actors as $actor) { ?>

    <main id="accountMain">
        <h1 class="title">Modifier un(e) acteur/rice</h1>
        <div  class="width_80 auto">
            <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">
                <h2 class="marg40">Identitée</h2>

                <div class="flexRow align">
                    <div class="flexColumn width_50 margR">
                        <label for="firstname">Son prénom *</label>
                        <input class="form" type="text" name="firstname" id="firstname" value="<?=$actor->getFirstname()?>" required>
                    </div>
                    <div class="flexColumn width_50">
                        <label for="lastname">Son nom *</label>
                        <input class="form" type="text" name="lastname" id="lastname" value="<?=$actor->getLastname()?>" required>
                    </div>
                </div>

                <label for="picture">Image actuelle de l'acteur/rice *</label>
                <input type="hidden" name="picture_1" value="<?=$actor->getPicture()?>">
                <img class="width_20" src="../../assets/img/actor/<?=$actor->getPicture()?>">

                <label for="picture">Nouvelle image de l'acteur/rice </label>
                <input class="button" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg">
                <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

                <label for="birthName">Son nom de naissance *</label>
                <input id="birthName" class="form" type="text" name="birthName" value="<?=$actor->getBirthName()?>" required>

                <label for="birth">Sa date de naissance *</label>
                <input id="birth" class="form" type="date" name="birth" value="<?=$actor->getBirth()?>" required>

                <label for="nationality">Sa nationalitée *</label>
                <input id="nationality" class="form" type="text" name="nationality" value="<?=$actor->getNationality()?>" required>

                <label for="profession">Sa/ses profession(s) *</label>
                <input id="profession" class="form" type="text" name="profession" value="<?=$actor->getProfession()?>" required>

                <label for="biography">Sa biographie *</label>
                <textarea id="biography" name="biography" class="form" required><?=$actor->getBiography()?></textarea>

                <h2 class="marg40">Sa carrière en tant qu'acteur/rice</h2>

                <label for="movies">Ses films *</label>
                <textarea id="movies" name="movies" class="form" required><?=$actor->getMovies()?></textarea>

                <label for="award">Ses récompenses *</label>
                <textarea id="award" name="awards" class="form" required><?=$actor->getAwards()?></textarea>

                <h2 class="marg40">Insérer 3 photos de l'acteur/rice *</h2>

                <label for="picture_2">Image actuelle </label>
                <input type="hidden" name="picture_2" value="<?=$actor->getPicture1()?>">
                <img class="width_10" src="../../assets/img/actor/<?=$actor->getPicture1()?>">

                <label for="pictur1">Nouvelle image </label>
                <input class="button marginTop" type="file" name="picture1" id="picture1" accept="image/png, image/jpeg, image/jpg">
                <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

                <label for="picture_3">Image actuelle</label>
                <input type="hidden" name="picture_3" value="<?=$actor->getPicture2()?>">
                <img class="width_10" src="../../assets/img/actor/<?=$actor->getPicture2()?>">

                <label for="picture2">Nouvelle image</label>
                <input class="button" type="file" name="picture2" id="picture2" accept="image/png, image/jpeg, image/jpg">
                <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

                <label for="picture_4">Image actuelle </label>
                <input type="hidden" name="picture_4" value="<?=$actor->getPicture3()?>">
                <img class="width_10" src="../../assets/img/actor/<?=$actor->getPicture3()?>">

                <label for="picture3">Nouvelle image </label>
                <input class="button" type="file" name="picture3" id="picture3" accept="image/png, image/jpeg, image/jpg">
                <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

                <input type="hidden" name="id" value="<?=$actor->getId()?>">

                <input class="button width_50 auto" type="submit" value="Modifier" name="send">
            </form>
        </div>
    </main>
<?php
}