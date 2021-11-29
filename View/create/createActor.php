<main id="accountMain">
    <h1 class="title">Ajouter un(e) acteur/rice</h1>
    <div  class="width_80 auto">
        <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">
            <h2 class="marg40">Identitée</h2>

            <div class="flexRow align">
                <div class="flexColumn width_50 margR">
                    <label for="firstname">Son prénom *</label>
                    <input class="form" type="text" name="firstname" id="firstname" required>
                </div>
                <div class="flexColumn width_50">
                    <label for="lastname">Son nom *</label>
                    <input class="form" type="text" name="lastname" id="lastname" required>
                </div>
            </div>

            <label for="picture">Photo de l'acteur/rice *</label>
            <input class="button" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

            <label for="birthName">Son nom de naissance *</label>
            <input id="birthName" class="form" type="text" name="birthName" required>

            <label for="birth">Sa date de naissance *</label>
            <input id="birth" class="form" type="date" name="birth" required>

            <label for="nationality">Sa nationalitée *</label>
            <input id="nationality" class="form" type="text" name="nationality" required>

            <label for="profession">Sa/ses profession(s) *</label>
            <input id="profession" class="form" type="text" name="profession" required>

            <label for="biography">Sa biographie *</label>
            <textarea id="biography" name="biography" class="form" required></textarea>

            <h2 class="marg40">Sa carrière en tant qu'acteur/rice</h2>

            <label for="movies">Ses films *</label>
            <textarea id="movies" name="movies" class="form" required></textarea>

            <label for="award">Ses récompenses *</label>
            <textarea id="award" name="awards" class="form" required></textarea>

            <h2 class="marg40">Insérer 3 photos de l'acteur/rice *</h2>

            <input class="button marginTop" type="file" name="picture1" id="picture1" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>
            <input class="button" type="file" name="picture2" id="picture2" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>
            <input class="button" type="file" name="picture3" id="picture3" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

            <input type="hidden" name="user_fk" value="<?=$_SESSION['id']?>">

            <input class="button width_50 auto" type="submit" value="Ajouter" name="send">
        </form>
    </div>
</main>