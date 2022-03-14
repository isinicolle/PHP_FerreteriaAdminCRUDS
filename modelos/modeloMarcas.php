<?php
 include_once('../conexion/conexionbd.php');
class ModelMarca {
    
    private $marcas;
    private $db;

    public function __construct() {
        $this->marcas = array();
        $this->db=new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    public function getMarcas(){

        $sql = "SELECT * FROM Marcas";
        foreach ($this->db->query($sql) as $res) {
            $this->marcas[] = $res;
        }
        return $this->marcas;
        $this->db = null;
    }

        public function getMarcasId($id) {

            $sql = "SELECT * FROM Marcas WHERE id_marca = $id";
            foreach ($this->db->query($sql) as $res) {
                $this->marcas[] = $res;
            }
            return $this->marcas;
            $this->db = null;
        }
    
    public function setGuardar($descripcion_marca) {

        $sql = "INSERT INTO Marcas(descripcion_marca,estado)VALUES('$descripcion_marca','1' )";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public function setActualizar($id,$descripcion_marca,$estado) {

        $sql = "UPDATE Marcas set descripcion_marca='$descripcion_marca', estado=$estado WHERE id_marca='$id'";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteMarcas($id){

        $sql="DELETE FROM Marcas WHERE id_marca=$id";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>

