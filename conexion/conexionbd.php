<?php
    Class Conexion
    {
        public function CadenaConexion()
        {
            $this->bbdd = new PDO('andresmunicah.database.windows.net;ferreteria_MovilWeb',"rootUnicah1","@Rafarazer97");
            return $this->bbdd;
        }
    }
?>