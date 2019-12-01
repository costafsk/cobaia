<?php

session_start();

$_SESSION['register'] = NULL;

header('Location: ./../../../frontend/src/views/home/home.php');
?>
