<?php
namespace Chloe\Marvel\Controller;

use Chloe\Marvel\Controller\Traits\ReturnViewTrait;

class MemoryController {

    use ReturnViewTrait;

    public function memoryPage() {
        $this->return("memory", "Memory");
    }
}