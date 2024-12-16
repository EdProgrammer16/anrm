<?php

namespace App\Model;
use Src\Classes\ClassToken;
class ClassComprovante extends ClassConexao {
    private $DB;
    public function Registrar($serie_num, $nome) {
        $BFetch = $this->DB = $this->conexaoDB()->prepare(
            "SELECT * FROM `comprovante` WHERE `serie_num` = :serie_num AND `nome` = :nome "
        );
        
        $this->DB->bindParam(":serie_num", $serie_num, \PDO::PARAM_STR);
        $this->DB->bindParam(":nome"     , $nome     , \PDO::PARAM_STR);
        $this->DB->execute();
        
        $i = 0;
        $Array = [];
        
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'        =>  $Fetch['id'       ],
                'serie_num' =>  $Fetch['serie_num'],
                'nome'      =>  $Fetch['nome'     ],
                'createdAt' =>  $Fetch['createdAt']
            ];
            $i++;
        }
        if(count($Array) == 0){
            
            $this->DB = $this->conexaoDB()->prepare(
                "INSERT INTO 
                    `comprovante`(`serie_num`, `nome`) 
                VALUES 
                    (:serie_num, :nome)"
            );

            $this->DB->bindParam(":serie_num", $serie_num, \PDO::PARAM_STR);
            $this->DB->bindParam(":nome", $nome, \PDO::PARAM_STR);
            $this->DB->execute();
            return $this->listarComprovanteSerie($serie_num);
        }else {
            return [];
        }
    }
    // ========================================================
    public function listarComprovanteSerie() {
        $serie_num = func_get_args()[0];
        
        $BFetch = $this->DB = $this->conexaoDB()->prepare(
            "SELECT * FROM `comprovante` WHERE `serie_num` = :serie_num"
        );
        
        $this->DB->bindParam(":serie_num", $serie_num, \PDO::PARAM_STR);
        $this->DB->execute();
        
        $i = 0;
        $Array = [];
        
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'        =>  $Fetch['id'       ],
                'serie_num' =>  $Fetch['serie_num'],
                'nome'      =>  $Fetch['nome'     ],
                'createdAt' =>  $Fetch['createdAt']
            ];
            $i++;
        }
        
        return $Array;
    }
    // ========================================================
    public function deletarUsuario($usuarioID) {
        $this->DB = $this->conexaoDB()->prepare("DELETE FROM `usuarios` WHERE `usuario_id` = :usuario_id");
        $this->DB->bindParam(":usuario_id", $usuarioID, \PDO::PARAM_INT);
        $this->DB->execute();
    }
    // ========================================================
    protected function atualizarUsuario( $id, $nome, $email, $bi, $perm ) {  
        $this->DB = $this->conexaoDB()->prepare(
            "UPDATE `usuarios` SET 
            `usuario_nome`  = :nome,
            `usuario_email` = :email,
            `usuario_bi`    = :bi,
            `usuario_perm`  = :perm,
            `usuario_dataUpt` = current_timestamp()
            WHERE `usuario_id` = :id");
        $this->DB->bindParam(":nome" , $nome , \PDO::PARAM_STR);
        $this->DB->bindParam(":email", $email, \PDO::PARAM_STR);
        $this->DB->bindParam(":perm" , $perm , \PDO::PARAM_STR);
        $this->DB->bindParam(":bi"   , $bi   , \PDO::PARAM_STR);
        $this->DB->bindParam(":id"   , $id   , \PDO::PARAM_INT);
        $this->DB->execute();
    }
    // ========================================================
    protected function alterarPassword($u_id, $u_pass) {
        $u_pass = password_hash($u_pass, PASSWORD_DEFAULT);
        $this->DB = $this->conexaoDB()->prepare(
            "UPDATE `usuarios` SET 
            `usuario_pass` = :uPass,
            `usuario_dataUpt` = current_timestamp()
            WHERE `usuario_id` = :id");
        $this->DB->bindParam(":uPass", $u_pass, \PDO::PARAM_STR);
        $this->DB->bindParam(":id"   , $u_id  , \PDO::PARAM_INT);
        $this->DB->execute();
    }
    
    
}