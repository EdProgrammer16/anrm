<?php

namespace App\Model;
use Src\Classes\ClassToken;
class ClassCursos extends ClassConexao {
    private $DB;
    // ========================================================
    public function listarCursoByNome() {
        $nome = func_get_args()[0];
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `cursos` WHERE `nome` = :nome");
        $this->DB->bindParam(":nome", $nome, \PDO::PARAM_STR);
        $this->DB->execute();    
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'         =>  $Fetch['id'        ],
                'nome'       =>  $Fetch['nome'      ],
                'createdAt'  =>  $Fetch['createdAt' ],
            ];
            $i++;
        }
        
        return $Array;
    }
    // ========================================================
    public function listarCursoByID() {
        $id = func_get_args()[0];
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `cursos` WHERE `id` = :id");
        $this->DB->bindParam(":id", $id, \PDO::PARAM_STR);
        $this->DB->execute();    
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'         =>  $Fetch['id'        ],
                'nome'       =>  $Fetch['nome'      ],
                'createdAt'  =>  $Fetch['createdAt' ],
            ];
            $i++;
        }
        
        return $Array;
    }
}