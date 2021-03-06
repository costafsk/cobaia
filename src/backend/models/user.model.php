<?php

    class Usuario extends DAO  {
        public function cria ($usuario)  {
            if (!$this -> busca($usuario -> getCPF())) {
                return false;
            }

            $con = $this -> getConexao();

            $sql = 'INSERT INTO "Usuario" ("CPF", "username","descricao", "email", "senha")
                VALUES (?, ?, ?, ?, ?)';

            $stm = $con -> prepare($sql);

            $stm -> bindValue (1, $usuario -> getCPF());
            $stm -> bindValue (2, $usuario -> getUsername());
            $stm -> bindValue (3, $usuario -> getDescricao());
            $stm -> bindValue (4, $usuario -> getEmail());
            $stm -> bindValue (5, $usuario -> getSenha());

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
            $sql='UPDATE "Usuario" SET "username" = ?, "email" = ?, "senha" = ?, "descricao" = ? WHERE "CPF" = ? ';

            $stm = $con->prepare($sql);

            $stm->bindValue(1, $usuario -> getUsername());
            $stm->bindValue(2, $usuario -> getEmail());
            $stm->bindValue(3, $usuario -> getSenha());
            $stm->bindValue(4, $usuario -> getDescricao());
            $stm->bindValue(5, $usuario -> getCPF());
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

        public function lista ($limit, $offset) {
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
                    $usuario -> setDescricao($linha['descricao']);
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
                $usuario = new UsuarioModelo ($linha['CPF'], $linha['username'],$linha['email'], $linha['senha']);
                $usuario -> setDescricao($linha['descricao']);
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
