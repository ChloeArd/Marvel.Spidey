<main id="accountMain">
    <h1 class="title">Ajouter une nouvelle photo au carousel</h1>
    <div  class="width_80 auto">
        <form id="formConnect" method="post" action="" class="flexColumn width_60" enctype="multipart/form-data">
            <label for="picture">Sélectionner une image (PNG, JPEG, JPG) : </label>
            <input class="button" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg">
            <span>(Max: 6Mo)</span>
            <label for="title">Titre</label>
            <input id="title" class="form" type="text" name="title">
            <input class="button" type="submit" value="Enregistrer" name="send">
        </form>
    </div>
</main>