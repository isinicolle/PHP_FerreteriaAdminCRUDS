<?php
    require_once('../conexion/conexionbd.php');
class Ventas {
    
    private $Ventas;
    private $db;

    public function __construct() {
        $this->Ventas = array();
        $this->db = new Conexion();
        $this->db->abrirCon();
    }

    private function setNames() {
        return $this->db->db->query("SET NAMES 'utf8'");
    }

    public function getVentas() {

       // self::setNames();
        $sql = "SELECT v.id_Venta,prod.descripcion_producto,c.nom_cliente+' '+c.apellido_cliente as Cliente,v.fecha,c.DNI_Cliente,dv.cantidad,dv.precio,dv.cantidad*dv.precio as Subtotal from Venta v 
       inner join DetallesVentas dv on v.id_Venta = dv.id_venta
       inner join Clientes c on c.id_cliente = v.id_cliente 
       inner join Productos prod on prod.id_producto = dv.id_producto ";
        foreach ($this->db->db->query($sql) as $res) {
            $this->Ventas[] = $res;
        }
        return $this->Ventas;
        $this->db = null;
    }
    public function getlistaproductos() {

        // self::setNames();
         $sql = "SELECT  id_producto, descripcion_producto AS producto,stock,precio_actual
         FROM            dbo.Productos";
        
         foreach ($this->db->db->query($sql) as $res) {
             $this->Ventas[] = $res;
         }
        
         return $this->Ventas;
     
     }

     public function getdatoscarga($idproducto_) {

        // self::setNames();
         $sql = " SELECT         dbo.Proveedores.nom_prov, dbo.Productos.id_producto, dbo.Productos.costo_producto,dbo.Productos.stock
         FROM            dbo.Productos join dbo.Proveedores on dbo.Productos.id_proveedor = dbo.Proveedores.id_prov
         WHERE        dbo.Productos.id_producto =$idproducto_";
        
         foreach ($this->db->db->query($sql) as $res) {
             $this->Ventas[] = $res;
         }
        
         return $this->Ventas;
     
     }
    public function setGuardar( $idCliente,$RtnEstado , $idDireccion, $descuento,$id_producto,$precio,$cantidad,$isv) {

        //self::setNames();
        $sql = "DECLARE @FkVentas INT
                INSERT INTO [dbo].Venta
                (fecha
                ,id_cliente
                ,RTN_estado,ISV
                ,id_direccionEnvio
                ,descuento)
                VALUES
                (  CAST(GETDATE()AS DATE),
                $idCliente, 
                '$RtnEstado','$isv', 
                '$idDireccion',
                '$descuento')
        
        
                 SET @FkVentas = SCOPE_IDENTITY()
        
            
                INSERT INTO [dbo].DetallesVentas
                        ([id_producto]
                        ,id_venta
                        ,[precio]
                        ,[cantidad])
                VALUES
                        ('$id_producto'
                        ,@FkVentas
                        ,'$precio'
                        ,'$cantidad') ";
        $result = $this->db->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function getVenta($idVenta)
    {
        $query = " SELECT v.id_cliente, v.id_Venta,prod.id_producto,v.fecha,dv.cantidad,prod.stock,dv.precio from Venta v 
        inner join DetallesVentas dv on v.id_Venta = dv.id_venta
        inner join Clientes c on c.id_cliente = v.id_cliente 
        inner join Productos prod on prod.id_producto = dv.id_producto where v.id_Venta=$idVenta ";
        foreach ($this->db->db->query($query) as $res) {
            $this->Ventas[] = $res;
        }
       return $this->Ventas;

    }
    public function setActualizar($idVenta,$idCliente,$RtnEstado,$isv,$idDireccion,$descuento,$idProducto,$cantidad,$precio) {

        //self::setNames();
        $sql = "	
		update Venta set 
		RTN_estado=$RtnEstado,id_cliente=$idCliente,
		ISV=$isv,id_direccionEnvio=$idDireccion,descuento=$descuento where id_Venta=$idVenta;
		update DetallesVentas set 
		cantidad=$cantidad,id_producto=$idProducto,precio=$precio where id_venta=$idVenta";
        $result = $this->db->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function setEliminar($idVenta) {

      //  self::setNames();
        $sql = "DELETE FROM [dbo].DetallesVentas
        WHERE id_venta = '$idVenta'

        DELETE FROM [dbo].Venta
        WHERE id_Venta = '$idVenta'";
        $result = $this->db->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}

    ?>