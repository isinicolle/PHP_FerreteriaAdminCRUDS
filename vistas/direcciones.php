<!DOCTYPE html>
<html lang="es">
<head>
	<title>Direcciones</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" />
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<!--JQUERY-->
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
	
	<!-- Los iconos tipo Solid de Fontawesome-->
	<link rel="stylesheet"
		href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
	<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	
	<!-- Nuestro css-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/direcciones.css">

   <!-- DATA TABLE--> 
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">	
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#userList').DataTable();
        } );
    </script>

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
              <a class="nav-link " href="./clientes.php">Clientes / Usuarios</a>
              <a class="nav-link" href="./envios.php">Envios / Empresas </a>
              <a class="nav-link" href="./compras.php">Compras</a>
              <a class="nav-link " href="./Crud_Empleados.php">Empleados &Backslash; Usuarios</a>
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

    <!--Pesta;as de la tabla-->
	<div class="container">
        <div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><strong>Listado Direccion</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
                      aria-selected="true"><strong>Ingreso Direcciones</strong></a>
                  </li>
            </ul>
           
     <!--Ingreso de direcciones y tabla-->
     <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
          <div class="card">
            <div class="card-header">
              <h4>Listado de Direciones</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="userList" class="table table-bordered table-hover table-striped">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Direccion</th>
                      <th scope="col">Ciudad</th>
                      <th scope="col">Usuario Cliente</th>
                      <th scope="col">Direccion Opcional</th>
                      <th scope="col">Codigo Postal</th>
                      <th scope="col">Departamento</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Colonia el pedregal</td>
                      <td>Tegucigalpa</td>
                      <td>isiszapata</td>
                      <td>Centro tegucigalpa</td>
                      <td>11011</td>
                      <td>Francisco Morazan</td>
                      <td>
                        <a href="#"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Colonia el pedregal</td>
                      <td>Tegucigalpa</td>
                      <td>isiszapata</td>
                      <td>Centro tegucigalpa</td>
                      <td>11011</td>
                      <td>Francisco Morazan</td>
                      <td>
                        <a href="#"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Colonia el pedregal</td>
                      <td>Tegucigalpa</td>
                      <td>isiszapata</td>
                      <td>Centro tegucigalpa</td>
                      <td>11011</td>
                      <td>Francisco Morazan</td>
                      <td>
                        <a href="#"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Colonia el pedregal</td>
                      <td>Tegucigalpa</td>
                      <td>isiszapata</td>
                      <td>Centro tegucigalpa</td>
                      <td>11011</td>
                      <td>Francisco Morazan</td>
                      <td>
                        <a href="#"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                      
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
          <div class="card">
            <div class="card-header">
              <h4>Ingreso de direcciones</h4>
            </div>
            <div class="card-body">
              <form class="form needs-validation" id="form1" method="post" role="form" autocomplete="off" novalidate>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Ciudad: </label>
                    <div class="col-lg-9">
                      <select class="custom-select custom-select-lg mb-3" required>
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1">Tegucigalpa</option>
                        <option value="2">San pedro sula</option>
                        <option value="3">El paraiso</option>
                        <option value="4">Comayaguela</option>
                      </select>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Usuario Cliente: </label>
                    <div class="col-lg-9">
                      <select class="custom-select custom-select-lg mb-3" required>
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1">isiszapata</option>
                        <option value="2">isiszapata</option>
                        <option value="3">isiszapata</option>
                        <option value="4">isiszapata</option>
                      </select>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Direccion Opcional: </label>
                    <div class="col-lg-9">
                      <input class="form-control" type="email" required>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Codigo Postal: </label>
                    <div class="col-lg-9">
                      <input class="form-control" type="email" required>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Departamento: </label>
                    <div class="col-lg-9">
                      <select class="custom-select custom-select-lg mb-3" required>
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1">Francisco Morazan</option>
                        <option value="2">Yoro</option>
                        <option value="3">Santa Barbara</option>
                
                      </select>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                    </div>
                  </div>
               
               
       
                <div class="form-group row">
                  <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-primary" value="Save Changes">Enviar</button>
                    <button type="reset" class="btn btn-secondary" value="Cancel">Cancelar</button>
                  </div>
                </div>
              </form>
              <script src="../bootstrap/js/validacion.js"></script>
            </div>
          </div>
        </div>
      </div>


        </div>


        
    </div>
    <!--Fin pesta;as-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Si cierra sesi&oacute;n podr&iacute;a perder los datos en los que estaba trabajando.¿Desea continuar?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" > <a style="text-decoration: none;color: #fff;" href="./login.html">Cerrar sesión </a></button>
            </div>
          </div>
        </div>
      </div>
</body>
</html>