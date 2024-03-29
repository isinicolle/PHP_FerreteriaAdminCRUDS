<!DOCTYPE html>
<html lang="en">
<?php 
include_once('../controladores/controladorEnvios.php')
?>
<head>
  <title>Formulario de empleados</title>
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
   <body>
   <?php
     include_once('../plantilla/encabezadoVistas.php');
   ?>
<div class="container">
    <div class="mx-auto main-section" id="myTab" role="tablist">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
            aria-selected="false"><strong>Tabla</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
            aria-selected="true"><strong>Formulario</strong></a>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
          <div class="card">
            <div class="card-header">
              <h4>Lista envíos</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="userList" class="table table-bordered table-hover table-striped">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Numero de rastreo</th>
                      <th scope="col">Referencia de venta</th>
                      <th scope="col">Empresa de envío</th>
                      <th scope="col">Cliente</th>
              
                      <th scope="col">Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                     foreach(listar() as $row){?>
                      <td><?php echo $row[0]?></td>
                      <td><?php echo $row[1]?></td>
                      <td><?php echo $row[2]?></td>
                      <td><?php echo $row[3]?></td>
                      <td><?php echo $row[4]?></td>
                      <td><a href="../vistas/frmEnvios.php?id=<?php echo $row[0]?>">Editar</a></td>
                      <td><a href="../controladores/controladorEnvios.php?idEnvioE=<?php echo $row[0]?>">Eliminar</a></td>
                  </tbody>
                  <?php
                            }
                           ?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
          <div class="card">
            <div class="card-header">
              <h4>Ingreso de envío</h4>
            </div>
            <div class="card-body">
              <form class="form needs-validation"  method="post" action="../controladores/controladorEnvios.php" role="form" autocomplete="off" novalidate>
              <input type="hidden" name="Insertar"  hidden/>  
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Numero de rastreo</label>
                  <div class="col-lg-9">
                    <input class="form-control" name="numRastreo" type="text" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Referencia de Venta</label>
                  <div class="col-lg-9">
                    <input class="form-control" name="idVenta" type="text" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Empresa de envío</label>
                  <div class="col-lg-9">
                  <select class="custom-select custom-select-lg mb-3" name="idEmpresa" required>
                    <?php foreach(getEmpresaEnvios() as $fila){ ?>
                      <option selected disabled value="">Seleccione una opción</option>
                      <option value=<?php echo $fila[0] ?> ><?php echo $fila[1]; } ?></option>
                    </select>
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

<?php
include_once('../plantilla/pie.php');
?>
</body>