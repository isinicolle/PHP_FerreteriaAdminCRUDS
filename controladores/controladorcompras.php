<?php
  require_once("../modelos/modelocompras.php");
    class ControladorCompras  {
        public function __construct() {
        }
        function Listar(){
            require_once("../modelos/modelocompras.php");
            $Compras= new ModeloCompras();
            $datos = $Compras->getcompras();
            return $datos;
        }
        
        function Listarproductos(){
            require_once("../modelos/modelocompras.php");
            $Compras= new ModeloCompras();
            $datos = $Compras->getlistaproductos();
       
            return $datos;
        }

 
        

        function getcargardatos($idproducto_){
            require_once("../modelos/modelocompras.php");
            $Compras= new ModeloCompras();
            $datos = $Compras->getdatoscarga($idproducto_);
            return $datos;
        }

        function getcargardatosactualizar($idactualizar){
            require_once("../modelos/modelocompras.php");
            $Compras= new ModeloCompras();
            $datos = $Compras->getdatoscargacompra($idactualizar);
            return $datos;
        }



        function Guardar($id_prov,$id_empleado , $isv, $descuento,$id_producto,$precio,$cantidad){
            require_once("../modelos/modelocompras.php");
            $Compras = new ModeloCompras();
            $datos = $Compras->setGuardar( $id_prov,$id_empleado , $isv, $descuento,$id_producto,$precio,$cantidad);
            require_once("../vistas/compras.php");
        }

        function Actualizar($id, $id_prov,$id_empleado , $isv, $descuento,$id_producto,$precio,$cantidad){
            require_once("../modelos/modelocompras.php");
            $Compras = new ModeloCompras();
            $datos = $Compras->setActualizar($id, $id_prov,$id_empleado , $isv, $descuento,$id_producto,$precio,$cantidad);
            require_once("../vistas/compras.php");
        }

       

    }
    if (isset($_GET['idcompra'])){
      
        $idcompra = $_GET['idcompra'];
        $compras=  new ModeloCompras();
        if ($compras->setEliminar($idcompra)){
            echo '<script>alert("Registro eliminado"</script>';
            time_nanosleep(3,0);
            header('Location:../vistas/compras.php');
        }
        else
        {
            echo 'Ocurrio un error inesperado';
            time_nanosleep(3,0);
            header('Location:../vistas/compras.php');
        }
    }

    if(isset($_POST['updatecompra']))
    {
     require_once("../modelos/modelocompras.php");
     $compras=  new ModeloCompras();

     $id_compra = $_GET['id'];
     $cantidad = $_POST['Inputcantidad'];
     $descuento = $_POST['InputDescuent'];
     $isv = $_POST['InputISV'];
     header('Location:../vistas/compras.php');
     return $compras->setActualizar($id_compra,$cantidad, $descuento, $isv);
 }



?>