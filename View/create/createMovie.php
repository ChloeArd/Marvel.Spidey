<main id="accountMain">
    <h1 class="title">Ajouter un personnage</h1>
    <div  class="width_80 auto">
        <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">

            <label for="title">Titre *</label>
            <input class="form" type="text" name="title" id="title" required>

            <label for="picture">Photo du film *</label>
            <input class="button" type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg" required>
            <span class="sentenceGrey">(Max: 10Mo; accepte PNG, JPEG, JPG)</span>

            <label for="date">Date de sortie *</label>
            <input id="date" class="form" type="date" name="date" required>
            <label for="time">Durée *</label>
            <div class="flexRow align width_40">
                <input type="number" id="time" class="form width_20 margR" name="time" max="5" min="0" required>
                <span>h</span>
                <input type="number" id="time" class="form width_20 margR" max="59" min="0" name="time2" required>
                <span>min</span>
            </div>

            <label for="genre">Genre *</label>
            <input id="genre" class="form" type="text" name="genre" required>

            <label for="director">Réalisateur(s)/trice(s) *</label>
            <input id="director" class="form" type="text" name="director" required>

            <label for="actors">Les acteurs/trices *</label>
            <textarea id="actors" name="actors" class="form" required></textarea>

            <label for="synopsis">Résumé *</label>
            <textarea id="synopsis" name="synopsis" class="form" required></textarea>

            <label for="synopsis">Bande annonce du film *</label>
            <p class="sentenceGrey">Pour importer une video, allez sur YouTube -> clique droit sur la vidéo -> copier le code d'intégration et colle le juste en dessous.</p>
            <textarea id="synopsis" name="synopsis" class="form" required></textarea>

            <label for="actor_fk">L'acteur principal *</label>
            <select id="actor_fk" name="actor_fk" class="button" required>
                <option value="">-- Choisissez --</option>
                <?php
                if (isset($var['actors'])) {
                    foreach ($var['actors'] as $actor) { ?>
                        <option value="<?=$actor->getId()?>"><?=$actor->getFirstname() . " " . $actor->getLastname()?></option>
                        <?php
                    }
                }
                ?>
            </select>

            <input class="button width_50 auto" type="submit" value="Ajouter" name="send">
        </form>
    </div>
</main>