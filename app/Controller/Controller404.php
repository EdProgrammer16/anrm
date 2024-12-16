<?php

namespace App\Controller;
use Src\Classes\ClassRender;

class Controller404 extends ClassRender {

    public function __construct()
    {
        $this->setTitle(TITULO." | Página Não Encontrada");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("error-404");
        $this->renderLayout();
        exit();
    }
}