<?php
  include_once('../controladores/controladorCategorias.php');
  include_once('../plantilla/encabezadoCategorias.php');
?>

  <div class="container">
    <div class="mx-auto main-section" id="myTab" role="tablist">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
            aria-selected="false"><strong>Listado Categorias</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
            aria-selected="true"><strong>Ingreso Categorias</strong></a>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
          <div class="card">
            <div class="card-header text-center">
              <h4>Listado de Categorias</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="userList" class="table table-bordered table-hover table-striped">
                  <thead class="thead-light">
                    <tr class="text-center">
                      <th scope="col">Id</th>
                      <th scope="col">Descripcion</th>
                      <th scope="col">Estado Categoria</th>
                      <th scope="col">Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $datos= listarCategorias();
                    for($i=0;$i < sizeof($datos);$i++){?>
                      <tr class="text-center">
                        <td><?php echo $datos[$i]["id_categoria"] ?></td>
                        <td><?php echo $datos[$i]["descripcion_categoria"] ?></td>
                        <td><?php echo $datos[$i]["estado"] ?></td>
                        <td>
                         <a href="./categoriasActualizar.php?id=<?php echo $datos[$i]['id_categoria']?>"><i class="fas fa-edit"></i></a>  | 
                         <a href="../controladores/controladorCategorias.php?id_categoria=<?php echo $datos[$i]['id_categoria']?>"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
          <div class="card">
            <div class="card-header text-center">
              <h4>Ingreso de Categoria</h4>
            </div>
            <div class="card-body">
              <form class="form needs-validation"  action="../controladores/controladorcategorias.php"  method="POST" role="form" autocomplete="off" novalidate>
                  <!-- Descripcion-->
                  <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Descripcion de la Categoria: </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="descripcion" name="descripcion" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                  <!-- Estado-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Estado: </label>
                      <div class="col-lg-9 pt-2">
                        <select class="custom-select" name="estado" required>
                          <option selected disabled value="">Seleccione</option>
                          <option name="estado" value="1" >Activo</option>
                          <option name="estado" value="0" >Inactivo</option>
                        </select>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

                <div class="form-group row">
                  <div class="col-lg-12 text-center">
                    <button type="submit" id="guardar" name="guardar" class="btn btn-primary">Guardar</button>
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
</body>

</html>