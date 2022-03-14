<?php
    
    include('../modelos/modeloLogin.php');
    $usuario = $_POST['login'];
    $contra = $_POST['password'];
    session_start();
    $_SESSION['usuario']=$usuario;
    $modelo_login = new Login;

    if($modelo_login->getUser($usuario,$contra)){
        header('Location: ../../index.php');
    }
?>