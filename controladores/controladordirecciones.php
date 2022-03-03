<?php

class controladorDirecciones{

    public function index()
    {
        require_once "./modelos/modeloDirecciones.php";
        $direcciones = new modelo_direcciones();
        $data["titulo"] = "Direcciones";
        $data["direcciones"] =  $direcciones -> get_direcciones;

        require_once "./vistas/direcciones.php";
    }
}

?>