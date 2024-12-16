<?php

namespace App\Controller;

use App\Model\ClassMinas;
use Src\Classes\ClassRender;
session_start();

class ControllerIndex extends ClassRender {
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parserUrl()) == 1)
        {
            $this->setTitle(TITULO." | Página Inicial");
            $this->setDescription("Esse é o nosso site de MVC");
            $this->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $this->setDir("index");
            $this->renderLayout();
            exit();
        }
    }
}