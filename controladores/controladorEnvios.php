<?php
    include_once('../modelos/modeloEnvio.php');
    
    
    
    function listar()
    {
        $Envios = new Envios();
        return $Envios->getEnvios();
    }
    function getEmpresaEnvios(){
        $Empresas = new Envios();
        return $Empresas->getEmpresas();
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
    }
    


?>