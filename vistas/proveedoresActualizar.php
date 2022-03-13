<?php
 include_once('../controladores/controladorProveedores.php');

 if(isset($_GET['id'])){
  $idProv = $_GET['id'];
  foreach (listarUno($idProv) as $row){
      $id = $row[0];
      $nom_prov = $row[1];
      $telefono_prov = $row[2];
      $correo_prov = $row[3];
      $direccion_prov = $row[4];
      $id_ciudad = $row[5];
      $estado = $row[6];
  }    
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Actualizar Proveedor</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../bootstrap/css/crud_empleados.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" />
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Todo para la data table-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <!-- DATA TABLE--> 
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>	
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#userList').DataTable();
        } );
    </script>
  
  </head>
  <body>

  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <!-- Encabezado -->
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
              <a class="nav-link active" href="./empleados.php">Empleados &Backslash; Usuarios</a>
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

    <div class="container">
        <div class="mx-auto main-section" id="myTab" role="tablist">
          <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
              <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
                aria-selected="true"><strong>Formulario</strong></a>
            </li>
          </ul>
        </div>
    </div>  
            <!-- Formulario -->
          <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
            <div class="card container-md">
              <div class="card-header text-center">
                <h4>Actualizar Proveedor</h4>
              </div>
              <div class="card-body">

                <form class="form needs-validation" id="form1" action="../controladores/controladorProveedores.php?id=<?php echo $_GET['id']?>" method="POST" role="form" autocomplete="off" novalidate>               
                  <!-- Id-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Id</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $id?>" name="id" disabled required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                  <!-- Nombre Proveedor-->
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Nombre Proveedor: </label>
                  <div class="col-lg-9">
                    <input class="form-control" name="nom_prov" value="<?php echo $nom_prov?>" type="text" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                  <!-- Telefono Proveedor-->
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Telefono: </label>
                  <div class="col-lg-9">
                    <input class="form-control" name="telefono_prov" value="<?php echo $telefono_prov?>" type="text" maxlength="12" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <!-- Correo Proveedor-->
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Correo: </label>
                  <div class="col-lg-9">
                    <input class="form-control" name="correo_prov" value="<?php echo $correo_prov?>" type="email" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <!-- Direccion Proveedor-->
                <div class="form-group row">
                    <label class="col-lg-3  col-form-label form-control-label">Direccion: </label>
                    <div class="col-lg-9">
                      <input required type="text" class="form-control" value="<?php echo $direccion_prov?>" name="direccion_prov" maxlength="100"></textarea>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                </div>
                 <!-- Ciudad-->
                 <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Ciudad: </label>
                      <div class="col-lg-9">
                        <select class="custom-select custom-select-lg mb-3" name="id_ciudad" required>
                        <?php
                        $listarCiudad = listarCiudad();

                        for($ciudad = 0; $ciudad < sizeof($listarCiudad); $ciudad++){
                            if($listarCiudad[$ciudad]['id_ciudad'] == null){
                        ?>
                                <option value="<?php echo $listarCiudad[$ciudad]['id_ciudad']; ?>" selected><?php echo $listarCiudad[$ciudad]['nombre_ciudad']; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $listarCiudad[$ciudad]['id_ciudad']; ?>"><?php echo $listarCiudad[$ciudad]['nombre_ciudad']; ?></option>
                        <?php
                                }
                            }
                        ?>
                          
                        </select>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                  </div>

                    <!-- Estado-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Estado: </label>
                      <div class="col-lg-9 pt-2">
                        <select class="custom-select" name="estado" value="<?php echo $estado?>" required>
                          <option selected disabled value="">Seleccione</option>
                          <option name="estado" value="1">Activo</option>
                          <option name="estado" value="0">Inactivo</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-lg-12 text-center">
                        <input type='submit' class="btn btn-primary" name="update" value="Guardar Cambios">
                        <button type="reset" class="btn btn-secondary" value="Cancel">Cancelar</button>
                      </div>

                  </form>
                  <script src="../bootstrap/js/validacion.js"></script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>