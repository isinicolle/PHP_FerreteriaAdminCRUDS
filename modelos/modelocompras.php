<?php

class ModeloCompras {
    
    private $Compras;
    private $db;

    public function __construct() {
        $this->Compras = array();
        $this->db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getcompras() {

       // self::setNames();
        $sql = "SELECT        dbo.Compras.id_compra, dbo.Productos.descripcion_producto, dbo.Empleados.nom_empleado + ' ' + dbo.Empleados.apellido_empleado AS Empleado, dbo.Proveedores.nom_prov, dbo.Proveedores.correo_prov, 
        dbo.Compras.fecha_compra, dbo.DetalleCompras.precio, dbo.DetalleCompras.cantidad, dbo.DetalleCompras.cantidad*dbo.DetalleCompras.precio As Total
        FROM            dbo.Compras INNER JOIN
        dbo.DetalleCompras ON dbo.Compras.id_compra = dbo.DetalleCompras.id_compra INNER JOIN
        dbo.Empleados ON dbo.Compras.id_empleado = dbo.Empleados.id_empleado INNER JOIN
        dbo.Productos ON dbo.DetalleCompras.id_producto = dbo.Productos.id_producto INNER JOIN
        dbo.Proveedores ON dbo.Compras.id_prov = dbo.Proveedores.id_prov AND dbo.Productos.id_proveedor = dbo.Proveedores.id_prov";
        foreach ($this->db->query($sql) as $res) {
            $this->Compras[] = $res;
        }
        return $this->Compras;
        $this->db = null;
    }
    public function getlistaproductos() {

        // self::setNames();
         $sql = "SELECT  id_producto, descripcion_producto AS producto
         FROM            dbo.Productos ";
        
         foreach ($this->db->query($sql) as $res) {
             $this->Compras[] = $res;
         }
        
         return $this->Compras;
     
     }

     public function getdatoscarga($idproducto_) {

        // self::setNames();
         $sql = "SELECT        dbo.Proveedores.id_prov, dbo.Proveedores.nom_prov, dbo.Productos.id_producto,dbo.Proveedores.correo_prov, dbo.Productos.stock, dbo.Productos.costo_producto
         FROM            dbo.Productos INNER JOIN
                                  dbo.Proveedores ON dbo.Productos.id_proveedor = dbo.Proveedores.id_prov
         WHERE        dbo.Productos.id_producto =$idproducto_";
        
         foreach ($this->db->query($sql) as $res) {
             $this->Compras[] = $res;
         }
        
         return $this->Compras;
     
     }


    public function setGuardar( $id_prov,$id_empleado , $isv, $descuento,$id_producto,$precio,$cantidad) {

        //self::setNames();
        $sql = "DECLARE @FKcompras INT
        INSERT INTO [dbo].[Compras]
                ([fecha_compra]
                   ,[id_prov]
                   ,[id_empleado]
                   ,[isv]
                   ,[descuento])
                VALUES
                (  CAST(GETDATE()AS DATE),
                '$id_prov', 
                '$id_empleado',
                '$isv',
                '$descuento')
        
        
                 SET @FKcompras = SCOPE_IDENTITY()
        
            
        INSERT INTO [dbo].[DetalleCompras]
                   ([id_producto]
                   ,[id_compra]
                   ,[precio]
                   ,[cantidad])
             VALUES
                   ('$id_producto'
                   ,@FKcompras
                   ,'$precio'
                   ,'$cantidad')";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function setActualizar($id, $id_prov,$id_empleado , $isv, $descuento,$id_producto,$precio,$cantidad) {

        //self::setNames();
        $sql = "";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function setEliminar($id_compra) {

      //  self::setNames();
        $sql = "DELETE FROM [dbo].[DetalleCompras]
        WHERE [id_compra] = '$id_compra'

      DELETE FROM [dbo].[Compras]
     WHERE [id_compra] = '$id_compra'";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}

    ?>