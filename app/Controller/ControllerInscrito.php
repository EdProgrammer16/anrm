<?php

namespace App\Controller;

use App\Model\ClassCursos;
use App\Model\ClassInscritoCurso;
use App\Model\ClassInscritos;
use Src\Classes\ClassToken;
use Src\Classes\ClassRender;
session_start();

class ControllerInscrito extends ClassInscritos {
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
                $Render->setDescription("");
                $Render->setKeywords("");
                $Render->setDir("noAuth");
                $Render->renderLayout();
                exit();
            }
        }else {
            $Render = new ClassRender();
            $Render->setTitle("Não Autenticado");
            $Render->setDescription("");
            $Render->setKeywords("");
            $Render->setDir("noAuth");
            $Render->renderLayout();
            exit();
        }
        if(count($this->parserUrl()) == 1)
        {
            $Render = new ClassRender();

            $Render->setTitle(TITULO." | Página Do Inscrito");
            $Render->setDescription("");
            $Render->setKeywords("");
            $Render->setDir("inscrito");
            $result['usuario'   ] = $this->listarInscritoID($this->auth['usuario_id']);
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

    public function perfil()
    {
        if(count($this->parserUrl()) > 1)
        {
            $Render = new ClassRender();
            $inscritoCursos = new ClassInscritoCurso();
            $cursos = new ClassCursos();
            
            $Render->setTitle(TITULO." | Nova Concessão");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("inscrito-perfil");

            $result['usuario'      ] = $this->listarInscritoID($this->auth['usuario_id'])[0];
            $result['inscritoCurso'] = $inscritoCursos->listarInscricaoByInscritoID($this->auth['usuario_id'])[0];
            $result['curso'        ] = $cursos->listarCursoByID($result['inscritoCurso']['id_curso'])[0];

        $file = file_get_contents(DIRREQ.'app/json/detalhes.json');
        $data = json_decode($file, 1);
        $data_key = array_keys($data);
        
        if(!isset($data['p'.$result['curso']['nome']])){
            $data['p'.$result['curso']['nome']]['titulo'] = "Sem Dados Do Curso";
        }
            
            $result['breadcrumb'] = [
                'Painel do Inscrito',
                'Perfil'
            ];
            $result['active'] = [
                0 => 'inscrito'
            ];
            $result['curso'] = $data['p'.$result['curso']['nome']]['titulo'];
            $Render->renderLayout($result);
        }
    }

    public function editar() {
        $Render = new ClassRender();
        $result['usuario'] = $this->listarInscritoID($this->auth['usuario_id'])[0];
        $Render->setTitle(TITULO." | Editar Inscrito");
        $Render->setDescription("Esse é o nosso site de MVC");
        $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
        $Render->setDir("editar");
        $Render->renderLayout($result);
        exit();
    }
}