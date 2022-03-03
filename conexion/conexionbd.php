<?php
     Class Conexion
    {
     static public $bd;
        function abrirCon()
        {
            try{
                 $this->bd = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");

                    echo("se conecto");
               }
                 catch(PDOException $exp){
                      echo("Error<br> $exp");
                 }
        }
    }
?>