<?php

namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Manager\CarouselManager;

class HomeController {

    use ReturnViewTrait;

    public function homePage() {
        $manager = new CarouselManager();
        $carousel = $manager->getCarousels();
        $this->return("home", "Accueil", ["carousel" => $carousel]);
    }

    public function connection() {
        $this->return("connection", "Connexion");
    }

    public function registration() {
        $this->return("create/registration", "Inscription");
    }

    public function contact() {
        $this->return("contact", "Contact");
    }
}