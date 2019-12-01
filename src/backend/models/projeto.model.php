<?php

class Projeto extends DAO
{
  public function cria($projeto)
  {
    $con = $this->getConexao();

    $sql = 'INSERT INTO "Projeto" ("titulo", "moeda", "tipoDePagamento", "valor", "prazo", "descricao", "CPFCriador", "status", "requisitos", "tipoDeProjeto") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) RETURNING "ID"';

    $stm = $con->prepare($sql);

    $stm->bindValue(1, $projeto->getTitulo());
    $stm->bindValue(2, $projeto->getMoeda());
    $stm->bindValue(3, $projeto->getTipoDePagamento());
    $stm->bindValue(4, $projeto->getValor(), PDO::PARAM_INT);
    $stm->bindValue(5, $projeto->getPrazo());
    $stm->bindValue(6, $projeto->getDescricao());
    $stm->bindValue(7, $projeto->getCriador()->getCPF());
    $stm->bindValue(8, $projeto->getStatus());
    $stm->bindValue(9, $projeto->getRequisitos());
    $stm->bindValue(10, $projeto->getTipoDeProjeto());

    try {
      $res = $stm->execute();
    } catch (PDOExeption $e) {
      $stm->closeCursor();
      $stm = NULL;
      $con = NULL;
      return array(error => $e);
    }

    if ($res) {
      $linha = $stm->fetch(PDO::FETCH_ASSOC);
      $projeto->setID(intval($linha['ID']));
    } else {
      echo $stm->queryString;
      var_dump($stm->errorInfo());
    }
    $stm->closeCursor();
    $stm = NULL;
    $con = NULL;
    return $res;
  }

  public function altera($projeto)
  {
    $con = $this->getConexao();

    $sql = 'UPDATE "Projeto" SET "titulo" = ?, "moeda" = ?, "tipoDePagamento" = ?, "valor" = ?, "prazo"  = ?, "descricao" = ?, "CPFCriador" = ?, "status" = ?, "requisitos" = ?, "tipoDeProjeto" = ? WHERE "ID" = ? ';

    $stm = $con->prepare($sql);

    $stm->bindValue(1, $projeto->getTitulo());
    $stm->bindValue(2, $projeto->getMoeda());
    $stm->bindValue(3, $projeto->getTipoDePagamento());
    $stm->bindValue(4, $projeto->getValor(), PDO::PARAM_INT);
    $stm->bindValue(5, $projeto->getPrazo());
    $stm->bindValue(6, $projeto->getDescricao());
    $stm->bindValue(7, $projeto->getCriador()->getCPF());
    $stm->bindValue(8, $projeto->getStatus());
    $stm->bindValue(9, $projeto->getRequisitos());
    $stm->bindValue(10, $projeto->getTipoDeProjeto());
    $stm->bindValue(11, $projeto->getID(), PDO::PARAM_INT);


    $res = $stm->execute();

    if (!$res) {
      echo $stm->queryString;
      var_dump($stm->errorInfo());
    }
    $stm->closeCursor();
    $stm = NULL;
    $con = NULL;
    return $res;
  }

  public function lista($limit, $offset)
  {
    $con = $this->getConexao();
    $sql = 'SELECT * FROM "Projeto" LIMIT ? OFFSET ?';
    $stm = $con->prepare($sql);
    $stm->bindValue(1, $limit);
    $stm->bindValue(2, $offset);
    $res = $stm->execute();
    $list = array();
    $criadorDAO = new Usuario();

    if ($res) {
      while ($linha = $stm->fetch(PDO::FETCH_ASSOC)) {
        $criador = $criadorDAO->busca($linha['CPFCriador']);
        $projeto = new ProjetoModelo(
          $linha['titulo'],
          $criador,
          $linha['valor'],
          $linha['prazo'],
          $linha['moeda'],
          $linha['descricao'],
          $linha['tipoDePagamento'],
          $linha['requisitos'],
          $linha['tipoDeProjeto'],
          $linha['status']
        );
        $projeto->setID(intval($linha['ID']));
        $projeto->setCriadoEm($linha['criadoEm']);
        array_push($list, $projeto);
      }
    }
    $stm->closeCursor();
    $stm = NULL;
    $con = NULL;
    return $list;
  }

  public function listaProjetosDoUsuario($limit, $offset, $CPFCriador)
  {
    $con = $this->getConexao();
    $sql = 'SELECT * FROM "Projeto" WHERE "CPFCriador" = ? LIMIT ? OFFSET ?';
    $stm = $con->prepare($sql);
    $stm->bindValue(1, $CPFCriador);
    $stm->bindValue(2, $limit);
    $stm->bindValue(3, $offset);
    $res = $stm->execute();
    $list = array();
    $criadorDAO = new Usuario();

    if ($res) {
      while ($linha = $stm->fetch(PDO::FETCH_ASSOC)) {
        $criador = $criadorDAO->busca($linha['CPFCriador']);
        $projeto = new ProjetoModelo(
          $linha['titulo'],
          $criador,
          $linha['valor'],
          $linha['prazo'],
          $linha['moeda'],
          $linha['descricao'],
          $linha['tipoDePagamento'],
          $linha['requisitos'],
          $linha['tipoDeProjeto'],
          $linha['status']
        );
        $projeto->setID(intval($linha['ID']));
        $projeto->setCriadoEm($linha['criadoEm']);
        array_push($list, $projeto);
      }
    }
    $stm->closeCursor();
    $stm = NULL;
    $con = NULL;
    return $list;
  }

  public function busca($ID)
  {
    $con = $this->getConexao();
    $sql = 'SELECT * FROM "Projeto" WHERE "ID" = ?';
    $stm = $con->prepare($sql);
    $stm->bindValue(1, $ID, PDO::PARAM_INT);

    $res = $stm->execute();
    if ($res) {
      $linha = $stm->fetch(PDO::FETCH_ASSOC);
      $criadorDAO = new Usuario();
      $criador = $criadorDAO->busca($linha['CPFCriador']);
      $projeto = new ProjetoModelo(
        $linha['titulo'],
        $criador,
        $linha['valor'],
        $linha['prazo'],
        $linha['moeda'],
        $linha['descricao'],
        $linha['tipoDePagamento'],
        $linha['requisitos'],
        $linha['tipoDeProjeto'],
        $linha['status']
      );
      $projeto->setID(intval($linha['ID']));
      $projeto->setCriadoEm($linha['criadoEm']);
    } else {
      echo $stm->queryString;
      var_dump($stm->errorInfo());
    }
    $stm->closeCursor();
    $stm = NULL;
    $con = NULL;
    return $projeto;
  }

  public function deleta($ID)
  {
    $con = $this->getConexao();
    $sql = 'DELETE FROM "Projeto" WHERE "ID" = ?';
    $stm = $con->prepare($sql);
    $stm->bindValue(1, $ID, PDO::PARAM_INT);
    $res = $stm->execute();
    if (!$res) {
      echo $stm->queryString;
      var_dump($stm->errorInfo());
    }
    $stm->closeCursor();
    $stm = NULL;
    $con = NULL;
    return $res;
  }
}

?>
