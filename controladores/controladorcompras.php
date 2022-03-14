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

        function Eliminar($id_compra){
            require_once("../modelos/modelocompras.php");
            $Compras = new ModeloCompras();
            $datos = $Compras->setEliminar($id);
            require_once("../vistas/compras.php");
        }


  
    }
    

?>