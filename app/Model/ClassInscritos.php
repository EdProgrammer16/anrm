<?php

namespace App\Model;
use Src\Classes\ClassToken;
class ClassInscritos extends ClassConexao {
    private $DB;
    public function Inscrever($serie_num, $nome, $sobrenome, $username, $identidade, $email, $tel, $endereco, $pay_form) {
        $BFetch = $this->DB = $this->conexaoDB()->prepare(
            "SELECT * FROM `inscritos` WHERE
                `username` = :username 
                OR `email` = :email 
                OR `identidade` = :identidade"
        );
        
        $this->DB->bindParam(":username", $username, \PDO::PARAM_STR);
        $this->DB->bindParam(":email", $email, \PDO::PARAM_STR);
        $this->DB->bindParam(":identidade", $identidade, \PDO::PARAM_STR);
        $this->DB->execute();
        
        $i = 0;
        $Array = [];
        
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'       =>  $Fetch['id'      ],
                'username' =>  $Fetch['username'],
                'email'    =>  $Fetch['email'   ],
                'identidade' =>  $Fetch['identidade']
            ];
            $i++;
        }
        if(count($Array) == 0){
            $pass = password_hash($identidade, PASSWORD_BCRYPT);
            // var_dump($pass);
            // exit();
            $this->DB = $this->conexaoDB()->prepare(
                "INSERT INTO 
                `inscritos`( 
                    `serie_num`, `nome`, 
                    `sobrenome`, `username`, 
                    `identidade`, `email`, 
                    `tel`, `endereco`, 
                    `password`, `pagamento`) 
                VALUES 
                    (:serie_num, :nome, :sobrenome, :username, :identidade, :email, :tel, :endereco, :password, :pay_form)"
            );

            $this->DB->bindParam(":serie_num", $serie_num, \PDO::PARAM_STR);
            $this->DB->bindParam(":nome", $nome, \PDO::PARAM_STR);
            $this->DB->bindParam(":sobrenome" , $sobrenome , \PDO::PARAM_STR);
            $this->DB->bindParam(":username"   , $username   , \PDO::PARAM_STR);
            $this->DB->bindParam(":identidade" , $identidade , \PDO::PARAM_STR);
            $this->DB->bindParam(":email", $email, \PDO::PARAM_STR);
            $this->DB->bindParam(":tel" , $tel , \PDO::PARAM_STR);
            $this->DB->bindParam(":endereco"   , $endereco   , \PDO::PARAM_STR);
            $this->DB->bindParam(":password"   , $pass   , \PDO::PARAM_STR);
            $this->DB->bindParam(":pay_form" , $pay_form , \PDO::PARAM_STR);
            $this->DB->execute();
            return $this->listarInscritoSerie($serie_num);
        }else {
            return [];
        }
    }
    // ========================================================
    public function signinInscrito($username, $password, $duracao) {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `inscritos` WHERE username = :username OR email = :username");
        $this->DB->bindParam(":username", $username, \PDO::PARAM_STR);
        $this->DB->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'         =>  $Fetch['id'        ],
                'serie_num'  =>  $Fetch['serie_num' ],
                'nome'       =>  $Fetch['nome'      ],
                'username'   =>  $Fetch['username'  ],
                'email'      =>  $Fetch['email'     ],
                'sobrenome'  =>  $Fetch['sobrenome' ],
                'identidade' =>  $Fetch['identidade'],
                'tel'        =>  $Fetch['tel'       ],
                'endereco'   =>  $Fetch['endereco'  ],
                'password'   =>  $Fetch['password'  ],
                'pagamento'  =>  $Fetch['pagamento' ] 
            ];
            $i++;
        }
        $message = [
            'usuario' => false,
            'pass'    => false,
            'nivel'   => 'inscrito',
            'token'   => null
        ];
        if(count($Array) > 0):
            $message['usuario'] = true;
            if(password_verify($password, $Array[0]['password'])){
                $token = new ClassToken();
                $result = $token->createToken([
                    'token_IdUser'   => $Array[0]['id'],
                    'token_LoginUser'=> $Array[0]['username'],
                    'token_Nivel'    => 'inscrito',
                    'token_duration' => $duracao
                ]);
                $message = [
                    'usuario' => true,
                    'pass'    => true,
                    'nivel'   => 'inscrito',
                    'token'   => $result
                ];
                $duracao = date('Y-m-d H:i:s', $duracao);
                $id_user = intval($Array[0]['id']);
                $this->DB = $this->conexaoDB()->prepare("INSERT INTO `tokens`(`token_idUser`, `token_hash`, `token_status`, `token_expireDate`)VALUES(:token_idUser, :token_hash, '1', :duracao)");
                $this->DB->bindParam(":token_idUser", $id_user, \PDO::PARAM_INT);
                $this->DB->bindParam(":token_hash", $result, \PDO::PARAM_STR);
                $this->DB->bindParam(":duracao", $duracao, \PDO::PARAM_STR);
                $this->DB->execute();
            }else {
                $message['pass'] = false;
            }
        else:
            $message['usuario'] = false;
        endif;
        return $message;
    }
    // ========================================================
    public function signinAdmin($username, $password, $duracao) {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `admin` WHERE username = :username OR email = :username");
        $this->DB->bindParam(":username", $username, \PDO::PARAM_STR);
        $this->DB->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'         =>  $Fetch['id'        ],
                'nome'       =>  $Fetch['nome'      ],
                'username'   =>  $Fetch['username'  ],
                'email'      =>  $Fetch['email'     ],
                'sobrenome'  =>  $Fetch['sobrenome' ],
                'identidade' =>  $Fetch['identidade'],
                'tel'        =>  $Fetch['tel'       ],
                'createdAt'  =>  $Fetch['createdAt' ]
            ];
            $i++;
        }
        $message = [
            'usuario' => false,
            'pass'    => false,
            'nivel'   => 'admin',
            'token'   => null
        ];
        if(count($Array) > 0):
            $message['usuario'] = true;
            if(password_verify($password, $Array[0]['password'])){
                $token = new ClassToken();
                $result = $token->createToken([
                    'token_IdUser'   => $Array[0]['id'],
                    'token_LoginUser'=> $Array[0]['username'],
                    'token_Nivel'    => 'admin',
                    'token_duration' => $duracao
                ]);
                $message = [
                    'usuario' => true,
                    'pass'    => true,
                    'nivel'   => 'admin',
                    'token'   => $result
                ];
                $duracao = date('Y-m-d H:i:s', $duracao);
                $id_user = intval($Array[0]['id']);
                $this->DB = $this->conexaoDB()->prepare("INSERT INTO `tokens`(`token_idUser`, `token_hash`, `token_status`, `token_expireDate`)VALUES(:token_idUser, :token_hash, '1', :duracao)");
                $this->DB->bindParam(":token_idUser", $id_user, \PDO::PARAM_INT);
                $this->DB->bindParam(":token_hash", $result, \PDO::PARAM_STR);
                $this->DB->bindParam(":duracao", $duracao, \PDO::PARAM_STR);
                $this->DB->execute();
            }else {
                $message['pass'] = false;
            }
        else:
            $message['usuario'] = false;
        endif;
        return $message;
    }
    // ========================================================
    public function listarInscritoSerie() {
        $serie_num = func_get_args()[0];
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `inscritos` WHERE `serie_num` = :serie_num");
        $this->DB->bindParam(":serie_num", $serie_num, \PDO::PARAM_STR);
        $this->DB->execute();    
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'         =>  $Fetch['id'        ],
                'serie_num'  =>  $Fetch['serie_num' ],
                'nome'       =>  $Fetch['nome'      ],
                'username'   =>  $Fetch['username'  ],
                'email'      =>  $Fetch['email'     ],
                'sobrenome'  =>  $Fetch['sobrenome' ],
                'identidade' =>  $Fetch['identidade'],
                'tel'        =>  $Fetch['tel'       ],
                'endereco'   =>  $Fetch['endereco'  ],
                'pagamento'  =>  $Fetch['pagamento' ],
                'createdAt'  =>  $Fetch['createdAt' ]
            ];
            $i++;
        }
        
        return $Array;
    }
    // ========================================================
    public function listarInscritos() {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `inscritos` WHERE 1");
        $this->DB->execute();    
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'         =>  $Fetch['id'        ],
                'serie_num'  =>  $Fetch['serie_num' ],
                'nome'       =>  $Fetch['nome'      ],
                'username'   =>  $Fetch['username'  ],
                'email'      =>  $Fetch['email'     ],
                'sobrenome'  =>  $Fetch['sobrenome' ],
                'identidade' =>  $Fetch['identidade'],
                'tel'        =>  $Fetch['tel'       ],
                'endereco'   =>  $Fetch['endereco'  ],
                'pagamento'  =>  $Fetch['pagamento' ],
                'createdAt'  =>  $Fetch['createdAt' ]
            ];
            $i++;
        }
        
        return $Array;
    }
    // ========================================================
    public function listarInscritoID() {
        $id = func_get_args()[0];
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `inscritos` WHERE `id` = :id");
        $this->DB->bindParam(":id", $id, \PDO::PARAM_STR);
        $this->DB->execute();    
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'         =>  $Fetch['id'        ],
                'serie_num'  =>  $Fetch['serie_num' ],
                'nome'       =>  $Fetch['nome'      ],
                'username'   =>  $Fetch['username'  ],
                'email'      =>  $Fetch['email'     ],
                'sobrenome'  =>  $Fetch['sobrenome' ],
                'identidade' =>  $Fetch['identidade'],
                'tel'        =>  $Fetch['tel'       ],
                'endereco'   =>  $Fetch['endereco'  ],
                'pagamento'  =>  $Fetch['pagamento' ],
                'createdAt'  =>  $Fetch['createdAt' ]
            ];
            $i++;
        }
        
        return $Array;
    }
    // ========================================================
    public function listarAdminID() {
        $id = func_get_args()[0];
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `admin` WHERE `id` = :id");
        $this->DB->bindParam(":id", $id, \PDO::PARAM_STR);
        $this->DB->execute();    
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'         =>  $Fetch['id'        ],
                'nome'       =>  $Fetch['nome'      ],
                'username'   =>  $Fetch['username'  ],
                'email'      =>  $Fetch['email'     ],
                'sobrenome'  =>  $Fetch['sobrenome' ],
                'identidade' =>  $Fetch['identidade'],
                'tel'        =>  $Fetch['tel'       ],
                'createdAt'  =>  $Fetch['createdAt' ]
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
    public function atualizarInscrito( $id, $nome, $sobrenome, $username, $identidade, $email, $tel, $endereco, $pay_form ) {  
        $this->DB = $this->conexaoDB()->prepare(
            "UPDATE `inscritos` SET 
            `nome`=:nome,
            `sobrenome`=:sobrenome,
            `username`=:username,
            `identidade`=:identidade,
            `email`=:email,
            `tel`=:tel,
            `endereco`=:endereco,
            `pagamento`=:pay_form
            WHERE id = :id");
        $this->DB->bindParam(":nome"      , $nome      , \PDO::PARAM_STR);
        $this->DB->bindParam(":sobrenome" , $sobrenome , \PDO::PARAM_STR);
        $this->DB->bindParam(":username"  , $username  , \PDO::PARAM_STR);
        $this->DB->bindParam(":identidade", $identidade, \PDO::PARAM_STR);
        $this->DB->bindParam(":email"     , $email     , \PDO::PARAM_STR);
        $this->DB->bindParam(":tel"       , $tel       , \PDO::PARAM_STR);
        $this->DB->bindParam(":endereco"  , $endereco  , \PDO::PARAM_STR);
        $this->DB->bindParam(":pay_form"  ,$pay_form   , \PDO::PARAM_STR);
        $this->DB->bindParam(":id"  ,$pay_form   , \PDO::PARAM_INT);
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