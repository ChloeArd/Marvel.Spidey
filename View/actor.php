 <main>
     <?php
     if (isset($var['actor'])) {
        foreach ($var['actor'] as $actor) { ?>
            <h1 class="title"><?=strtoupper($actor->getFirstname()) . " " . strtoupper($actor->getLastname())?></h1>

            <div class="width_100 flexRow">
                <div id="photoCharacter" class="width_30 flexColumn">
                    <img class="width_100" src="<?=$actor->getPicture1()?>">
                    <img class="width_100" src="<?=$actor->getPicture2()?>">
                    <img class="width_100" src="<?=$actor->getPicture3()?>">
                </div>
                <div id="descriptionCharacter" class="width_70 flexColumn">
                    <div class="flexCenter flexColumn">
                        <h1 class="marginTop"><?=strtoupper($actor->getFirstname()) . " " . strtoupper($actor->getLastname())?></h1>
                        <div class="flexColumn flexCenter">
                            <img class="imageChara" src="../assets/img/<?=$actor->getPicture()?>" alt="Tom Holland">
                        </div>
                        <div class="lineHorizontal width_90 lineTop"></div>
                        <div id="table" class="flexRow">
                            <div class="lineVertical"></div>
                            <div class="flexColumn flexCenter">
                                <p class="bold">Nom de naissance</p>
                                <p><?=$actor->getBirthName()?></p>
                            </div>
                            <div class="lineVertical"></div>
                            <div class="flexColumn flexCenter">
                                <p class="bold">Naissance</p>
                                <p><?=$actor->getBirth()?></p>
                            </div>
                            <div class="lineVertical"></div>
                            <div class="flexColumn flexCenter">
                                <p class="bold">Nationalité</p>
                                <p><?=$actor->getNationality()?></p>
                            </div>
                            <div class="lineVertical"></div>
                            <div class="flexColumn flexCenter">
                                <p class="bold">Profession</p>
                                <p><?=$actor->getProfession()?></p>
                            </div>
                            <div class="lineVertical"></div>
                        </div>
                        <div class="lineHorizontal width_90 lineBottom"></div>
                    </div>

                    <h2 class="titleDescription">FILMS</h2>
                    <ul class="auto width_70">
                        <?=$actor->getMovies()?>
                    </ul>


                    <h2 class="titleDescription">BIOGRAPHIE</h2>
                    <div class="background">
                        <div class="width_70 auto">
                            <p><?=$actor->getBiography()?></p>
                        </div>
                    </div>
                    <h2 class="titleDescription">RECOMPENSES</h2>
                    <div class="flexCenter">
                        <div id="buttonDisplay"><i id="menuAccountMobile2" class="fas fa-caret-down"></i></div>
                    </div>
                    <div id="awards">
                        <ul>
                            <?=$actor->getAwards()?>
                        </ul>
                    </div>

                    <h2 class="titleDescription">PHOTOS</h2>
                    <div class="flexRow wrap picturesActor">
                        <?php
                        if (isset($var['picture'])) {
                            foreach ($var['picture'] as $picture) { ?>
                                <img class="photoActor" src="../assets/img/picture/<?=$picture->getPictureFk()->getPicture()?>" alt="<?=$picture->getPictureFk()->getTitle()?>">
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
     <?php
        }
     }
     ?>
    </main>