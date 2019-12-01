<?php

require_once('./../../classes/usuario.class.php');
require_once('./../../models/DAO.php');
require_once('./../../models/user.model.php');
require_once('./../../utils/utils.class.php');

session_start();

$user = new Usuario();

$username = isset($_POST['username']);
$cpf = isset($_POST['CPF']);
$email = isset($_POST['email']);
$pass = isset($_POST['pass']);
$desc = isset($_POST['desc']);

if ($_SESSION['register'] !== NULL) {
  if ($username && $email && $pass && $cpf && $desc) {
      if ($_POST['pass'] !== '') {
        $utils = new Utils();
        $pass = $utils -> encrypt($_POST['pass']);
        $usuario = new UsuarioModelo($_POST['CPF'], $_POST['username'], $_POST['email'], $pass);
      } else {
        $usuario = new UsuarioModelo($_POST['CPF'], $_POST['username'], $_POST['email'], unserialize($_SESSION['register']) -> getSenha());
      }

      $usuario -> setDescricao($_POST['desc']);

      var_dump($usuario);

      $model = new Usuario();
      $_SESSION['register'] = serialize($usuario);

      $model -> altera($usuario);
      header('Location: ./../../../../frontend/src/views/projects/projects.php');
  } else {
    header('Location: ./../../../../frontend/src/views/projects/projects.php');
  }
} else {
  header('Location: ./../../../../frontend/src/views/home/home.php');
}

