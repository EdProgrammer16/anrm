<?php

namespace App\Controller;
use Src\Classes\ClassRender;

class ControllerCursos {
    use \Src\Traits\TraitUrlParser;
    public function __construct()
    {
        if(count($this->parserUrl()) == 1)
        {
            $Render = new ClassRender();
            $Render->setTitle(TITULO." | Serviços");
            $Render->setDescription("Esse é o nosso site de MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $Render->setDir("servicos");
            $Render->renderLayout();
            exit();
        }
    }

    public function tipo($type) {
        $Render = new ClassRender();
        $Render->setTitle(TITULO." | Cursos - ".strtoupper($type));
        $Render->setDescription("Esse é o nosso site de MVC");
        $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
        $Render->setDir("cursos-tipo");
        $Render->renderLayout();
        exit();
    }

}