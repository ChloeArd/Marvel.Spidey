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
        $movies = $manager->getMovies(1);
        $this->return("movies", "Films", ['movies' => $movies]);
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
                $actorManager = new ActorManager();

                $title = htmlentities(ucfirst(trim($movie['title'])));
                $date = $movie['date'];
                $time1 = htmlentities(trim($movie['time']));
                $time2 = htmlentities(trim($movie['time2']));
                $genre = htmlentities(ucfirst(trim($movie['genre'])));
                $director = htmlentities(ucfirst(trim($movie['director'])));
                $actors = htmlentities(ucfirst(trim($movie['actors'])));
                $synopsis = htmlentities(ucfirst(trim($movie['synopsis'])));
                $video = htmlentities(ucfirst(trim($movie['video'])));
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

                            $actor_fk = $actorManager->getActor($actor_fk);
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
        $this->return("create/createMovie", "Poster une photo", ['actors' => $actor]);
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

                    header("Location: ../index.php?controller=picture&action=view&id=$id&success=1");
                } else {
                    header("Location: ../index.php?controller=picture&action=update&id=$id&error=0");
                }
            } else {
                header("Location: ../index.php?controller=picture&action=update&id=$id&error=1");
            }
        }
        $this->return("update/updatePicture", "Modifier une photo");
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