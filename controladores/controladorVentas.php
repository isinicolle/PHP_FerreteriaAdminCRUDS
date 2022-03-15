<?php
  require_once("../modelos/modeloVentas.php");
    class ControladorVentas  {
        public function __construct() {
        }
        function Listar(){
            $Ventas= new Ventas();
            $datos = $Ventas->getVentas();
            return $datos;
        }
        
        function Listarproductos(){
            $Ventas=new Ventas();
            $datos = $Ventas->getlistaproductos();
       
            return $datos;
        }

        function getVenta($idVenta){
            $Ventas = new Ventas();
            $datos = $Ventas->getVenta($idVenta);
            return $datos;
            
        }
        

        function getcargardatos($idproducto_){
        
            $Ventas= new Ventas();
            $datos = $Ventas->getdatoscarga($idproducto_);
            return $datos;
        }



        function Guardar( $idCliente,$RtnEstado,$isv , $idDireccion, $descuento,$id_producto,$precio,$cantidad){
           
            $Ventas = new Ventas();
            $datos = $Ventas->setGuardar(  $idCliente,$RtnEstado , $idDireccion, $descuento,$id_producto,$precio,$cantidad,$isv);
        
        }

        function Actualizar($idVenta,$idCliente,$RtnEstado,$isv,$idDireccion,$descuento,$idProducto,$cantidad,$precio){
            $Ventas = new Ventas();
            $datos = $Ventas->setActualizar($idVenta,$idCliente,$RtnEstado,$isv,$idDireccion,$descuento,$idProducto,$cantidad,$precio);
            if ($datos)
            {
                header('Location:../vistas/ventas.php');
              
            }
            else
            {
                echo 'Ocurrio un error inesperado';
                time_nanosleep(3,0);
                header('Location:../vistas/ventas.php');
            }
            }
        }

       

    
    if (isset($_GET['idVenta'])){
      
        $idVenta = $_GET['idVenta'];
        $venta=  new Ventas();
        if ($venta->setEliminar($idVenta)){
            echo '<script>alert("Registro eliminado"</script>';
            time_nanosleep(3,0);
            header('Location:../vistas/ventas.php');
        }
        else
        {
            echo 'Ocurrio un error inesperado';
            time_nanosleep(3,0);
            header('Location:../vistas/ventas.php');
        }
    }

?>