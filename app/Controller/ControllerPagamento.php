<?php

namespace App\Controller;

use App\Model\ClassComprovante;
use Src\Classes\ClassRender;
use App\Model\ClassCursos;
use App\Model\ClassInscritoCurso;
use App\Model\ClassInscritos;

session_start();

class ControllerPagamento extends ClassRender {
    use \Src\Traits\TraitUrlParser;

    private $serie_num, $nome, $sobrenome, $username, $bi, $email, $tel, $endereco, $pay_form;

    public function __construct()
    {
        if(count($this->parserUrl()) == 1)
        {
            $this->setTitle(TITULO." | Método de Pagamento");
            $this->setDescription("Está é a academia Topofly");
            $this->setKeywords("");
            $this->setDir("portifolio");
            $this->renderLayout();
            exit();
        }
    }

    public function boletim($serie_num) {
        $Render    = new ClassRender();
        $inscritos = new ClassInscritos();
        $cursos    = new ClassCursos();
        $inscritoCursos = new ClassInscritoCurso();

        $inscrito      = $inscritos->listarInscritoSerie($serie_num);
        $inscritoCurso = $inscritoCursos->listarInscricaoByInscritoID($inscrito[0]['id']);
        $curso         = $cursos->listarCursoByID($inscritoCurso[0]['id_curso']);

        $file = file_get_contents(DIRREQ.'app/json/detalhes.json');
        $data = json_decode($file, 1);
        $data_key = array_keys($data);
        
        if(!isset($data['p'.$curso[0]['nome']])){
            $data['p'.$curso[0]['nome']]['titulo'] = "Sem Dados Do Curso";
        }

        $Render->setTitle(TITULO." | Boletim de Inscrição - Serie: serie_num");
        $Render->setDescription("");
        $Render->setKeywords("Cursos, Topofly, Boletim de Inscrição, Boletim, Inscrição");
        $Render->setDir("boletim");
        $Render->renderLayout([
            'inscrito' => $inscrito[0], 
            'curso'    => $data['p'.$curso[0]['nome']]['titulo']
        ]);
        
        // echo "<pre>";
        // var_dump($inscrito);
        // var_dump($inscritoCurso);
        // var_dump($curso);
        // var_dump($data['p'.$curso[0]['nome']]['titulo']);
        
        exit();
    }
    public function comprovante($serie_num) {
        $Render    = new ClassRender();
        $inscritos = new ClassInscritos();
        $cursos    = new ClassCursos();
        $inscritoCursos = new ClassInscritoCurso();
        $comprovante = new ClassComprovante();

        $inscrito      = $inscritos->listarInscritoSerie($serie_num);
        $inscritoCurso = $inscritoCursos->listarInscricaoByInscritoID($inscrito[0]['id']);
        $curso         = $cursos->listarCursoByID($inscritoCurso[0]['id_curso']);

        if(isset($_POST['btn_comprovante'])){
            if (isset($_FILES['comprovante']) && $_FILES['comprovante']['error'] == 0) {
                // Obtém o tipo MIME do arquivo
                $tipoMime = mime_content_type($_FILES['comprovante']['tmp_name']);
                
                // Define os tipos MIME permitidos para PDF e imagens
                $tiposPermitidos = [
                    'application/pdf',   // Para arquivos PDF
                    'image/jpeg',        // Para imagens JPEG
                    'image/png',         // Para imagens PNG
                    'image/gif'          // Para imagens GIF
                ];
                
                // Verifica se o tipo MIME do arquivo está na lista de tipos permitidos
                if (in_array($tipoMime, $tiposPermitidos)) {
                    
                    mkdir(DIRREQ.'public/arquivos/'.$serie_num);
                    if(move_uploaded_file($_FILES['comprovante']['tmp_name'], DIRREQ.'public/arquivos/'.$serie_num.'/'.$_FILES['comprovante']['name'])){
                        $comprovante->Registrar($serie_num, $_FILES['comprovante']['name']);
                        header('location: '.DIRPAGE.'pagamento/boletim/'.$serie_num);
                    }else {
                        header('location: '.DIRPAGE.'pagamento/erro/guardar_comprovante');
                    }
                } else {
                    // O arquivo não é um PDF ou uma imagem válida
                    header('location: '.DIRPAGE.'pagamento/erro/formato_comprovante');
                }
            } else {
                header('location: '.DIRPAGE.'pagamento/erro/envio_comprovante');
            }
            exit();
        }

        $Render->setTitle(TITULO." | Carregar Comprovante - Serie: serie_num");
        $Render->setDescription("");
        $Render->setKeywords("Cursos, Topofly, Carregar Comprovante, Carregar, Comprovante");
        $Render->setDir("comprovante");
        $Render->renderLayout();
        
    }
}