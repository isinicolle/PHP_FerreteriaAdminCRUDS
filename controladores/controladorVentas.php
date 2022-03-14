<?php
    include_once('../modelos/modeloVentas.php');
    
    
    
    function listar()
    {
        $Ventas = new Venta();
        return $Ventas->getVentas();
    }
   /* function getEmpresaEnvios(){
        $Empresas = new Envios();
        return $Empresas->getEmpresas();
    }

    function getEnvioId($idEnvio){
        $Envio = new Envios();
        $Envio->getEnvioId($idEnvio);
        return $Envio->Envios;
    }

    if (isset($_POST['Insertar'])){
       
        if (!isset($_POST["numRastreo"])|| !isset($_POST['idVenta'])
        || !isset($_POST["idEmpresa"]))
        exit();

        $numRastreo = $_POST["numRastreo"];
        $idVenta = $_POST['idVenta'];
        $idEmpresa = $_POST["idEmpresa"];
        $Envio = new Envios();
        $estado = $Envio->setEnvio($numRastreo,$idVenta,$idEmpresa);
        if ($estado){
            echo('Hola');
            header('Location:../vistas/envios.php');
        }
        else{
            echo"Un error inesperado al insertar datos";
        }
    };
    if (isset($_GET['idEnvio'])){
        $idenvio = $_GET['idEnvio'];
        $Envio = new Envios();
        if ($Envio->deleteEnvio($idenvio)){
            echo '<script>alert("Registro eliminado"</script>';
            time_nanosleep(3,0);
            header('Location:../vistas/envios.php');

        }
        else
        {
            echo 'Ocurrio un error inesperado';
            time_nanosleep(3,0);
            header('Location:../vistas/envios.php');
        }
    }

     if (isset($_GET['idEnvioE'])){
        $idenvio = $_GET['idEnvio'];
        $Envio = new Envios();
        if ($Envio->deleteEnvio($idenvio)){
            echo '<script>alert("Registro eliminado"</script>';
            time_nanosleep(3,0);
            header('Location:../vistas/envios.php');

        }
        else
        {
            echo 'Ocurrio un error inesperado';
            time_nanosleep(3,0);
            header('Location:../vistas/envios.php');
        }
    }

    if (isset($_POST["Modificar"])){
        if (!isset($_POST["numRastreo"])|| !isset($_POST['idVenta'])
        || !isset($_POST["idEmpresa"]))
        exit();
        $idEnvio=$_POST["idEnvio"];
        $numRastreo = $_POST["numRastreo"];
        $idVenta = $_POST['idVenta'];
        $idEmpresa = $_POST["idEmpresa"];
        $Envio = new Envios();
        $estado = $Envio->updateEnvio($idEnvio,$numRastreo,$idVenta,$idEmpresa);
        if ($estado){
            echo('Hola');
            header('Location:../vistas/envios.php');
        }
        else{
            echo"Un error inesperado al insertar datos";
        }

    }
*/


?>