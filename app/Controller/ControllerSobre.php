<?php

namespace App\Controller;
use Src\Classes\ClassRender;
session_start();

class ControllerSobre extends ClassRender {
    use \Src\Traits\TraitUrlParser;
    
    public function __construct()
    {
        if(count($this->parserUrl()) == 1)
        {
            $this->setTitle(TITULO." | Página Inicial");
            $this->setDescription("Esse é o nosso site de MVC");
            $this->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $this->setDir("sobre-nos");
            $this->renderLayout();
            exit();
        }
    }
}