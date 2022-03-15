<!DOCTYPE html>
<html lang="en">

<head>
  <title>Formulario de clientes</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../bootstrap/css/cliente.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" />
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <!-- Todo para la data table-->
<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
	<link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script 
		src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script 
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	

   <!-- DATA TABLE--> 
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>	
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
   <script type="text/javascript">
       $(document).ready(function() {
           //Asegurate que el id que le diste a la tabla sea igual al texto despues del simbolo #
           $('#userList').DataTable();
       } );
   </script>
<!-- Todo para las datepicker -->


<!-- Datepicker -->
<link href='../bootstrap/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
<script src='../bootstrap/js/bootstrap-datepicker.min.js' type='text/javascript'></script>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../index.php">
              <img width="120" class="d-inline-block align-text-top" src="../bootstrap/img/LogoParrilla.png">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link " aria-current="page" href="../index.php">Index</a>
              <a class="nav-link  " href="./productos.php">Productos</a>
              <a class="nav-link" href="./proveedores.php">Proveedores</a>
              <a class="nav-link" href="./categorias.php">Categorias</a>
              <a class="nav-link" href="./marcas.php">Marcas</a>
              <a class="nav-link" href="./clientes.php">Clientes</a>
              <a class="nav-link active" href="./usuarioClientes.php">Usuarios Clientes</a>
              <a class="nav-link" href="../vistas/envios.php">Envios </a>
              <a class="nav-link" href="../vistas/empresasEnvio.php">Empresas </a>
              <a class="nav-link" href="./compras.php">Compras</a>
              <a class="nav-link " href="./empleados.php">Empleados &Backslash; Usuarios</a>
              <a class="nav-link " href="./ventas.php">Ventas</a>
              <a class="nav-link" href="./direcciones.php">Direcciones</a>
              <form class="d-flex">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cerrar sesi&oacute;n</button>
              </form>
              
            </div>
          </div>
        </div>
      </nav>
</header>