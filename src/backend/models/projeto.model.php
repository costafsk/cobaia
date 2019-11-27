<?php

    // require_onde('./../classes/projeto.class.php');

    class Projeto extends DAO {
        public function cria ($projeto)  {
            $con = $this -> getConexao();

            $sql = 'INSERT INTO Projeto ("titulo", "moeda", "tipoDePagamento", "valor", "prazo", "descricao", "CPFCriador", "status") VALUES (?, ?, ?, ?, ?, ?, ?, ?) RETURNING ID';

            $stm = $con -> prepare($sql);

            $stm -> bindValue (1, $projeto -> getTitulo());
            $stm -> bindValue (2, $projeto -> getMoeda());
            $stm -> bindValue (3, $projeto -> getTipoDePagamento());
            $stm -> bindValue (4, $projeto -> getValor());
            $stm -> bindValue (5, $projeto -> getPrazo());
            $stm -> bindValue (6, $projeto -> getDescricao());
            $stm -> bindValue (7, $projeto -> getCriador() -> getCPF());
            $stm -> bindValue (8, $projeto -> getStatus());
            $stm -> bindValue (9, $projeto -> getFreelancer() -> getCPF());

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
                $projeto -> setID(intval($linha['ID']));
            } else {
                echo $stm -> queryString;
                var_dump($stm->errorInfo());
            }
            $stm -> closeCursor();
            $stm = NULL;
            $con = NULL;
            return $res;
        }

        public function altera ($Projeto) {
            $con = $this->getConexao();

            $sql='UPDATE "Projeto" SET "titulo" = ?, "moeda" = ?, "tipoDePagamento" = ?, "valor" = ?, "prazo"  = ?, "descricao" = ?, "CPFCriador" = ?, "status" = ?, "CPFFreelancer" =  ? WHERE "ID" = ? ';

            $stm = $con->prepare($sql);

            $stm -> bindValue (1, $projeto -> getTitulo());
            $stm -> bindValue (2, $projeto -> getMoeda());
            $stm -> bindValue (3, $projeto -> getTipoDePagamento());
            $stm -> bindValue (4, $projeto -> getValor());
            $stm -> bindValue (5, $projeto -> getPrazo());
            $stm -> bindValue (6, $projeto -> getDescricao());
            $stm -> bindValue (7, $projeto -> getCriador() -> getCPF());
            $stm -> bindValue (8, $projeto -> getStatus());
            $stm -> bindValue (9, $projeto -> getFreelancer() -> getCPF());
            $stm -> bindValue (10, $projeto -> getID(), PDO::PARAM_INT);


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
            $sql = 'SELECT * FROM "Projeto" LIMIT ? OFFSET ?';
            $stm = $con -> prepare($sql);
            $stm -> bindValue(1,$limit);
            $stm -> bindValue(2,$offset);
            $res= $stm -> execute();
            $list = array();
            if($res){
                while($linha = $stm -> fetch(PDO::FETCH_ASSOC)){
                    $projeto = new ProjetoModelo(
                      $linha['titulo'],
                      $linha['CPFCriador'],
                      $linha['valor'],
                      $linha['prazo'],
                      $linha['moeda'],
                      $linha['descricao'],
                      $linha['tipoDePagamento'],
                      $linha['status']
                    );
                    $projeto -> setID(intval($linha['ID']));
                    array_push($list, $projeto);
                }
            }
            $stm -> closeCursor();
            $stm = NULL;
            $con = NULL;
            return $list;
        }

        public function busca ($ID) {
            $con = $this -> getConexao();
            $sql = 'SELECT * FROM "Projeto" WHERE "ID" = ?';
            $stm = $con -> prepare($sql);
            $stm -> bindValue(1, $ID);

            $res = $stm -> execute();
            if($res) {
                $linha = $stm -> fetch(PDO::FETCH_ASSOC);
                $projeto = new ProjetoModelo(
                  $linha['titulo'],
                  $linha['CPFCriador'],
                  $linha['valor'],
                  $linha['prazo'],
                  $linha['moeda'],
                  $linha['descricao'],
                  $linha['tipoDePagamento'],
                  $linha['status']
                );
                $projeto -> setID(intval($linha['ID']));
            }
            else{
                echo $stm -> queryString;
                var_dump($stm -> errorInfo());
            }
            $stm -> closeCursor();
            $stm = NULL;
            $con = NULL;
            return $usuario;
        }

        public function deleta ($ID) {
            $con = $this -> getConexao();
            $sql = 'DELETE FROM "Projeto" WHERE "ID" = ?';
            $stm = $con -> prepare($sql);
            $stm -> bindValue(1, $ID);
            $res = $stm -> execute();
            if(!$res){
                echo $stm -> queryString;
                var_dump($stm -> errorInfo());
            }
            $stm -> closeCursor();
            $stm = NULL;
            $con = NULL;
            return $res;
        }
    }

?>
