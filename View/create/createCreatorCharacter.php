<?php
if (isset($var['character'])) {
    foreach ($var['character'] as $character) { ?>

        <main id="accountMain">
            <h1 class="title">Ajouter le/la créateur/rice de <?=$character->getPseudo() . " (" . $character->getFirstname() . " " . $character->getLastname() . ")"?></h1>
            <div  class="width_80 auto">
                <form method="post" action="" class="flexColumn width_60 formContainer" enctype="multipart/form-data">

                    <label for="picture">Séléectionner un des créateurs/rices</label>
                    <select name="creator_fk">
                        <?php
                        if (isset($var['creators'])) {
                            foreach ($var['creators'] as $creators) { ?>
                            <option value="<?=$creators->getId()?>"><?=$creators->getFirstname() . " " . $creators->getLastname()?></option>
                                <?php
                            }
                        } ?>
                    </select>

                    <input type="hidden" name="characters_fk" value="<?=$character->getId()?>">

                    <input class="button width_50 auto" type="submit" value="Ajouter" name="send">
                </form>
            </div>
        </main>
<?php
    }
}