<?php
require_once('./../../models/DAO.php');
require_once('./../../classes/usuario.class.php');
require_once('./../../models/user.model.php');
require_once('./../../utils/utils.class.php');

$email = isset($_POST['CPF']);
$pass = isset($_POST['pass']);

$model = new Usuario();
$utils = new Utils();

$user = $model -> busca($_POST['CPF']);
if ($user) {
  if ($utils -> compare($_POST['pass'], $user -> getSenha())) {
    session_start();
    $_SESSION['register'] = serialize($user);
    header('Location: ./../../../../frontend/src/views/choose/choose.php');
  } else {
    header('Location: ./../../../frontend/src/views/home/home.php');
  }
} else {
  header('Location: ./../../../frontend/src/views/home/home.php');
}

?>
