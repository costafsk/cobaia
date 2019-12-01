<?php
require_once('./../../models/DAO.php');
require_once('./../../models/projeto.model.php');
require_once('./../../classes/projeto.class.php');
require_once('./../../classes/usuario.class.php');
require_once('./../../models/user.model.php');
session_start();

if ($_SESSION['register'] !== NULL) {

  $id = isset($_GET['id']);
  if ($id) {
    $model = new Projeto();
    $project = $model->busca(intval($_GET['id']));

    $user = unserialize($_SESSION['register']);

    if ($project->getCriador()->getCPF() === $user->getCPF()) {
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

        $projeto -> setID(intval($_GET['id']));

        var_dump($projeto);
        $model = new Projeto();

        $model -> altera($projeto);

        header('Location: ./../../../../frontend/src/views/projects/projects.php');
      }
    }
  } else {
    header('Location: ./../../../../frontend/src/views/projects/projects.php');
  }
} else {
  header('Location: ./../../../../frontend/src/views/home/home.php');
}
?>



