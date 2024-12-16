<?php

namespace App\Controller;

use App\Model\ClassInscritos;
use Src\Classes\ClassToken;
use Src\Classes\ClassRender;
session_start();

class ControllerDashboard extends ClassRender {
    use \Src\Traits\TraitUrlParser;
    private $auth;
    public function __construct()
    {
        if(isset($_SESSION['ELToken'])){
            $token = new ClassToken();
            $cookie = $_SESSION['ELToken'];
            if($token->readToken( $cookie )['validation']){
                $this->auth = $token->readToken( $cookie )['values'];
            }else {
                $Render = new ClassRender();
                $Render->setTitle("Não Autenticado");
                $Render->setDescription("Esse é o nosso site de MVC");
                $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
                $Render->setDir("noAuth");
                $Render->renderLayout();
                exit();
            }
        }else {
            $Render = new ClassRender();
            $Render->setTitle("Não Autenticado");
            $Render->setDescription("Esse é o nosso site de MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $Render->setDir("noAuth");
            $Render->renderLayout();
            exit();
        }
        if(count($this->parserUrl()) == 1)
        {
            $Render = new ClassRender();
            $admin  = new ClassInscritos();

            $Render->setTitle(TITULO." | Página Inicial");
            $Render->setDescription("Esse é o nosso site de MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $Render->setDir("dashboard");
            $result['usuario'   ] = $admin->listarAdminID($this->auth['usuario_id'])[0];
            $result['inscritos' ] = $admin->listarInscritos();
            $result['breadcrumb'] = [
                'Dashboard'
            ];
            $result['active'   ] = [
                0 => 'dashboard',
                1 => 'dashboard'
            ];
            $Render->renderLayout($result);
        }
    }
}