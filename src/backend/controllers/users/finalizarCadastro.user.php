<?php
require_once('./../../classes/usuario.class.php');
require_once('./../../models/DAO.php');
require_once('./../../models/user.model.php');
require_once('./../../utils/utils.class.php');

session_start();

$desc = isset($_POST['desc']);

if ($desc) {
  $user = unserialize($_SESSION['register']);
  $user -> setDescricao($_POST['desc']);
  $model = new Usuario();

  $_SESSION['register'] = serialize($user);

  $model -> cria($user);
  header ('Location: ./../../../../frontend/src/views/choose/choose.php');
}

?>
