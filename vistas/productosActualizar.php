<?php
 include_once('../controladores/controladorProductos.php');
 include_once('../plantilla/encabezadoProductos.php');

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
                        <input class="form-control" type="text" value="<?php echo $descripcion_producto?>" name="descripcion" required>
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
                        <select class="custom-select" name="estado" selected value="<?php echo $estado?>" required>
                          <option disabled value="">Seleccione</option>
                          <option name="estado" value="1">Activo</option>
                          <option name="estado" value="0">Inactivo</option>
                        </select>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
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