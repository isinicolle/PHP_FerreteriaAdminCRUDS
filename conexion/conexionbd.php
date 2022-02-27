<?php
     Class Conexion
    {
          public $bd;
        function abrirCon()
        {
            try{
                 $this->bd = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminunicah", "rootUnicah1");

                    echo("se conecto");
               }
                 catch(PDOException $exp){
                      echo("Error<br> $exp");
                 }
        }
    }
?>