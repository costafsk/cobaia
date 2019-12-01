<?php
require_once('./../../models/DAO.php');
require_once('./../../models/projeto.model.php');
require_once('./../../classes/projeto.class.php');
require_once('./../../classes/usuario.class.php');
require_once('./../../models/user.model.php');
session_start();

if ($_SESSION['register'] !== NULL) {
  $titulo = isset($_POST['titulo']);
  $tipoDeProjeto = isset($_POST['tipoDeProjeto']);
  $valor = isset($_POST['valor']);
  $moeda = isset($_POST['moeda']);
  $tipoDePagamento = isset($_POST['tipoDePagamento']);
  $prazo = isset($_POST['prazo']);
  $desc = isset($_POST['desc']);

  if (
      $titulo &&
      $tipoDeProjeto &&
      $valor &&
      $moeda &&
      $tipoDePagamento &&
      $prazo &&
      $desc
    ) {

      $criador = unserialize($_SESSION['register']);

      $requisitos = implode(", ", $_POST['requisitos']);

      $projeto = new ProjetoModelo(
        $_POST['titulo'],
        $criador,
        $_POST['valor'],
        $_POST['prazo'],
        $_POST['moeda'],
        $_POST['desc'],
        $_POST['tipoDePagamento'],
        $requisitos,
        $_POST['tipoDeProjeto']
      );

      $model = new Projeto();

      $model -> cria($projeto);

      header('Location: ./../../../../frontend/src/views/projects/projects.php');
    } else {
      header('Location: ./../../../../frontend/src/views/projects/projects.php');
    }
} else {
  header ('Location: ./../../../../frontend/src/views/home/home.php');
}
?>
