<?php
    Class Conexion
    {
        public $bd;
        public function abrirCon()
        {
            try{
                 $this->bd = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
               }
                 catch(PDOException $exp){
                      echo("Error<br> $exp");
                 }
        }
    }
?>