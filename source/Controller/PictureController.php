<?php
namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Manager\PictureManager;
use function Chloe\Marvel\Controller\Traits\getRandomName;

class PictureController {

    use ReturnViewTrait;

    /**
     * view all pictures
     */
    public function pictures() {
        $manager = new PictureManager();
        $pictures = $manager->getPictures();
        $this->return("pictures", "Photos", ['pictures' => $pictures]);
    }

    public function picture($id) {
        $manager = new PictureManager();
        $picture = $manager->getPictureId($id);
        $title = $manager->getPicture($id);
        $this->return("picture", "Photo : " . $title->getTitle(), ['picture' => $picture]);
    }

    public function picturesUser($id) {
        $manager = new PictureManager();
        $pictures = $manager->getPicturesUser($id);
        $this->return("accountPicture", "Mes photos", ['pictures' => $pictures]);
    }
}