<?php
 include_once('../conexion/conexionbd.php');
class ModelProveedor {
    
    private $proveedor;
    private $db;

    public function __construct() {
        $this->proveedor = array();
        $this->db=new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    public function getCiudad(){

        $sql = "SELECT id_ciudad, nombre_ciudad FROM Ciudades";
        foreach ($this->db->query($sql) as $res) {
            $this->ciudad[] = $res;
        }
        return $this->ciudad;
        $this->db = null;
    }

    public function getProveedor(){

        $sql = "SELECT p.id_prov, p.nom_prov, p.telefono_prov, p.correo_prov, p.direccion_prov, c.nombre_ciudad, p.Estado FROM Proveedores p INNER JOIN Ciudades c
            ON p.id_ciudad = c.id_ciudad";
        foreach ($this->db->query($sql) as $res) {
            $this->proveedor[] = $res;
        }
        return $this->proveedor;
        $this->db = null;
    }

        public function getProveedorId($id) {
/*
            $sql = "SELECT p.id_prov, p.nom_prov, p.telefono_prov, p.correo_prov, p.direccion_prov, c.id_ciudad, p.Estado FROM productoes p INNER JOIN Ciudades c
            ON p.id_ciudad = c.id_ciudad WHERE p.id_prov = $id";*/
            $sql = "SELECT * FROM Proveedores WHERE id_prov = $id";
            foreach ($this->db->query($sql) as $res) {
                $this->proveedor[] = $res;
            }
            return $this->proveedor;
            $this->db = null;
        }
    
    public function setGuardar($nom_prov, $telefono_prov, $correo_prov, $direccion_prov, $id_ciudad) {

        $sql = "INSERT INTO Proveedores(nom_prov, telefono_prov, correo_prov, direccion_prov, id_ciudad, Estado)
        VALUES('$nom_prov','$telefono_prov','$correo_prov','$direccion_prov','$id_ciudad','1' )";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public function setActualizar($id, $nom_prov, $telefono_prov, $correo_prov, $direccion_prov, $id_ciudad, $estado) {

        $sql = "UPDATE Proveedores SET nom_prov='$nom_prov', telefono_prov='$telefono_prov', correo_prov='$correo_prov', 
        direccion_prov='$direccion_prov', id_ciudad='$id_ciudad', estado=$estado WHERE id_prov='$id'";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProveedor($id){

        $sql="DELETE FROM Proveedores WHERE id_prov=$id";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>