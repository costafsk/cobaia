<?php
require_once('./../../classes/usuario.class.php');
require_once('./../../models/DAO.php');
require_once('./../../models/user.model.php');

session_start();

$desc = isset($_POST['desc']);

if ($desc) {
  $user = unserialize($_SESSION['register']);
  $user -> setDescricao($_POST['desc']);

  $model = new Usuario();

  $model -> cria($user);
}

?>
