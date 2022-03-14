<?php
namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Entity\Picture;
use Chloe\Marvel\Model\Manager\CommentPictureManager;
use Chloe\Marvel\Model\Manager\PictureManager;
use Chloe\Marvel\Model\Manager\UserManager;
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

    /**
     * view one picture
     * @param $id
     */
    public function picture($id) {
        $manager = new PictureManager();
        $picture = $manager->getPictureId($id);
        $title = $manager->getPicture($id);
        $manager = new CommentPictureManager();
        $comment = $manager->getCommentsPicture($id);
        $this->return("picture", "Photo : " . $title->getTitle(), ['picture' => $picture, 'comment' => $comment]);
    }

    /**
     * view all the pictures that the user has to post
     * @param $id
     */
    public function picturesUser($id) {
        $manager = new PictureManager();
        $pictures = $manager->getPicturesUser($id);
        $this->return("accountPicture", "Mes photos", ['pictures' => $pictures]);
    }

    /*
     * display all reports
     */
    public function reportView() {
        $manager = new PictureManager();
        $picture = $manager->getPicturesReport();
        $this->return("accountReportPicture", "Les photos signalées", ['picture' => $picture]);
    }

    /**
     * add a picture
     * @param $picture
     * @param $files
     */
    public function add($picture, $files) {
        if (isset($picture['send'])) {
            if (isset($picture['title'], $picture['description'], $picture['date'], $files['picture'], $picture['user_fk'])) {

                $pictureManager = new PictureManager();
                $userManager = new UserManager();

                $title = htmlentities(ucfirst(trim($picture['title'])));
                $description = htmlentities(ucfirst(trim($picture['description'])));
                $date = $picture['date'];
                $user_fk = intval($picture['user_fk']);

                // I check if all the photos are not empty
                if (!empty($files['picture']['name'])) {
                    // Check if the image is of the correct type
                    if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                        $maxSize = 10 * 1024 * 1024; // = 10 Mo

                        // Check if the image is below 10Mo.
                        if ($files['picture']['size'] <= $maxSize) {
                            $tmpName = $files['picture']['tmp_name'];

                            // Give a random name to the image.
                            $namePicture = getRandomName($files['picture']['name']);

                            // The image is added to a folder.
                            move_uploaded_file($tmpName, "./assets/img/picture/" . $namePicture);

                            $user_fk = $userManager->getUser($user_fk);
                            if ($user_fk->getId()) {
                                $p = new Picture(null, $namePicture, $title, $description, $date, $user_fk);
                                $pictureManager->add($p);

                                header("Location: ../?controller=picture&action=viewAll&success=0");
                            }
                        } else {
                            header("Location: ../?controller=picture&action=add&error=0");
                        }
                    } else {
                        header("Location: ../?controller=picture&action=add&error=1");
                    }
                } else {
                    header("Location: ../?controller=picture&action=add&error=2");
                }
            } else {
                header("Location: ../?controller=picture&action=add&error=3");
            }
        }
        $this->return("create/createPicture", "Poster une photo");
    }

    /**
     * update a picture
     * @param $picture
     */
    public function update ($picture) {
        $id = $_GET['id'];
        if (isset($picture['send'])) {
            if (isset($picture['id'], $picture['title'], $picture['description'], $picture['date'], $picture['picture'], $picture['user_fk'])) {

                $pictureManager = new PictureManager();
                $userManager = new UserManager();

                $id = intval($picture['id']);
                $title = htmlentities(ucfirst(trim($picture['title'])));
                $description = htmlentities(ucfirst(trim($picture['description'])));
                $picture1 = $picture['picture'];
                $date = $picture['date'];
                $user_fk = intval($picture['user_fk']);

                $user_fk = $userManager->getUser($user_fk);

                if ($user_fk->getId()) {
                    $p = new Picture($id, $picture1, $title, $description, $date, $user_fk);
                    $pictureManager->update($p);

                    header("Location: ../?controller=picture&action=view&id=$id&success=1");
                } else {
                    header("Location: ../?controller=picture&action=update&id=$id&error=0");
                }
            } else {
                header("Location: ../?controller=picture&action=update&id=$id&error=1");
            }
        }
        $this->return("update/updatePicture", "Modifier une photo");
    }

    /**
     * report a picture
     * @param $picture
     */
    public function report($picture) {
        if (isset($_SESSION["id"])) {
            if (isset($picture['id'], $picture['user_fk'], $picture['why'], $picture['date_report'])) {
                $pictureManager = new PictureManager();
                $userManager = new UserManager();


                $id = intval($picture['id']);
                $user_fk = $picture['user_fk'];
                $why = htmlentities(ucfirst(trim($picture['why'])));
                $date_report = $picture['date_report'];

                $user_fk = $userManager->getUser($user_fk);
                if ($user_fk->getId()) {
                    $picture2 = new Picture($id, "", "","", "", $user_fk, null, $why, $date_report);
                    $pictureManager->report($picture2);

                    $id = $picture['id'];
                    header("Location: ../?controller=picture&action=view&id=$id&success=4");
                }
            }
            $this->return("report/reportPicture", "Signaler une photo");
        }
    }

    /**
     * remove the report from a picture report
     * @param $comment
     */
    public function reportRemove($comment) {
        if (isset($_SESSION["id"])) {
            if (isset($comment['id'], $comment['user_fk'])) {
                $pictureManager = new PictureManager();
                $userManager = new UserManager();


                $id = intval($comment['id']);
                $user_fk = $comment['user_fk'];

                $user_fk = $userManager->getUser($user_fk);
                if ($user_fk->getId()) {
                    $picture2 = new Picture($id, "", "", "", "", $user_fk,);
                    $pictureManager->reportRemove($picture2);

                    header("Location: ../?controller=picture&action=reportView&success=0");
                }
            }
            $this->return("report/reportRemovePicture", "Retirer un signalement d'une photo");
        }
    }

    /**
     * delete a picture
     * @param $picture
     */
    public function delete ($picture) {
        if (isset($_SESSION["id"])) {
            if (isset($picture['id'], $picture['picture'])) {
                $pictureManager = new PictureManager();

                $id = intval($picture['id']);
                $picture = htmlentities($picture['picture']);

                unlink("./assets/img/picture/" . $picture);

                $pictureManager->delete($id);
                header("Location: ../?controller=picture&action=viewAll&success=3");
            }
            $this->return("delete/deletePicture", "Supprimer une photo");
        }
    }
}