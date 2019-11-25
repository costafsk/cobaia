<?php

require_once('./../../classes/usuario.class.php');
require_once('./../../models/user.model.php');

$username = isset($_POST['username']);
$cpf = isset($_POST['cpf']);
$email = isset($_POST['email']);
$pass = isset($_POST['pass']);
$repass = isset($_POST['repass']);

if ($username && $email && $pass && $repass && $cpf) {
    $usuario = new UsuarioModelo($_POST['cpf'], $_POST['username'], $_POST['email']);
    $model = new Usuario();
    
    if ($model -> busca($usuario -> getCPF())) {
        header('Location: ./../../../../frontend/src/views/register/register.php?status=409');
    } else if ($_POST['pass'] !== $_POST['repass']) {
        header('Location: ./../../../../frontend/src/views/register/register.php?status=300');
    } else {
        $usuario -> setSenha($_POST['pass']);
        session_start();
        $_SESSION['register'] = $usuario;
        header('Location: ./../../../../frontend/src/views/register/register.php?status=200');
    }
}
?>