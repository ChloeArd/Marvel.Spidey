<?php
namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Entity\CommentPicture;
use Chloe\Marvel\Model\Manager\CommentPictureManager;
use Chloe\Marvel\Model\Manager\PictureManager;
use Chloe\Marvel\Model\Manager\UserManager;

class CommentPictureController {

    use ReturnViewTrait;

    /*
     * display all reports
     */
    public function reportView() {
        $manager = new CommentPictureManager();
        $comment = $manager->getCommentsPictureReport();
        $this->return("accountReportComment", "Les commentaires signalés", ['comment' => $comment]);
    }

    /**
     * add a comment on a picture
     * @param $picture
     * @param $files
     */
    public function add($comment) {
        if (isset($comment['send'])) {
            if (isset($comment['comment'], $comment['date'], $comment['user_fk'], $comment['picture_fk'])) {

                $commentManager = new CommentPictureManager();
                $pictureManager = new PictureManager();
                $userManager = new UserManager();

                $commentUser = htmlentities(ucfirst(trim($comment['comment'])));
                $date = $comment['date'];
                $user_fk = intval($comment['user_fk']);
                $picture_fk = intval($comment['picture_fk']);

                $user_fk = $userManager->getUser($user_fk);
                $picture_fk = $pictureManager->getPicture($picture_fk);
                if ($user_fk->getId()) {
                    if($picture_fk ->getId()) {
                        $c = new CommentPicture(null, $commentUser, $date, $user_fk, $picture_fk, 0);
                        $commentManager->add($c);
                        $id = $picture_fk->getId();
                        header("Location: ../index.php?controller=picture&action=view&id=$id&success=0");
                    }
                } else {
                    header("Location: ../index.php?controller=commentPicture&action=add&error=2");
                }
            } else {
                header("Location: ../index.php?controller=commentPicture&action=add&error=3");
            }
        }
        $this->return("create/createCommentPicture", "Ajouter un commentaire");
    }

    /**
     * update a comment
     * @param $comment
     */
    public function update($comment) {
        $id = $_GET['id2'];
        $id1 = $_GET['id'];
        if (isset($comment['send'])) {
            if (isset($comment['id'], $comment['comment'], $comment['date'], $comment['user_fk'], $comment['picture_fk'])) {

                $commentManager = new CommentPictureManager();
                $pictureManager = new PictureManager();
                $userManager = new UserManager();

                $id = intval($comment['id']);
                $commentUser = htmlentities(ucfirst(trim($comment['comment'])));
                $date = $comment['date'];
                $user_fk = intval($comment['user_fk']);
                $picture_fk = intval($comment['picture_fk']);

                $user_fk = $userManager->getUser($user_fk);
                $picture_fk = $pictureManager->getPicture($picture_fk);
                if ($user_fk->getId()) {
                    if($picture_fk ->getId()) {
                        $c = new CommentPicture($id, $commentUser, $date, $user_fk, $picture_fk);
                        $commentManager->update($c);
                        $id1 = $picture_fk->getId();
                        header("Location: ../index.php?controller=picture&action=view&id=$id1&id2=$id&success=2");
                    }
                } else {
                    header("Location: ../index.php?controller=commentPicture&action=add&id=$id1&id2=$id&error=0");
                }
            } else {
                header("Location: ../index.php?controller=commentPicture&action=add&id=$id1&id2=$id&error=1");
            }
        }
        $this->return("update/updateCommentPicture", "Modifier un commentaire");
    }

    /**
     * report a comment
     * @param $comment
     */
    public function report($comment) {
        if (isset($_SESSION["id"])) {
            if (isset($comment['id'], $comment['picture_fk'], $comment['user_fk'], $comment['why'], $comment['date_report'])) {
                $commentManager = new CommentPictureManager();
                $pictureManager = new PictureManager();
                $userManager = new UserManager();


                $id = intval($comment['id']);
                $picture_fk = $comment['picture_fk'];
                $user_fk = $comment['user_fk'];
                $why = htmlentities(ucfirst(trim($comment['why'])));
                $date_report = $comment['date_report'];

                $user_fk = $userManager->getUser($user_fk);
                $picture_fk = $pictureManager->getPicture($picture_fk);
                if ($user_fk->getId()) {
                    if ($picture_fk->getId()) {
                        $commentPicture = new CommentPicture($id, "", "", $user_fk, $picture_fk, null, $why, $date_report);
                        $commentManager->report($commentPicture);

                        $id = $comment['picture_fk'];
                        header("Location: ../index.php?controller=picture&action=view&id=$id&success=4");
                    }
                }
            }
            $this->return("report/reportCommentPicture", "Signaler un commentaire");
        }
    }

    /**
     * remove the report from a comment report
     * @param $comment
     */
    public function reportRemove($comment) {
        if (isset($_SESSION["id"])) {
            if (isset($comment['id'], $comment['picture_fk'], $comment['user_fk'])) {
                $commentManager = new CommentPictureManager();
                $pictureManager = new PictureManager();
                $userManager = new UserManager();


                $id = intval($comment['id']);
                $picture_fk = $comment['picture_fk'];
                $user_fk = $comment['user_fk'];

                $user_fk = $userManager->getUser($user_fk);
                $picture_fk = $pictureManager->getPicture($picture_fk);
                if ($user_fk->getId()) {
                    if ($picture_fk->getId()) {
                        $commentPicture = new CommentPicture($id, "", "", $user_fk, $picture_fk);
                        $commentManager->reportRemove($commentPicture);

                        header("Location: ../index.php?controller=commentPicture&action=reportView&success=0");
                    }
                }
            }
            $this->return("report/reportRemoveCommentPicture", "Retirer un Signalement d'un commentaire");
        }
    }

    /**
     * delete a comment on a picture
     * @param $comment
     */
    public function delete ($comment) {
        if (isset($_SESSION["id"])) {
            if (isset($comment['id'], $comment['picture_fk'])) {
                $commentManager = new CommentPictureManager();

                $id = intval($comment['id']);
                $picture_fk = intval($comment['picture_fk']);
                $commentManager->delete($id);
                header("Location: ../index.php?controller=picture&action=view&id=$picture_fk&success=3");
            }
            $this->return("delete/deleteCommentPicture", "Supprimer un commentaire");
        }
    }
}