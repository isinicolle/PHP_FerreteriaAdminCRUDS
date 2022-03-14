<?php
    Class Conexion
    {
        public $db;
        public function abrirCon()
        {
            try{
                 $this->db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
               }
                 catch(PDOException $exp){
                      echo("Error<br> $exp");
                 }
        }
    }
?>