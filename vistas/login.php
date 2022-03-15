<?php
include_once('../controladores/controladorLogin.php');
?>
<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>Login</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/login.css">

</head>
<body>
        <div class="modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text" id="modalerror">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ERROR DE ACCESO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Verifique que el Usuario y Contraseña sean Correctos.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal-dialog">
            <div class="col-sm-9 main-section">
                <div class="modal-content">
                    <div class="container pb-5">
                        <h1 data-text="Ferretea">Ferretea</h1>
                    </div>
                    <div class="col-12 user-img aling-center" >
                        <img src="../bootstrap/img/user.png">
                    </div>
                     <!--aca en la ACTION va ir el formulario al que vamos a ir-->
                    <form name='form' class="col-12" action="" method="post">
                        <!--Usuario-->
                        <div class="form-group" id="user-group">
                            <input required type="text" class="form-control" placeholder="Username" name="user" value="<?php
                                if(isset($_COOKIE['user'])){
                                    echo $_COOKIE['user'];
                                }
                            ?>">
                        </div>
                        <!--Contraseña-->
                        <div class="form-group" id="contrasena-group">
                            <input required type="password" class="form-control" placeholder="Password" name="password" value="<?php
                                if(isset($_COOKIE['password'])){
                                    echo $_COOKIE['password'];
                                }
                            ?>">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="form-control"  name="remember" value="<?php
                                if(isset($_COOKIE['remember'])){
                                    echo $_COOKIE['remember'];
                                }
                            ?>">
                        </div>
                      <!-- <input type="submit" onclick=go() class="btn btn-primary" name='save' data-toggle="modal" data-target="#exampleModal"> -->
                        <input type="submit" class="btn btn-primary" name='save' value='Ingresar' >
                    </form>
                   <!--
                     <div class="col-12 forgot" id="olvido">
                        <a href="#">I forgot my password?</a>
                    </div>
                   -->
                </div>
            </div>
        </div>
</body>
</html>
