<?php
date_default_timezone_set("Europe/Paris"); ?>
<main id="accountMain">
    <h1 class="title">Ajouter un commentaire</h1>
    <div  class="width_80 auto">
        <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">

            <label for="comment">Commentaire *</label>
            <textarea id="comment" name="comment" class="form" required></textarea>

            <input name="date"  type="hidden" id="date" value="<?= date('d/m/Y')?>">
            <input type="hidden" name="user_fk" value="<?=$_SESSION['id']?>">
            <input type="hidden" name="picture_fk" value="<?=$_GET['id']?>">

            <input class="button width_50 auto" type="submit" value="Ajouter" name="send">
        </form>
    </div>
</main>