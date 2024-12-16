<?php

namespace App\Model;
use Src\Classes\ClassToken;
class ClassInscritoCurso extends ClassConexao {
    private $DB;
    // ========================================================
    public function InscreverCurso($id_curso, $id_inscrito) {
        $BFetch = $this->DB = $this->conexaoDB()->prepare(
            "SELECT * FROM `inscrito_curso` WHERE `id_curso` = :id_curso AND `id_inscrito` = :id_inscrito"
        );
        
        $this->DB->bindParam(":id_curso"   , $id_curso   , \PDO::PARAM_STR);
        $this->DB->bindParam(":id_inscrito", $id_inscrito, \PDO::PARAM_STR);
        $this->DB->execute();
        
        $i = 0;
        $Array = [];
        
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'          =>  $Fetch['id'         ],
                'id_curso'    =>  $Fetch['id_curso'   ],
                'id_inscrito' =>  $Fetch['id_inscrito']
            ];
            $i++;
        }

        if(count($Array) == 0){
            // var_dump($pass);
            // exit();
            $this->DB = $this->conexaoDB()->prepare(
                "INSERT INTO `inscrito_curso`(`id_curso`, `id_inscrito`)
                VALUES (:id_curso, :id_inscrito)"
            );

            $this->DB->bindParam(":id_curso", $id_curso, \PDO::PARAM_STR);
            $this->DB->bindParam(":id_inscrito", $id_inscrito, \PDO::PARAM_STR);
            $this->DB->execute();
            return $this->listarInscricaoByJoin($id_curso, $id_inscrito);
        }else {
            return [];
        }
    }
    // ========================================================
    public function listarInscricaoByJoin() {
        $id_curso = func_get_args()[0];
        $id_inscrito = func_get_args()[1];
        
        $BFetch = $this->DB = $this->conexaoDB()->prepare(
            "SELECT * FROM `inscrito_curso` WHERE `id_curso` = :id_curso AND `id_inscrito` = :id_inscrito"
        );
        
        $this->DB->bindParam(":id_curso"   , $id_curso   , \PDO::PARAM_STR);
        $this->DB->bindParam(":id_inscrito", $id_inscrito, \PDO::PARAM_STR);
        $this->DB->execute();
        
        $i = 0;
        $Array = [];
        
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'          =>  $Fetch['id'         ],
                'id_curso'    =>  $Fetch['id_curso'   ],
                'id_inscrito' =>  $Fetch['id_inscrito']
            ];
            $i++;
        }
        
        return $Array;
    }
    // ========================================================
    public function listarInscricaoByInscritoID() {
        $id_inscrito = func_get_args()[0];
        
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `inscrito_curso` WHERE `id_inscrito` = :id_inscrito");
        $this->DB->bindParam(":id_inscrito", $id_inscrito, \PDO::PARAM_INT);
        $this->DB->execute();
        
        $i = 0;
        $Array = [];
        
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'          =>  $Fetch['id'         ],
                'id_curso'    =>  $Fetch['id_curso'   ],
                'id_inscrito' =>  $Fetch['id_inscrito']
            ];
            $i++;
        }
        
        return $Array;
    }
}
