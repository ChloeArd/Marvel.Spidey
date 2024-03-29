<?php
session_start();

require 'vendor/autoload.php';

require_once 'source/Controller/Traits/ReturnViewTrait.php';

use Chloe\Marvel\Controller\ActorCharactersController;
use Chloe\Marvel\Controller\ActorController;
use Chloe\Marvel\Controller\CarouselController;
use Chloe\Marvel\Controller\CharactersController;
use Chloe\Marvel\Controller\CommentPictureController;
use Chloe\Marvel\Controller\CreatorCharactersController;
use Chloe\Marvel\Controller\CreatorController;
use Chloe\Marvel\Controller\FavoritePictureController;
use Chloe\Marvel\Controller\HomeController;
use Chloe\Marvel\Controller\MemoryController;
use Chloe\Marvel\Controller\MovieController;
use Chloe\Marvel\Controller\PictureController;
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
                    default:
                        break;
                }
            }
            break;
        case 'user' :
            $controller = new UserController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'view' :
                        $controller->account();
                        break;
                    case 'updateAccount' :
                        $controller->update($_POST, $_FILES);
                        break;
                    case 'updatePass' :
                        $controller->updatePass($_POST);
                        break;
                    case 'delete' :
                        $controller->delete($_POST);
                        break;
                    default:
                        break;
                }
            }
            break;
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
                        default:
                            break;
                    }
                }
            break;
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
                    default:
                        break;
                }
            }
            break;
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
                    default:
                        break;
                }
            }
            break;
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
                    default:
                        break;
                }
            }
            break;
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
                    default:
                        break;
                }
            }
            break;
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
                    default:
                        break;
                }
            }
            break;
        case "picture":
            $controller = new PictureController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'viewAll' :
                        $controller->pictures();
                        break;
                    case 'view' :
                        $controller->picture($_GET['id']);
                        break;
                    case 'myPicture' :
                        $controller->picturesUser($_GET['id']);
                        break;
                    case 'add' :
                        $controller->add($_POST, $_FILES);
                        break;
                    case 'update' :
                        $controller->update($_POST);
                        break;
                    case 'report' :
                        $controller->report($_POST);
                        break;
                    case 'reportView' :
                        $controller->reportView();
                        break;
                    case 'reportRemove' :
                        $controller->reportRemove($_POST);
                        break;
                    case 'delete' :
                        $controller->delete($_POST);
                        break;
                    default:
                        break;
                }
            }
            if (isset($_GET['favorite'], $_SESSION['id'])) {
                $controllerFavorite = new FavoritePictureController();
                switch ($_GET['favorite']) {
                    case 'add' :
                        $controllerFavorite->addFavorite($_GET['id'], $_SESSION['id']);
                        break;
                    case 'delete' :
                        $controllerFavorite->delete($_POST);
                        break;
                    case 'view' :
                        $controllerFavorite->favoritesUser($_SESSION['id']);
                        if (isset($_GET['delete'])) {
                            switch ($_GET['delete']) {
                                case 'ok' :
                                    $controllerFavorite->deleteView($_POST);
                                    break;
                            }
                        }
                        break;
                    default:
                        break;
                }
            }
            break;
        case "commentPicture" :
            $controller = new CommentPictureController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'add' :
                        $controller->add($_POST);
                        break;
                    case 'update' :
                        $controller->update($_POST);
                        break;
                    case 'report' :
                        $controller->report($_POST);
                        break;
                    case 'reportView' :
                        $controller->reportView();
                        break;
                    case 'reportRemove' :
                        $controller->reportRemove($_POST);
                        break;
                    case 'delete' :
                        $controller->delete($_POST);
                        break;
                    default:
                        break;
                }
            }
            break;
        case "movie":
            $controller = new MovieController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'viewAll' :
                        $controller->movies();
                        break;
                    case 'view' :
                        $controller->movie($_GET['id']);
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
                    default:
                        break;
                }
            }
            break;
        case "memory" :
            $controller = new MemoryController();
            $controller->memoryPage();

    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}