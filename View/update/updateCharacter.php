<?php
$id = $_GET['id'];
$manager = new \Chloe\Marvel\Model\Manager\CharactersManager();
$characters = $manager->getCharacterId($id);

foreach ($characters as $character) { ?>
    <main id="accountMain">
        <h1 class="title">Ajouter un personnage</h1>
        <div  class="width_80 auto">
            <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">
                <h2 class="marg40">Identitée</h2>

                <label for="pseudo">Son surnom *</label>
                <input class="form" type="text" name="pseudo" id="pseudo" value="<?=$character->getPseudo()?>" required>
                <div class="flexRow align">
                    <div class="flexColumn width_50 margR">
                        <label for="firstname">Son prénom *</label>
                        <input class="form" type="text" name="firstname" id="firstname" value="<?=$character->getFirstname()?>" required>
                    </div>
                    <div class="flexColumn width_50">
                        <label for="lastname">Son nom *</label>
                        <input class="form" type="text" name="lastname" id="lastname" value="<?=$character->getLastname()?>" required>
                    </div>
                </div>

                <label for="picture_1">Image actuelle du personnage </label>
                <input id="picture_1" name="picture_1" type="hidden" value="<?=$character->getPicture()?>">
                <img class="width_20" src="../../assets/img/characters/<?=$character->getPicture()?>">

                <label for="picture">Nouvelle image du personnage </label>
                <input class="button" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg">
                <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

                <h2 class="marg40">Critères</h2>

                <label for="species">Son espèces *</label>
                <input id="species" class="form" type="text" name="species" value="<?=$character->getSpecies()?>" required>
                <label for="sex">Son sexe *</label>
                <select id="sex" name="sex" class="button" required>
                    <option value="<?=$character->getSex()?>"><?=$character->getSex()?></option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
                <label for="size">Sa taille *</label>
                <div class="flexRow align width_40">
                    <input type="number" id="size" class="form width_20 margR" name="size" max="2" min="0" value="<?=substr($character->getSize(), 0, 1)?>" required>
                    <span class="margR">m</span>
                    <input type="number" id="size" class="form width_20 margR" max="99" min="0" name="size2" value="<?=substr($character->getSize(), 2, 2)?>" required>
                    <span>cm</span>
                </div>
                <label for="hair">Sa couleur des cheveux * <span class="sentenceGrey">(max 3)</span></label>
                <div class="flexRow align wrap">
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Noirs" <?php if(strpos($character->getHair(), 'Noirs') !== false){echo "checked";} ?>>
                        <span class="choice black"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Bruns" <?php if(strpos($character->getHair(), 'Bruns') !== false){echo "checked";} ?>>
                        <span class="choice brown"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Châtains" <?php if(strpos($character->getHair(), 'Châtains') !== false){echo "checked";} ?>>
                        <span class="choice chestnut"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Blonds" <?php if(strpos($character->getHair(), 'Blonds') !== false){echo "checked";} ?>>
                        <span class="choice yellow"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Gris" <?php if(strpos($character->getHair(), 'Gris') !== false){echo "checked";} ?>>
                        <span class="choice gray"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Blancs" <?php if(strpos($character->getHair(), 'Blancs') !== false){echo "checked";} ?>>
                        <span class="choice"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Bleus" <?php if(strpos($character->getHair(), 'Bleus') !== false){echo "checked";} ?>>
                        <span class="choice blue2"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Rouges" <?php if(strpos($character->getHair(), 'Rouges') !== false){echo "checked";} ?>>
                        <span class="choice red2"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Verts" <?php if(strpos($character->getHair(), 'Verts') !== false){echo "checked";} ?>>
                        <span class="choice green"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Roses" <?php if(strpos($character->getHair(), 'Roses') !== false){echo "checked";} ?>>
                        <span class="choice pink"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Roux" <?php if(strpos($character->getHair(), 'Roux') !== false){echo "checked";} ?>>
                        <span class="choice orange"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Jaunes" <?php if(strpos($character->getHair(), 'Jaunes') !== false){echo "checked";} ?>>
                        <span class="choice yellow2"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Violets" <?php if(strpos($character->getHair(), 'Violets') !== false){echo "checked";} ?>>
                        <span class="choice purple"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="hair[]" id="hair" value="Chauve" <?php if(strpos($character->getHair(), 'Chauve') !== false){echo "checked";} ?>>
                        <span class="choice center grey">X</span>
                    </div>
                </div>
                <label for="eyes">Sa couleur des yeux * <span class="sentenceGrey">(max 1)</span></label>
                <div class="flexRow align wrap">
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Noirs" <?php if(strpos($character->getEyes(), 'Noirs') !== false){echo "checked";} ?>>
                        <span class="choice black"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Marrons" <?php if(strpos($character->getEyes(), 'Marrons') !== false){echo "checked";} ?>>
                        <span class="choice brown"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Gris" <?php if(strpos($character->getEyes(), 'Gris') !== false){echo "checked";} ?>>
                        <span class="choice gray"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Blancs" <?php if(strpos($character->getEyes(), 'Blancs') !== false){echo "checked";} ?>>
                        <span class="choice"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Bleus" <?php if(strpos($character->getEyes(), 'Bleus') !== false){echo "checked";} ?>>
                        <span class="choice blue2"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Rouges" <?php if(strpos($character->getEyes(), 'Rouges') !== false){echo "checked";} ?>>
                        <span class="choice red2"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Verts" <?php if(strpos($character->getEyes(), 'Verts') !== false){echo "checked";} ?>>
                        <span class="choice green"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Roses" <?php if(strpos($character->getEyes(), 'Roses') !== false){echo "checked";} ?>>
                        <span class="choice pink"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Oranges" <?php if(strpos($character->getEyes(), 'Oranges') !== false){echo "checked";} ?>>
                        <span class="choice orange"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Jaunes" <?php if(strpos($character->getEyes(), 'Jaunes') !== false){echo "checked";} ?>>
                        <span class="choice yellow2"></span>
                    </div>
                    <div class="flexColumn align">
                        <input type="checkbox" name="eyes[]" id="eyes" value="Violets" <?php if(strpos($character->getEyes(), 'Violets') !== false){echo "checked";} ?>>
                        <span class="choice purple"></span>
                    </div>
                </div>
                <label for="origin">Son pays d'origine *</label>
                <input id="origin" class="form" type="text" name="origin" value="<?=$character->getOrigin()?>" required>
                <label for="place">Son lieu d'origine *</label>
                <input id="place" class="form" type="text" name="place" value="<?=$character->getPlace()?>" required>

                <label for="book" class="marg40">L'image et le titre du 1er comic book où il / elle apparaît </label>
                <label for="picture_2">Image actuelle </label>
                <input id="picture_2" name="picture_2" type="hidden" value="<?=$character->getPicturesBook()?>">
                <img class="width_20" src="../../assets/img/characters/book/<?=$character->getPicturesBook()?>">
                <label for="picturesBook">Nouvelle image </label>
                <input class="button" type="file" name="picturesBook" id="book" accept="image/png, image/jpeg, image/jpg">
                <span class="sentenceGrey">(Max: 6Mo; accepte PNG, JPEG, JPG)</span>
                <input id="book" class="form" type="text" name="titleBook" value="<?=$character->getTitleBook()?>" required>

                <label for="activity">Ses activités *</label>
                <input id="activity" class="form" type="text" name="activity" value="<?=$character->getActivity()?>" required>
                <label for="characteristic">Ses charactéristiques</label>
                <input id="characteristic" class="form" type="text" name="characteristic" value="<?=$character->getCharacteristic()?>">
                <label for="powers">Ses pouvoirs *</label>
                <textarea id="powers" name="powers" class="form" required><?=$character->getPowers()?></textarea>
                <label for="team">Ses / son équipe(s)</label>
                <input id="team" class="form" type="text" name="team" value="<?=$character->getTeam()?>">
                <label for="parent">Sa famille *</label>
                <input id="parent" class="form" type="text" name="parent" value="<?=$character->getParent()?>" required>
                <label for="situation">Ses études </label>
                <input id="situation" class="form" type="text" name="situation" value="<?=$character->getSituation()?>">
                <label for="biography">Sa biographie *</label>
                <textarea id="biography" name="biography" class="form" required><?=$character->getBiography()?></textarea>

                <h2 class="marg40">Insérer 3 photos du personnage *</h2>

                <label for="picture_3">Image actuelle </label>
                <input id="picture_3" name="picture_3" type="hidden" value="<?=$character->getPicture1()?>">
                <img class="width_10" src="../../assets/img/characters/<?=$character->getPicture1()?>">

                <label for="picture1">Nouvelle image  </label>
                <input class="button marginTop" type="file" name="picture1" id="picture1" accept="image/png, image/jpeg, image/jpg" >
                <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

                <label for="picture_4">Image actuelle </label>
                <input id="picture_4" name="picture_4" type="hidden" value="<?=$character->getPicture2()?>">
                <img class="width_10" src="../../assets/img/characters/<?=$character->getPicture2()?>">

                <label for="picture2">Nouvelle image </label>
                <input class="button" type="file" name="picture2" id="picture2" accept="image/png, image/jpeg, image/jpg">
                <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

                <label for="picture_5">Image actuelle du personnage </label>
                <input id="picture_5" name="picture_5" type="hidden" value="<?=$character->getPicture3()?>">
                <img class="width_10" src="../../assets/img/characters/<?=$character->getPicture3()?>">

                <label for="picture3">Nouvelle image </label>
                <input class="button" type="file" name="picture3" id="picture3" accept="image/png, image/jpeg, image/jpg">
                <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

                <input type="hidden" name="user_fk" value="<?=$character->getUserFk()->getId()?>">
                <input type="hidden" name="id" value="<?=$character->getId()?>">


                <input class="button width_50 auto" type="submit" value="Modifier" id="buttonUpdate" name="send">
            </form>
        </div>
    </main>
<?php
}