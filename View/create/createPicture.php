<?php
date_default_timezone_set("Europe/Paris"); ?>
<main id="accountMain">
    <h1 class="title">Poster une photo</h1>
    <div  class="width_80 auto">
        <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">

            <label for="title">Titre *</label>
            <input class="form" type="text" name="title" id="title" required>
            <label for="description">Description *</label>
            <textarea id="description" name="description" class="form" required></textarea>
            <label for="picture">Photo *</label>
            <input class="button" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

            <input name="date"  type="hidden" id="date" value="<?= date('d/m/Y')?>">
            <input type="hidden" name="user_fk" value="<?=$_SESSION['id']?>">

            <input class="button width_50 auto" type="submit" value="Ajouter" name="send">
        </form>
    </div>
</main>