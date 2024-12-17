<?php
namespace Src\Classes;

use Src\Traits\TraitUrlParser;

class ClassRoutes {
    use TraitUrlParser;
    
    private $Rota;
    
    #Metodo de retorno da rota
    public function getRota(){
        $url = $this->parserUrl();
        $I = $url[0];

        $this->Rota = array(
            "home"      => "ControllerCursos",
            "index"     => "ControllerCursos",
            ""          => "ControllerIndex",
            "quemsomos" => "ControllerSobre",
            "cursos"    => "ControllerCursos",
            "login"     => "ControllerLogin",
            "inscricao" => "ControllerInscricao",
            "inscrito"  => "ControllerInscrito",
            "dashboard" => "ControllerDashboard",
            "pagamento" => "ControllerPagamento",
            "contactos" => "ControllerContactos",

        );

        if(array_key_exists($I, $this->Rota)) {
            if(file_exists(DIRREQ."app/Controller/{$this->Rota[$I]}.php")) {
                return $this->Rota[$I];
            }else {
                return "Controller404";    
            }
        }else {
            return "Controller404";
        }
    }
}