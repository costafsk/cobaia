<?php

    require_once('./DAO.php');

    class Projeto extends DAO {
        public function cria ($projeto)  {
            $con = $this -> getConexao();

            $sql = 'INSERT INTO Usuario ("CPFFreelancer", "titulo", "moeda", "tipoDePagamento", "valor", "prazo", "descricao", "CPFCriador", "status") VALUES (?, ?, ?, ?, ?, ?, ?, ?) RETURNING ID';
            
            $stm = $con -> prepare($sql);

            $stm -> bindValue (1, $projeto -> getFreelancer() -> getCPF());
            $stm -> bindValue (2, $projeto -> getTitulo());
            $stm -> bindValue (3, $projeto -> getMoeda());
            $stm -> bindValue (4, $projeto -> getTipoDePagamento());
            $stm -> bindValue (5, $projeto -> getValor());
            $stm -> bindValue (6, $projeto -> getPrazo());
            $stm -> bindValue (8, $projeto -> getDescricao());
            $stm -> bindValue (8, $projeto -> getCriador() -> getCPF());
            $stm -> bindValue (8, $projeto -> getStatus());

            try {
                $res = $stm -> execute(); 
            } catch (PDOExeption $e) {
                $stm -> closeCursor();
                $stm = NULL;
                $con = NULL;
                return array(error => $e);
            }
            
            if ($res) {
                $linha = $stm -> fetch(PDO::FETCH_ASSOC);
            } else {
                echo $stm -> queryString;
                var_dump($stm->errorInfo());
            }
            $stm -> closeCursor();
            $stm = NULL;
            $con = NULL;
            return $res;
        }

        public function altera ($usuario) {
            $con = $this->getConexao();
            $sql='UPDATE "Usuario" SET "username" = ?, "email" = ?, "senha" = ? WHERE "CPF" = ? ';

            $stm = $con->prepare($sql);
            
            $stm->bindValue(1, $usuario -> getUsername());
            $stm->bindValue(2, $usuario -> getEmail());
            $stm->bindValue(3, $usuario -> getSenha());
            $stm->bindValue(4, $usuario -> getCPF(), PDO::PARAM_INT);
            $res = $stm->execute();
            if(!$res){
                echo $stm -> queryString;
                var_dump($stm -> errorInfo());
            }
            $stm -> closeCursor();
            $stm = NULL;
            $con = NULL;
            return $res;
        }

        public function lista () {
            $con = $this -> getConexao();
            $sql = 'SELECT * FROM "Usuario" LIMIT ? OFFSET ?';
            $stm = $con->prepare($sql);
            $stm -> bindValue(1,$limit);
            $stm -> bindValue(2,$offset);
            $res= $stm -> execute();
            $list = array();
            if($res){	
                while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                    $usuario = new UsuarioModelo($linha['CPF'], $linha['username'],$linha['email']);
                    array_push($list, $usuario);
                }
            }
            $stm->closeCursor();
            $stm=NULL;
            $con = NULL;
            return $list;
        }

        public function busca ($CPF) {
            $con = $this -> getConexao();
            $sql = 'SELECT * FROM "Usuario" WHERE "CPF" = ?';
            $stm = $con->prepare($sql);
            $stm -> bindValue(1, $CPF);
    
            $res = $stm -> execute();
            if($res) {	
                $linha = $stm -> fetch(PDO::FETCH_ASSOC);
                $usuario = new UsuarioModelo ($linha['CPF'], $linha['username'],$linha['email']);
            }
            else{
                echo $stm->queryString;
                var_dump($stm->errorInfo());
            }
            $stm->closeCursor();
            $stm=NULL;
            $con = NULL;
            return $usuario;
        }

        public function deleta ($CPF) {
            $con = $this -> getConexao();
            $sql = 'DELETE FROM "Usuario" WHERE "CPF" = ?';
            $stm = $con -> prepare($sql);
            $stm->bindValue(1,$CPF);
            $res = $stm->execute();
            if(!$res){
                echo $stm->queryString;
                var_dump($stm->errorInfo());
            }
            $stm -> closeCursor();
            $stm = NULL;
            $con = NULL;
            return $res;
        }
    }

?>