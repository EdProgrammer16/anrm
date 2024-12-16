<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use App\Model\ClassCursos;
use App\Model\ClassInscritoCurso;
use App\Model\ClassInscritos;

session_start();

class ControllerLogin extends ClassRender {
    use \Src\Traits\TraitUrlParser;

    private $username, $password;

    public function __construct()
    {
        if(count($this->parserUrl()) == 1)
        {
            $this->setTitle(TITULO." | Portifólio");
            $this->setDescription("Esse é o nosso site de MVC");
            $this->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $this->setDir("login");
            $this->renderLayout();
            exit();
        }
    }

    public function admin()
    {
        $this->setTitle(TITULO." | Login do Admin");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("login-admin");
        $this->renderLayout();
        exit();
    }

    public function error($type) {
        $Render = new ClassRender();
        $Render->setTitle(TITULO." | Login - Erro de ".$type);
        $Render->setDescription("");
        $Render->setKeywords("");
        $Render->setDir("login");
        $Render->renderLayout(['erro' => $type]);
        exit();
    }

    private function filterPost() {
        $this->username = (isset($_POST['username'])) ? filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $this->password = (isset($_POST['password'])) ? filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS) : null;
    }

    public function auth($type_login) {
        $Render    = new ClassRender();
        $inscritos = new ClassInscritos();
        $cursos    = new ClassCursos();
        $inscritoCurso = new ClassInscritoCurso();

        $Render->setDescription("Esse é o nosso site de MVC");
        $Render->setKeywords("Cursos, Topofly, $type_login");

        if(!isset($_POST['login_me'])){
            $Render->setTitle(TITULO." | Erro na Inscrição");
            $Render->setDir("erro");
            $Render->renderLayout();
            exit();
        }
        $this->filterPost();

        echo $this->username;echo "<br>";
        echo $this->password;echo "<br>";
        echo $type_login;echo "<br>";

        $duracao = time() + ( 60*60*3*24 );
        switch( $type_login ) {
            case 'inscrito':
                $result = $inscritos->signinInscrito($this->username, $this->password, $duracao);
                if($result['usuario'] && $result['pass']) {
                    $token_hash = $result['token'];
                    session_start();
                    $_SESSION['ELToken'] = $token_hash;
                    
                    header("Location: ".DIRPAGE."inscrito/perfil");
                }
                else if(!$result['usuario']) {header("Location: ".DIRPAGE."login/error/usuario");}
                else if(!$result['pass'   ]) {header("Location: ".DIRPAGE."login/error/password");}

                break;
            case 'admin':
                $result = $inscritos->signinAdmin($this->username, $this->password, $duracao);

                if($result['usuario'] && $result['pass']) {
                    $token_hash = $result['token'];
                    session_start();
                    $_SESSION['ELToken'] = $token_hash;
                    
                    header("Location: ".DIRPAGE."dashboard");
                }
                else if(!$result['usuario']) {header("Location: ".DIRPAGE."login/error/usuario");}
                else if(!$result['pass'   ]) {header("Location: ".DIRPAGE."login/error/password");}
                break;
            default:

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