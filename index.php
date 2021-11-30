<?php
session_start();

require 'vendor/autoload.php';

require_once 'source/Controller/Traits/ReturnViewTrait.php';

use Chloe\Marvel\Controller\ActorCharactersController;
use Chloe\Marvel\Controller\ActorController;
use Chloe\Marvel\Controller\CarouselController;
use Chloe\Marvel\Controller\CharactersController;
use Chloe\Marvel\Controller\CreatorCharactersController;
use Chloe\Marvel\Controller\CreatorController;
use Chloe\Marvel\Controller\HomeController;
use Chloe\Marvel\Controller\UserController;

if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'home' :
            $controller = new HomeController();
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'connection' :
                        $controller->connection();
                        break;
                    case 'registration' :
                        $controller->registration();
                        break;
                    case 'contact' :
                        $controller->contact();
                        break;
                }
            }
        case 'user' :
            $controller = new UserController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'view' :
                        $controller->account();
                        break;
                    case 'updateAccount' :
                        $controller->updateInfo($_POST);
                        break;
                    case 'updatePass' :
                        $controller->updatePass($_POST);
                        break;
                    case 'delete' :
                        $controller->delete($_POST);
                        break;
                }
            }
        case 'carousel' :
            $controller = new CarouselController();
                if (isset($_GET['action'])) {
                    switch ($_GET['action']) {
                        case 'add' :
                            $controller->add($_POST, $_FILES);
                            break;
                        case 'delete' :
                            $controller->delete($_POST);
                            break;
                    }
                }
        case "character" :
            $controller = new CharactersController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'viewAll' :
                        $controller->charactersPage();
                        break;
                    case 'view' :
                        $controller->character($_GET['id']);
                        break;
                    case 'add' :
                        $controller->add($_POST, $_FILES);
                        break;
                    case 'update' :
                        $controller->update($_POST, $_FILES);
                        break;
                    case 'delete' :
                        $controller->delete($_POST);
                        break;
                }
            }
        case "actor" :
            $controller = new ActorController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'view' :
                        $controller->actor($_GET['id']);
                        break;
                    case 'add' :
                        $controller->add($_POST, $_FILES);
                        break;
                    case 'update' :
                        $controller->update($_POST, $_FILES);
                        break;
                    case 'delete' :
                        $controller->delete($_POST);
                        break;
                }
            }
        case "creator" :
            $controller = new CreatorController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'add' :
                        $controller->add($_POST, $_FILES);
                        break;
                    case 'update' :
                        $controller->update($_POST, $_FILES);
                        break;
                    case 'delete' :
                        $controller->delete($_POST);
                        break;
                }
            }
        case "creatorCharacter" :
            $controller = new CreatorCharactersController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'add' :
                        $controller->add($_POST);
                        break;
                    case 'delete' :
                        $controller->delete($_POST);
                        break;
                }
            }
        case "actorCharacter" :
            $controller = new ActorCharactersController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'add' :
                        $controller->add($_POST);
                        break;
                    case 'delete' :
                        $controller->delete($_POST);
                        break;
                }
            }


    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}