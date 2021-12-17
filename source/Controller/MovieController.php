<?php
namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Entity\Actor;
use Chloe\Marvel\Model\Entity\Movie;
use Chloe\Marvel\Model\Manager\MovieManager;
use Chloe\Marvel\Model\Manager\ActorManager;
use function Chloe\Marvel\Controller\Traits\getRandomName;

class MovieController {

    use ReturnViewTrait;

    /**
     * view all movies
     */
    public function movies() {
        $manager = new MovieManager();
        $movies_TH = $manager->getMovies(1);
        $movies_AG = $manager->getMovies(2);
        $movies_TM = $manager->getMovies(3);
        $this->return("movies", "Films", ['movies_TH' => $movies_TH, 'movies_AG' => $movies_AG, 'movies_TM' => $movies_TM]);
    }

    /**
     * view one movie
     * @param $id
     */
    public function movie($id) {
        $manager = new MovieManager();
        $movie = $manager->getMovieId($id);
        $title = $manager->getMovie($id);
        $this->return("movie", "Film : " . $title->getTitle(), ['movie' => $movie]);
    }

    /**
     * add a movie
     * @param $movie
     * @param $files
     */
    public function add($movie, $files) {
        $manager = new ActorManager();
        $actor = $manager->getActors();
        if (isset($movie['send'])) {
            if (isset($movie['title'], $movie['time'], $movie['time2'], $movie['genre'], $movie['date'], $files['picture'], $movie['director'], $movie['actors'], $movie['synopsis'], $movie['video'], $movie['actor_fk'])) {
                $movieManager = new MovieManager();

                $title = htmlentities(ucfirst(trim($movie['title'])));
                $date = $movie['date'];
                $time1 = htmlentities(trim($movie['time']));
                $time2 = htmlentities(trim($movie['time2']));
                $genre = htmlentities(ucfirst(trim($movie['genre'])));
                $director = htmlentities(ucfirst(trim($movie['director'])));
                $actors = htmlentities(ucfirst(trim($movie['actors'])));
                $synopsis = htmlentities(ucfirst(trim($movie['synopsis'])));
                $video = trim($movie['video']);
                $actor_fk = intval($movie['actor_fk']);

                if (0 <= intval($time1) || intval($time1) <= 5 && 0 <= intval($time2) || intval($time2) <= 59) {
                    if (intval($time2) < 10) {
                        $time2 = "0" . $time2;
                    }
                    $time = $time1 . "h " . $time2 . "min";
                } else {
                    header("Location: ../index.php?controller=movie&action=add&error=4");
                }

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
                            move_uploaded_file($tmpName, "./assets/img/movie/" . $namePicture);

                            $actor_fk = $manager->getActor($actor_fk);
                            if ($actor_fk->getId()) {
                                $a = new Movie(null, $title, $namePicture, $date, $time, $genre, $director, $actors, $synopsis, $video, $actor_fk);
                                $movieManager->add($a);

                                header("Location: ../index.php?controller=movie&action=viewAll&success=0");
                            }
                        } else {
                            header("Location: ../index.php?controller=movie&action=add&error=0");
                        }
                    } else {
                        header("Location: ../index.php?controller=movie&action=add&error=1");
                    }
                } else {
                    header("Location: ../index.php?controller=movie&action=add&error=2");
                }
            } else {
                header("Location: ../index.php?controller=movie&action=add&error=3");
            }
        }
        $this->return("create/createMovie", "Ajouter un film", ['actors' => $actor]);
    }

    /**
     * update a movie
     * @param $movie
     */
    public function update ($movie, $files) {
        $manager = new ActorManager();
        $movieManager = new MovieManager();
        $movieId = $movieManager->getMovie($_GET['id']);
        if (isset($movie['send'])) {
            if (isset($movie['id'], $movie['title'], $movie['time'], $movie['time2'], $movie['genre'], $movie['date'], $movie['picture'], $files['picture'], $movie['director'], $movie['actors'], $movie['synopsis'], $movie['video'], $movie['actor_fk'])) {

                $title = htmlentities(ucfirst(trim($movie['title'])));
                $date = $movie['date'];
                $time1 = htmlentities(trim($movie['time']));
                $time2 = htmlentities(trim($movie['time2']));
                $genre = htmlentities(ucfirst(trim($movie['genre'])));
                $director = htmlentities(ucfirst(trim($movie['director'])));
                $actors = htmlentities(ucfirst(trim($movie['actors'])));
                $synopsis = htmlentities(ucfirst(trim($movie['synopsis'])));
                $picture = $movie['picture'];
                $video = trim($movie['video']);
                $actor_fk = intval($movie['actor_fk']);

                if (0 <= intval($time1) || intval($time1) <= 5 && 0 <= intval($time2) || intval($time2) <= 59) {
                    if (intval($time2) < 10) {
                        $time2 = "0" . $time2;
                    }
                    $time = $time1 . "h " . $time2 . "min";
                } else {
                    header("Location: ../index.php?controller=movie&action=add&error=4");
                }

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

                            unlink("./assets/img/movie/" . $picture);

                            // The image is added to a folder.
                            move_uploaded_file($tmpName, "./assets/img/movie/" . $namePicture);

                            $actor_fk = $manager->getActor($actor_fk);
                            if ($actor_fk->getId()) {
                                $a = new Movie(null, $title, $namePicture, $date, $time, $genre, $director, $actors, $synopsis, $video, $actor_fk);
                                $movieManager->add($a);

                                header("Location: ../index.php?controller=movie&action=viewAll&success=0");
                            }
                        } else {
                            header("Location: ../index.php?controller=movie&action=add&error=0");
                        }
                    } else {
                        header("Location: ../index.php?controller=movie&action=add&error=1");
                    }
                } else {
                    $actor_fk = $manager->getActor($actor_fk);
                    if ($actor_fk->getId()) {
                        $a = new Movie(null, $title, $picture, $date, $time, $genre, $director, $actors, $synopsis, $video, $actor_fk);
                        $movieManager->add($a);

                        header("Location: ../index.php?controller=movie&action=viewAll&success=0");
                    }
                }
            } else {
                header("Location: ../index.php?controller=movie&action=add&error=3");
            }
        }
        $this->return("update/updateMovie", "Modifier un film", ['movie' => $movieId]);
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
                header("Location: ../index.php?controller=picture&action=viewAll&success=3");
            }
            $this->return("delete/deletePicture", "Supprimer une photo");
        }
    }
}