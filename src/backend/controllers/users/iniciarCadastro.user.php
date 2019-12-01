<?php

require_once('./../../classes/usuario.class.php');
require_once('./../../models/DAO.php');
require_once('./../../models/user.model.php');
require_once('./../../utils/utils.class.php');

$user = new Usuario();

$username = isset($_POST['username']);
$cpf = isset($_POST['cpf']);
$email = isset($_POST['email']);
$pass = isset($_POST['pass']);
$repass = isset($_POST['repass']);


if ($username && $email && $pass && $repass && $cpf) {
    $usuario = new UsuarioModelo($_POST['cpf'], $_POST['username'], $_POST['email']);
    $model = new Usuario();

    if (!$model -> busca($_POST['cpf'])) {
        header('Location: ./../../../../frontend/src/views/home/home.php?status=409');
    } else if ($_POST['pass'] !== $_POST['repass']) {
        header('Location: ./../../../../frontend/src/views/home/home.php?status=300');
    } else {
        $utils = new Utils();
        $usuario -> setSenha($utils -> encrypt($_POST['pass']));
        session_start();
        $usuarioSerializado = serialize($usuario);
        $_SESSION['register'] = $usuarioSerializado;
        header('Location: ./../../../../frontend/src/views/register/register.php');
    }
}
?>
