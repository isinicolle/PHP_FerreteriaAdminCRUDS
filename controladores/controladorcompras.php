<?php
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


        if (isset($_GET['idcompra'])){
            $idcompra = $_GET['idcompra'];
            $compra=  new ModeloCompras();
            if ($Compras->setEliminar($idcompra)){
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

        function getcargardatos($idproducto_){
            require_once("../modelos/modelocompras.php");
            $Compras= new ModeloCompras();
            $datos = $Compras->getdatoscarga($idproducto_);
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
    

?>