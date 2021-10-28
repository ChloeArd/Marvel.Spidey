<?php
namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Entity\Carousel;
use Chloe\Marvel\Model\Manager\CarouselManager;
use function Chloe\Marvel\Model\getRandomName;

class CarouselController {

    use ReturnViewTrait;

    /**
     * add a picture of a carousel
     * @param $comment
     */
    public function add($carousel, $files) {
        if (isset($_SESSION["id"])) {
            if (isset($files['picture'], $carousel['title'])) {
                $carouselManager = new CarouselManager();

                $title = htmlentities(trim(ucfirst($carousel['title'])));

                if (!empty($files['picture']['name'])) {
                    // Check if the image is of the correct type
                    if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                        $maxSize = 6 * 1024 * 1024; // = 6 Mo

                        // Check if the image is below 2Mo.
                        if ($files['picture']['size'] <= $maxSize) {
                            $tmpName = $files['picture']['tmp_name'];
                            // Give a random name to the image.
                            $namePicture = getRandomName($files['picture']['name']);

                            // The image is added to a folder.
                            move_uploaded_file($tmpName, "../../assets/img/carousel/" . $namePicture);


                            $carousel = new Carousel(null, $namePicture, $title);
                            $carouselManager->add($carousel);
                            header("Location: ../success=3");
                        }
                        else {
                            header("Location: ../index.php?controller=carousel&action=add&error=0");
                        }
                    }
                    else {
                        header("Location: ../index.php?controller=carousel&action=add&error=1");
                    }
                }
                else {
                    header("Location: ../index.php?controller=carousel&action=add&error=2");
                }
            }
            $this->return("Create/createCarousel", "Ajouter une image au carousel");
        }
    }

    /**
     * delete a image of a carousel
     * @param int $id
     */
    public function delete($carousel) {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role_fk'] === "1") {
                if (isset($carousel['id'], $carousel['picture'])) {
                    $id = intval($carousel['id']);
                    $picture = htmlentities($carousel['picture']);

                    unlink("../../assets/img/carousel/$picture");
                    $carouselManager = new CarouselManager();
                    $carouselManager->delete($id);
                    header("Location: ../index.php?&success=4");
                }
                $this->return('delete/deleteCarousel', "Forum : Supprimer une image de carousel");
            }
        }
    }
}

