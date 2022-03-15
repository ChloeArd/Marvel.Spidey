<?php

namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Manager\CarouselManager;
use Chloe\Marvel\Model\Manager\MovieManager;

class HomeController {

    use ReturnViewTrait;

    public function homePage() {
        $manager = new CarouselManager();
        $carousel = $manager->getCarousels();
        $movieManager = new MovieManager();
        $movie = $movieManager->getRecentMovie();
        $this->return("home", "Accueil", ["carousel" => $carousel, "movie" => $movie]);
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