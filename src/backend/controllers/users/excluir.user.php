<?php

require_once('./../../classes/usuario.class.php');
require_once('./../../models/DAO.php');
require_once('./../../models/user.model.php');

session_start();

$user = unserialize($_SESSION['register']);

$model = new Usuario();

$model -> deleta($user -> getCPF());

header('Location: ./../../../../frontend/src/views/home/home.php');
?>
