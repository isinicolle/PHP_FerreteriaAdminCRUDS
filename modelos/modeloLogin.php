<?php
    class Login {
        public $bd;
        private $login;
        public function __construct()
        {   
            $this->bd = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
            $this->login = array();
        }

        public function getUser($usuario,$contra) {
            $consulta = "select *from UsuarioEmpleados where nom_usuarioEmpleado = '$usuario' and contra_empleado like '%$contra%' and estado = 1" ;
                foreach($this->bd->query($consulta) as $res) {
                    $this->login[] = $res;
                }
                return $this->login;
                $this->bd = null;
        }
    }
?>