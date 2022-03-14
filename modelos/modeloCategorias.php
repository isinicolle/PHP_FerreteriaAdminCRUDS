<?php
 include_once('../conexion/conexionbd.php');
class ModelCategoria {
    
    private $categorias;
    private $db;

    public function __construct() {
        $this->categorias = array();
        $this->db=new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    public function getCategorias(){

        $sql = "SELECT * FROM Categorias";
        foreach ($this->db->query($sql) as $res) {
            $this->categorias[] = $res;
        }
        return $this->categorias;
        $this->db = null;
    }

        public function getCategoriasId($id) {

            $sql = "SELECT * FROM Categorias WHERE id_categoria = $id";
            foreach ($this->db->query($sql) as $res) {
                $this->categorias[] = $res;
            }
            return $this->categorias;
            $this->db = null;
        }
    
    public function setGuardar($descripcion_categoria) {

        $sql = "INSERT INTO Categorias(descripcion_categoria,estado) VALUES ('$descripcion_categoria','1' )";
        $result = $this->db->query($sql);
        
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public function setActualizar($id,$descripcion_categoria,$estado) {

        $sql = "UPDATE Categorias set descripcion_categoria='$descripcion_categoria', estado=$estado WHERE id_categoria='$id'";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategorias($id){

        $sql="DELETE FROM Categorias WHERE id_categoria=$id";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>

