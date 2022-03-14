<?php
 include_once('../conexion/conexionbd.php');
     class Empresa {
        public $bd;
        public $Envios;
        public $Ventas;
        public $idVenta;
        public $EmpresasEnvio;
        public $idEmpresasEnvio;
        public $Ciudades;
        public $Departamentos;
        public function __construct()
        {
            $this->bd = new Conexion();
            $this->bd->abrirCon();
            $this->EmpresasEnvio = array();
            $this->Ciudades = array();
            $this->Departamentos = array();
        }


        public function getCiudades(){
            $query = "select * from Ciudades"  ;
            foreach ($this->bd->db->query($query) as $res){
                $this->Ciudades[]= $res;
            }
            return $this->Ciudades;             

        }
        public function getDepartamentos($idDepartamento){
            $query = "select * from Departamentos "  ;
            foreach ($this->bd->db->query($query) as $res){
                $this->Departamentos[]= $res;
            }
            return $this->Departamentos;             

        }


        public function getEmpresas(){

            $query = "select *  from EmpresasEnvio e 
            join Ciudades c on 
            c.id_ciudad=e.id_ciudad 
            join Departamentos d 
            on 
            c.id_departamento = d.id_departamento ";
            foreach($this->bd->db->query($query) as $res) {
                $this->EmpresasEnvio[] = $res;
            }
            return $this->EmpresasEnvio;
        }

      

        public function setEmpresa($nomEmpresa,$direccionEmpresa,$telEmpresa,$idCiudad,$estado=true,$correo){
            if ($estado==null)
            $estado='1' ;
            else $estado='0';

            $query = "INSERT INTO [dbo].[EmpresasEnvio]
            ([nombre_empresa]
            ,[direccion_empresa]
            ,[telefono_empresa]
            ,[id_ciudad]
            ,[estado]
            ,[correo_empresa])
            VALUES
            ('$nomEmpresa'
            ,'$direccionEmpresa'
            ,'$telEmpresa'
            ,$idCiudad
            ,$estado
            ,'$correo')";
           
          
            $res = $this->bd->db->query($query);
            if ($res){
                return true;
            }
            else
            return false;
        }

        public function getEmpresa($id){
            $query = "
                SELECT * From EmpresasEnvio where id_empresaEnvio=$id
            ";
            
            foreach($this->bd->db->query($query) as $res) {
                $this->EmpresasEnvio[] = $res;
            }
            return $this->EmpresasEnvio;
        }

        public function updateEmpresa($idEmpresa,$nomEmpresa,$direccionEmpresa,$telEmpresa,$idCiudad,$estado=true,$correo)
        {
            if ($estado==null)
            $estado='1' ;
            else $estado='0';
            
            $query = "UPDATE [dbo].[EmpresasEnvio]
            SET [nombre_empresa] = '$nomEmpresa'
                ,[direccion_empresa] = '$direccionEmpresa'
                ,[telefono_empresa] = '$telEmpresa'
                ,[id_ciudad] = $idCiudad
                ,[estado] = $estado
                ,[correo_empresa] = '$correo'
            WHERE id_empresaEnvio=$idEmpresa";
             
            $res =  $this->bd->db->query($query);
            if($res){
                return true;
            }
            else
            return false;
        }
        public function deleteEmpresa($idEmpresa)
        {
            $query = " DELETE FROM [dbo].[EmpresasEnvio]
              WHERE id_empresaEnvio=$idEmpresa";
            $res = $this->bd->db->query($query);
            if($res){
                return true;
            }
            else
            return false;
        }
        public function deleteEmpresaEstado($idEmpresa)
        {
            $query = "UPDATE [dbo].[EmpresasEnvio]
            SET [estado] = false
            WHERE id_empresaEnvio=$idEmpresa";
            $res = $this->bd->db->query($query);
            if($res){
                return true;
            }
            else
            return false;
        }

    } 




















?>