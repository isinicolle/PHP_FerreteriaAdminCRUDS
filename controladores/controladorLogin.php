<?php
    include('../modelos/modeloLogin.php');
    include_once('../controladores/controladorSesion.php');
    $session = new userSession;
    function login($usuario,$contra){
        $modelo_login = new Login;
        return $modelo_login->getUser($usuario,$contra);
    }
    if(isset($_POST['save']))
    {
        $usuario = $_POST['user'];
        $contra = $_POST['password'];
        if(login($usuario,$contra) == true){
            if(isset($_POST['remember'])){
                setcookie('user',$usuario,time()+84600);
                setcookie('password',$contra,time()+84600);  
            }else{
                setcookie('user','',time()+84600);
                setcookie('password','',time()+84600);
            }
            $_SESSION['user']=$usuario; 
            session_start();  
            header('Location: ../index.php');
        }else{
            header('Location: ../vistas/login.php');
        }
    }
?>