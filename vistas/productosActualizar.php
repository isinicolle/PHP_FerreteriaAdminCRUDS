<?php
 include_once('../controladores/controladorProductos.php');

 if(isset($_GET['id'])){
  $idCat = $_GET['id'];
  foreach (listarUno($idCat) as $row){
        $id = $row[0];
        $descripcion_producto = $row[1];
        $id_marca =  $row[2];
        $id_categoria =  $row[3];
        $id_prov =  $row[4];
        $cantidad_por_unidad =  $row[5];
        $costo_producto =  $row[6];
        $precio_actual =  $row[7];
        $stock =  $row[8];
        $descuento =  $row[9];
        $estado = $row[10];
        $imagen =  $row[11];
  }    
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Actualizar Productos</title>
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
                <h4>Actualizar Categoria</h4>
              </div>
              <div class="card-body">

                <form class="form needs-validation" id="form1" action="../controladores/controladorProductos.php?id=<?php echo $_GET['id']?>" method="POST" role="form" autocomplete="off" novalidate>               
                  <!-- Id-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Id</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $id?>" name="id" disabled required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                  <!-- Descripcion-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Descripcion</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $descripcion_producto?>" id="descripcion" pattern="[a-zA-Z ]+" name="descripcion" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                    <!-- Marca-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Marca: </label>
                      <div class="col-lg-9">
                        <select class="custom-select custom-select-lg mb-3" name="marca" required>
                        <?php
                        $listarMarca = listarMar();
                        for($marca = 0; $marca < sizeof($listarMarca); $marca++){
                            if($listarMarca[$marca]['id_marca'] == null){
                        ?>
                                <option value="<?php echo $listarMarca[$marca]['id_marca']; ?>" selected><?php echo $listarMarca[$marca]['descripcion_marca']; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $listarMarca[$marca]['id_marca']; ?>"><?php echo $listarMarca[$marca]['descripcion_marca']; ?></option>
                        <?php
                                }
                            }
                        ?>
                        </select>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                  </div>
                  <!-- categoria-->
                 <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Categoria: </label>
                      <div class="col-lg-9">
                        <select class="custom-select custom-select-lg mb-3" name="categoria" required>
                        <?php
                        $listarCategoria = listarCat();

                        for($categoria = 0; $categoria < sizeof($listarCategoria); $categoria++){
                            if($listarCategoria[$categoria]['id_categoria'] == null){
                        ?>
                                <option value="<?php echo $listarCategoria[$categoria]['id_categoria']; ?>" selected><?php echo $listarCategoria[$categoria]['descripcion_categoria']; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $listarCategoria[$categoria]['id_categoria']; ?>"><?php echo $listarCategoria[$categoria]['descripcion_categoria']; ?></option>
                        <?php
                                }
                            }
                        ?>
                        </select>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                  </div>
                    <!-- proveedor-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">proveedor: </label>
                      <div class="col-lg-9">
                        <select class="custom-select custom-select-lg mb-3" name="proveedor" required>
                        <?php
                        $listarProveedor = listarProv();
                        for($proveedor = 0; $proveedor < sizeof($listarProveedor); $proveedor++){
                            if($listarProveedor[$proveedor]['id_prov'] == null){
                        ?>
                                <option value="<?php echo $listarProveedor[$proveedor]['id_prov']; ?>" selected><?php echo $listarProveedor[$proveedor]['nom_prov']; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $listarProveedor[$proveedor]['id_prov']; ?>"><?php echo $listarProveedor[$proveedor]['nom_prov']; ?></option>
                        <?php
                                }
                            }
                        ?>
                        </select>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                  </div>
                    <!-- CU-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Cantidad por Unidad:</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $cantidad_por_unidad?>" name="CU" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                    <!-- Costo-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Costo:</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $costo_producto?>" name="costo" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                    <!-- Precio-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Precio:</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $precio_actual?>" name="precio" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                    <!-- Stock-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Stock:</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $stock?>" name="stock" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                    <!-- Descuento-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Descuento:</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $descuento?>" name="descuento" required>
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
                    <!-- Imagen-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">URL Imagen:</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $imagen?>" name="imagen" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
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