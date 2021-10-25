<?php
namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;
use Chloe\Marvel\Model\Manager\UserManager;
use Chloe\Marvel\Model\Entity\User;

class UserController {

    use ReturnViewTrait;

    /**
     * Account page
     * @param int $id
     */
    public function account() {
        $this->return("account", "Mon compte");
    }

}