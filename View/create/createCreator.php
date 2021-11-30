<main id="accountMain">
    <h1 class="title">Ajouter un(e) créateur/rice</h1>
    <div  class="width_80 auto">
        <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">

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

            <label for="picture">Photo du créateur/rice *</label>
            <input class="button" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

            <input type="hidden" name="user_fk" value="<?=$_SESSION['id']?>">

            <input class="button width_50 auto" type="submit" value="Ajouter" name="send">
        </form>
    </div>
</main>