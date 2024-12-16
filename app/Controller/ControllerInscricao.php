<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use App\Model\ClassCursos;
use App\Model\ClassInscritoCurso;
use App\Model\ClassInscritos;

session_start();

class ControllerInscricao extends ClassRender {
    use \Src\Traits\TraitUrlParser;

    private $serie_num, $nome, $sobrenome, $username, $bi, $email, $tel, $endereco, $pay_form;

    public function __construct()
    {
        if(count($this->parserUrl()) == 1)
        {
            $this->setTitle(TITULO." | Portifólio");
            $this->setDescription("Esse é o nosso site de MVC");
            $this->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $this->setDir("portifolio");
            $this->renderLayout();
            exit();
        }
    }

    public function curso($type) {
        $Render = new ClassRender();
        $Render->setTitle(TITULO." | Cursos - ".strtoupper($type));
        $Render->setDescription("Esse é o nosso site de MVC");
        $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
        $Render->setDir("inscricao");
        $Render->renderLayout();
        exit();
    }

    private function filterPost() {
        $this->nome      = (isset($_POST['nome'])) ? filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $this->sobrenome = (isset($_POST['sobrenome'])) ? filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $this->username  = (isset($_POST['username'])) ? filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $this->bi        = (isset($_POST['bi'])) ? filter_input(INPUT_POST, 'bi', FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $this->email     = (isset($_POST['email'])) ? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $this->tel       = (isset($_POST['tel'])) ? filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $this->endereco  = (isset($_POST['endereco'])) ? filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $this->pay_form  = (isset($_POST['pay_form'])) ? filter_input(INPUT_POST, 'pay_form', FILTER_SANITIZE_SPECIAL_CHARS) : null;
    }

    public function add($type_curso) {
        $Render    = new ClassRender();
        $inscritos = new ClassInscritos();
        $cursos    = new ClassCursos();
        $inscritoCurso = new ClassInscritoCurso();

        $Render->setDescription("Esse é o nosso site de MVC");
        $Render->setKeywords("Cursos, Topofly, $type_curso");

        if(!isset($_POST['inscrever_me'])){
            $Render->setTitle(TITULO." | Erro na Inscrição");
            $Render->setDir("erro");
            $Render->renderLayout();
            exit();
        }
        $this->filterPost();
        do {
            $this->serie_num = $this->gerarSerialUnico();
        }while ($inscritos->listarInscritoSerie($this->serie_num) != []);

        $res = $inscritos->Inscrever(
            $this->serie_num,
            $this->nome,
            $this->sobrenome,
            $this->username,
            $this->bi,
            $this->email,
            $this->tel,
            $this->endereco,
            $this->pay_form
        );

        if(count($res) == 0) header("location: ".DIRPAGE."inscricao/erro/inscrito");

        $cursoID = $cursos->listarCursoByNome($type_curso);

        $res1 = $inscritoCurso->InscreverCurso($cursoID[0]['id'], $res[0]['id']);
        if( count($res1) == 0 ) 
            header("location: ".DIRPAGE."inscricao/erro/inscricao_curso");
        
        switch($res[0]['pagamento']) {
            case 'fisico': 
                header("location: ".DIRPAGE."pagamento/boletim/".$res[0]['serie_num']);
                break;
            case 'transferencia': 
                header("location: ".DIRPAGE."pagamento/comprovante/".$res[0]['serie_num']);
                break;
            default:
            header("location: ".DIRPAGE."pagamento/boletim/".$res[0]['serie_num']);
        }
        
    }

    private function gerarSerialUnico() {
        // Definindo os caracteres possíveis para as letras (A-Z)
        $letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        // Gerando duas letras aleatórias
        $primeiraLetra = $letras[rand(0, 25)];
        $segundaLetra = $letras[rand(0, 25)];
        
        // Gerando um número aleatório entre 10 e 999 (para permitir números de 2 a 3 dígitos)
        $numero = rand(10, 999);
        
        // Concatenando as letras e o número para formar o serial
        $serial = $primeiraLetra . $segundaLetra . $numero;
        
        return $serial;
    }
}
;