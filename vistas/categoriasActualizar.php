<?php
 include_once('../controladores/controladorCategorias.php');
 include_once('../plantilla/encabezadoCategorias.php');
 
 if(isset($_GET['id'])){
  $idCat = $_GET['id'];
  foreach (listarUno($idCat) as $row){
      $id = $row[0];
      $descripcion_categoria = $row[1];
      $estado = $row[2];
  }    
} 
?>

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

                <form class="form needs-validation" id="form1" action="../controladores/controladorCategorias.php?id=<?php echo $_GET['id']?>" method="POST" role="form" autocomplete="off" novalidate>               
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
                        <input class="form-control" type="text" value="<?php echo $descripcion_categoria?>" name="descripcion" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                  
                    <!-- Estado-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Estado: </label>
                      <div class="col-lg-9 pt-2">
                        <select class="custom-select" selected value="<?php echo $estado?>" name="estado" required>
                          <option disabled>Seleccione</option>
                            <option name="estado" value="1">Activo</option>
                            <option name="estado" value="0" >Inactivo</option>
                        </select>
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