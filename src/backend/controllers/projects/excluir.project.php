<?php
require_once('./../../models/DAO.php');
require_once('./../../models/projeto.model.php');
require_once('./../../classes/projeto.class.php');
require_once('./../../classes/usuario.class.php');
require_once('./../../models/user.model.php');

session_start();

$id = isset($_GET['id']);

if ($_SESSION['register'] !== NULL) {
  if ($id) {
    $model = new Projeto();
    $project = $model -> busca(intval($_GET['id']));

    $user = unserialize($_SESSION['register']);

    if ($project -> getCriador() -> getCPF() === $user -> getCPF()) {
      $model -> deleta(intval($_GET['id']));
    }
    header('Location: ./../../../frontend/src/views/projects/projects.php');
  } else {
    header('Location: ./../../../frontend/src/views/projects/projects.php');
  }
} else {
  header('Location: ./../../../../frontend/src/views/home/home.php');
}


?>
