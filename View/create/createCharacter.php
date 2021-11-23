<main id="accountMain">
    <h1 class="title">Ajouter un personnage</h1>
    <div  class="width_80 auto">
        <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">
            <h2 class="marginTop">Identitée</h2>

            <label for="pseudo">Son surnom</label>
            <input class="form" type="text" name="pseudo" id="pseudo" required>
            <div class="flexRow align">
                <div class="flexColumn width_50 margR">
                    <label for="firstname">Son prénom</label>
                    <input class="form" type="text" name="firstname" id="firstname" required>
                </div>
                <div class="flexColumn width_50">
                    <label for="lastname">Son nom</label>
                    <input class="form" type="text" name="lastname" id="lastname" required>
                </div>
            </div>

            <label for="picture">Photo du personnage </label>
            <input class="button" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 6Mo; accepte PNG, JPEG, JPG)</span>

            <h2 class="marginTop">Critères</h2>

            <label for="species">Son espèces</label>
            <input id="species" class="form" type="text" name="species" required>
            <label for="sex">Son sexe</label>
            <select id="sex" name="sex" class="button" required>
                <option>-- Choisissez --</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>
            <label for="size">Sa taille</label>
            <input id="size" class="form" type="text" name="size" placeholder="ex : 1m70" required>
            <label for="hair">Sa couleur des cheveux</label>
            <div class="flexRow align wrap">
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Noirs">
                    <span class="choice black"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Bruns">
                    <span class="choice brown"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Blonds">
                    <span class="choice yellow"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Gris">
                    <span class="choice gray"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Blancs">
                    <span class="choice"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Bleus">
                    <span class="choice blue"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Rouges">
                    <span class="choice red"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Verts">
                    <span class="choice green"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Rose">
                    <span class="choice pink"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Roux">
                    <span class="choice orange"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Jaune">
                    <span class="choice yellow2"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Violet">
                    <span class="choice purple"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="hair" id="hair" value="Chauve">
                    <span class="choice center grey">X</span>
                </div>
            </div>
            <label for="eyes">Sa couleur des yeux</label>
            <div class="flexRow align wrap">
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Noirs">
                    <span class="choice black"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Marrons">
                    <span class="choice brown"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Blonds">
                    <span class="choice yellow"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Gris">
                    <span class="choice gray"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Blancs">
                    <span class="choice"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Bleus">
                    <span class="choice blue"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Rouges">
                    <span class="choice red"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Verts">
                    <span class="choice green"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Rose">
                    <span class="choice pink"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Roux">
                    <span class="choice orange"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Jaune">
                    <span class="choice yellow2"></span>
                </div>
                <div class="flexColumn align">
                    <input type="checkbox" name="eyes" id="eyes" value="Violet">
                    <span class="choice purple"></span>
                </div>
            </div>
            <label for="origin">Son origine</label>
            <input id="origin" class="form" type="text" name="origin" required>
            <label for="place">Son lieu d'origine</label>
            <input id="place" class="form" type="text" name="place" required>
            <label for="book">L'image et le titre du 1er comic book où il apparaît</label>
            <input class="button" type="file" name="pictureBook" id="book" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 6Mo; accepte PNG, JPEG, JPG)</span>
            <input id="book" class="form" type="text" name="titleBook" required>
            <label for="activity">Ses activités</label>
            <input id="activity" class="form" type="text" name="activity" required>
            <label for="characteristic">Ses charactéristiques</label>
            <input id="characteristic" class="form" type="text" name="characteristic" required>
            <label for="powers">Ses pouvoirs</label>
            <textarea id="powers" name="powers" class="form" required></textarea>
            <label for="team">Ses équipes</label>
            <input id="team" class="form" type="text" name="team">
            <label for="parent">Sa famille</label>
            <input id="parent" class="form" type="text" name="parent" required>
            <label for="situation">Ses études</label>
            <input id="situation" class="form" type="text" name="situation" required>
            <label for="biography">Sa biographie</label>
            <textarea id="biography" name="biography" class="form" required></textarea>

            <h2 class="marginTop">Acteurs qui ont incarné le personnage</h2>

            <?php
            if (isset($var['actors'])) {
                foreach ($var['actors'] as $actor) {?>
                        <div class="flexRow align">
                            <input type="checkbox" name="eyes" id="eyes" value="<?=$actor->getId()?>" class="margR">
                            <?=$actor->getFirstname() . " " . $actor->getLastname()?>
                        </div>
                <?php
                }
            } ?>
            <div class="flexRow align">
                <input type="checkbox" name="eyes" id="eyes" value="" class="margR"> Personne
            </div>

            <h2 class="marginTop">Créateurs du personnage</h2>


            <?php
            if (isset($var['creators'])) {
                foreach ($var['creators'] as $creator) {?>
                    <div class="flexRow align">
                        <input type="checkbox" name="eyes" id="eyes" value="<?=$creator->getId()?>" class="margR">
                        <?=$creator->getFirstname() . " " . $creator->getLastname()?>
                    </div>
                    <?php
                }
            } ?>

            <h2 class="marginTop">Insérer 3 photos du personnage</h2>

            <input class="button marginTop" type="file" name="picture1" id="picture1" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 6Mo; accepte PNG, JPEG, JPG)</span>
            <input class="button" type="file" name="picture2" id="picture2" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 6Mo; accepte PNG, JPEG, JPG)</span>
            <input class="button" type="file" name="picture3" id="picture3" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 6Mo; accepte PNG, JPEG, JPG)</span>

            <input class="button width_50 auto" type="submit" value="Ajouter" name="send">
        </form>
    </div>
</main>