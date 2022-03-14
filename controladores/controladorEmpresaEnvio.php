<?php
    include_once('../modelos/modeloEmpresaEnvios.php');
    
    
    
    function listar()
    {
        $Empresa = new Empresa();
        return $Empresa->getEmpresas();
    }
   
    function listarCiudad(){
        $Empresa = new Empresa();
        return $Empresa->getCiudades();
    }
    function getEmpresaID($id)
    {
        $Empresa = new Empresa();
        $Empresa->getEmpresa($id);
        return   $Empresa->EmpresasEnvio;
    }
    if (isset($_POST['Insertar'])){
       
        if (!isset($_POST["nomEmpresa"])|| !isset($_POST['correo']) ||
        !isset($_POST['numTelefonico']) ||  !isset($_POST['ciudad']) ||
         !isset($_POST['direccion'])  )
        {
         echo("no se pai");
        }
      
        $direccion =  $_POST["direccion"];
        $nomEmpresa = $_POST["nomEmpresa"];
        $correo =  $_POST["correo"];
        $numTelefonico =  $_POST["numTelefonico"];
        $ciudad =  $_POST["ciudad"];
        $estado =  $_POST["estado"];
        
        $Empresa = new Empresa();
        $res = $Empresa->setEmpresa($nomEmpresa,$direccion,$numTelefonico,$ciudad,$estado,$correo);
        if ($res){
            echo('Hola');
            header('Location:../vistas/empresasEnvio.php');
        }
        else{
            echo"Un error inesperado al insertar datos";
        }
    };
    if (isset($_GET['idEmpresa'])){
        $idEmpresa = $_GET['idEmpresa'];
        $Empresa = new Empresa();
        if ($Empresa->deleteEmpresa($idEmpresa)){
            echo '<script>alert("Registro eliminado"</script>';
            time_nanosleep(3,0);
            header('Location:../vistas/empresasEnvio.php');

        }
        else
        {
            echo 'Ocurrio un error inesperado';
            time_nanosleep(3,0);
            header('Location:../vistas/empresasEnvio.php');
        }
    }


    if (isset($_POST["Modificar"])){
        if (!isset($_POST["nomEmpresa"])|| !isset($_POST['correo']) ||
        !isset($_POST['numTelefonico']) ||  !isset($_POST['ciudad']) ||
         !isset($_POST['direccion'])  )
        {
         echo("no se pai");
        }
        $idEmpresa = $_POST['idEmpresa'];
        $direccion =  $_POST["direccion"];
        $nomEmpresa = $_POST["nomEmpresa"];
        $correo =  $_POST["correo"];
        $numTelefonico =  $_POST["numTelefonico"];
        $ciudad =  $_POST["ciudad"];
        $estado =  $_POST["estado"];
        
        $Empresa = new Empresa();
        $res = $Empresa->updateEmpresa($idEmpresa,$nomEmpresa,$direccion,$numTelefonico,$ciudad,$estado,$correo);
        if ($res){
            header('Location:../vistas/empresasEnvio.php');
        }
        else{
            echo"Un error inesperado al insertar datos";
        }

    }



?>