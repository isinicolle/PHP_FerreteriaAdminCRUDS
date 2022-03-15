<?php
 include_once('../conexion/conexionbd.php');
     class Envios {
        public $bd;
        public $Envios;
        public $Ventas;
        public $idVenta;
        public $EmpresasEnvio;
        public $idEmpresasEnvio;

        public function __construct()
        {
            $this->bd = new Conexion();
            $this->bd->abrirCon();
            $this->Envios = array();
            $this->EmpresasEnvio = array();
        }


        public function getEmpresas(){

            $query = "SELECT * from EmpresasEnvio ";
            foreach($this->bd->db->query($query) as $res) {
                $this->EmpresasEnvio[] = $res;
            }
            return $this->EmpresasEnvio;
        }

        public function getVentas(){
            $query = 'SELECT * from Ventas ';
            foreach($this->bd->db->query($query) as $res) {
                $this->Ventas[] = $res;
            }
        }

        public function setEnvio($numRastreo,$idVenta,$idEmpresasEnvio){

            $query = "INSERT INTO Envios(num_rastreo,id_venta,id_empresaEnvio) Values ('$numRastreo','$idVenta','$idEmpresasEnvio')";
            $estado = $this->bd->db->query($query);
            if ($estado){
                return true;
            }
            else
            return false;
        }
        public function getEnvios(){
            $query = "
                SELECT [id_envio]
                ,[num_rastreo]
                ,a.id_venta
                ,b.nombre_empresa,
                CONCAT(d.nom_cliente,' ',d.apellido_cliente) as Cliente
                FROM [dbo].[Envios] a
                join EmpresasEnvio b on 
                a.id_empresaEnvio =b.id_empresaEnvio
                join Venta c on 
                a.id_venta = c.id_Venta inner join Clientes d on
                c.id_cliente=d.id_cliente 
                

            ";
            foreach($this->bd->db->query($query) as $res) {
                $this->Envios[] = $res;
            }
            return $this->Envios;
        }

        public function getEnvioId($id){
            $query = "
                SELECT * From Envios where id_envio=$id
            ";
            foreach($this->bd->db->query($query) as $res) {
                $this->Envios[] = $res;
            }
            return $this->Envios;
        }

        public function updateEnvio($idEnvio,$numRastreo,$idVenta,$idEmpresasEnvio)
        {
            $query = "
            UPDATE [dbo].[Envios]
            SET [num_rastreo] = '$numRastreo'
            ,[id_venta] ='$idVenta'
            ,[id_empresaEnvio] = '$idEmpresasEnvio'
            WHERE id_envio='$idEnvio' ";
             
             
            $res =  $this->bd->db->query($query);
            if($res){
                return true;
            }
            else
            return false;
        }
        public function deleteEnvio($idEnvio)
        {
            $query = " DELETE FROM [dbo].[Envios]
            WHERE id_envio='$idEnvio' ";
            $res = $this->bd->db->query($query);
            if($res){
                return true;
            }
            else
            return false;
        }

    } 




















?>