<?php
    class Empleados {
        private $bd;
        private $empleados;
        public function __construct()
        {
            $this->bd = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
            $this->empleados = array();
        }

        public function getEmpleados() {
            $consulta = "SELECT e.id_empleado,e.nom_empleado,e.apellido_empleado,u.correo_empleado,e.telefono_empleado, e.direccion_empleado,c.nombre_ciudad,r.descripcion,e.fnacimiento_empleado,e.estado FROM Empleados e 
            join UsuarioEmpleados u on e.id_empleado = u.id_empleado
            join RolesEmpleados r on e.id_rol = r.id_rol
            inner join Ciudades c on e.id_ciudad = c.id_ciudad";
            foreach($this->bd->query($consulta) as $res) {
                $this->empleados[] = $res;
            }
            return $this->empleados;
            $this->bd = null;
        }

        public function setSaveEmployee($nombre, $apellido, $telefono, $direccion, $idCiudad,$idRol,$fecha,$estado) {
            $sql = "INSERT INTO Empleados(nom_empleado,apellido_empleado,telefono_empleado, direccion_empleado,id_ciudad,id_rol,fnacimiento_empleado,Estado) VALUES (' $nombre ', ' $apellido ', '$telefono', '$direccion', $idCiudad ,$idRol,'$fecha',$estado)";
            $result = $this->bd->query($sql);
    
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        public function setSaveUser($estado,$usuario,$contra,$correo) {
            $sql = " INSERT INTO UsuarioEmpleados(nom_usuarioEmpleado,estado,contrasenia_empleado,correo_empleado,id_empleado) 
            VALUES ('$usuario',$estado,' $contra','$correo',(select top 1 id_empleado from Empleados  order by id_empleado desc))";
            $result = $this->bd->query($sql);
    
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

       
        public function setActualizar($id,$nombre, $apellido,$telefono, $direccion, $idCiudad,$idRol,$fecha,$estado) {
    
            $sql = "UPDATE Empleados set nom_empleado='$nombre', apellido_empleado='$apellido', telefono_empleado='$telefono',  direccion_empleado='$direccion',id_ciudad=$idCiudad ,id_rol=$idRol ,fnacimiento_empleado='$fecha' ,Estado=$estado WHERE id_empleado=$id";
            $result = $this->bd->query($sql);
    
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        public function setDelete($id) {

            $sql = "DELETE FROM UsuarioEmpleados where id_empleado = $id";
            $result = $this->bd->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
?>