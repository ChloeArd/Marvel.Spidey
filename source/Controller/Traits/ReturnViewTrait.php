<?php

namespace Chloe\Marvel\Controller\Traits;

use Exception;

trait ReturnViewTrait {

    /**
     * Allows you to display the right pages, the right content, the structure page,
     * the title of the page and the information you want to have.
     * @param string $view
     * @param string $title
     * @param array|null $var
     */
    public function return(string $view, string $title, array $var = null) {
        ob_start();
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/$view.php";
        $html = ob_get_clean();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/_Partials/structureView.php';
    }
}

/**
 * Allows you to give a random name to an image.
 * @param string $regularName
 * @return string
 */
function getRandomName(string $regularName): string {
    $infos = pathinfo($regularName);
    try {
        $bytes = random_bytes(15) ;
    }
    catch (Exception $e) {
        $bytes = openssl_random_pseudo_bytes(15);
    }
    return bin2hex($bytes) . "." . $infos['extension'];
}