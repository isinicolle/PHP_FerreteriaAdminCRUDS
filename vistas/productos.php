<?php
  include_once('../controladores/controladorProductos.php');
  include_once('../plantilla/encabezadoProductos.php');
?>

    <!--Pesta;as de la tabla-->
	<div class="container-lg">
        <div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><strong>Listado Productos</strong></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true"><strong>Ingreso de Productos</strong></a>				   	
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                    <!--Cartas Tabla-->
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><strong>Listado Productos</strong></h4>
                        </div>
                        <div class="card-body">
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table id="userList" class="table table-bordered table-hover table-striped text-center">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Proveedor</th>
                                        <th scope="col">C/U</th>
                                        <th scope="col">Costo</th>
                                        <th scope="col">Precio Actual</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Descuento</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $datos= listarProducto();
                                        for($i=0;$i < sizeof($datos);$i++){?>
                                        <tr class="text-center">
                                            <td><?php echo $datos[$i]["id_producto"] ?></td>
                                            <td><?php echo $datos[$i]["descripcion_producto"] ?></td>
                                            <td><?php echo $datos[$i]["descripcion_marca"] ?></td>
                                            <td><?php echo $datos[$i]["descripcion_categoria"] ?></td>
                                            <td><?php echo $datos[$i]["nom_prov"] ?></td>
                                            <td><?php echo $datos[$i]["cantidad_por_unidad"] ?></td>
                                            <td><?php echo $datos[$i]["costo_producto"] ?></td>
                                            <td><?php echo $datos[$i]["precio_actual"] ?></td>
                                            <td><?php echo $datos[$i]["stock"] ?></td>
                                            <td><?php echo $datos[$i]["descuento"] ?></td>
                                            <td><?php echo $datos[$i]["estado"] ?></td>
                                            
                                            <td class="text-center">
                                            <a href="./productosActualizar.php?id=<?php echo $datos[$i]['id_producto']?>"><i class="fas fa-edit"></i></a>  | 
                                            <a href="../controladores/controladorProductos.php?id_producto=<?php echo $datos[$i]['id_producto']?>"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <!--Fin cartas tabla-->
                    </div>
                </div>
                <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
                    <!--Cartas Formulario-->
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><strong>Ingreso de Productos</strong></h4>
                        </div>
                        <div class="card-body">
                            <!--Inicio Formulario-->
                            <form class="form needs-validation" action="../controladores/controladorProductos.php" method="POST" novalidate role="form" autocomplete="off" id="fromulario" >
                                <!-- Nombre-->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nombre Producto: </label>
                                    <div class="col-lg-9">
                                        <input id="nombre" class="form-control" name="descripcion" type="text"  maxlength="60" required>
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
                                </div>
                                <!-- Marca-->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Marca:</label>
                                    <div class="col-lg-9">
                                    <select class="custom-select custom-select-lg mb-3" name="marca" required>
                                    <option selected disabled value="">Seleccione</option>
                                        <?php
                                        $datosMarcas = listarMar();
                                        for($marca = 0; $marca < sizeof($datosMarcas); $marca++){
                                        ?>
                                            <option value="<?php echo $datosMarcas[$marca]['id_marca'] ?>"><?php echo $datosMarcas[$marca]['descripcion_marca'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
                                </div>
                                <!-- Categoria-->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Categoria:</label>
                                    <div class="col-lg-9">
                                    <select class="custom-select custom-select-lg mb-3" name="categoria" required>
                                        <option selected disabled value="">Seleccione</option>
                                        <?php
                                        $datosCategoria = listarCat();
                                        for($categoria = 0; $categoria < sizeof($datosCategoria); $categoria++){
                                        ?>
                                            <option value="<?php echo $datosCategoria[$categoria]['id_categoria'] ?>"><?php echo $datosCategoria[$categoria]['descripcion_categoria'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
                                </div>
                                <!-- Proveedor-->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Proveedor:</label>
                                    <div class="col-lg-9">
                                    <select class="custom-select custom-select-lg mb-3" name="proveedor" required>
                                        <option selected disabled value="">Seleccione</option>
                                        <?php
                                        $datosProveedor = listarProv();
                                        for($proveedor = 0; $proveedor < sizeof($datosProveedor); $proveedor++){
                                        ?>
                                            <option value="<?php echo $datosProveedor[$proveedor]['id_prov'] ?>"><?php echo $datosProveedor[$proveedor]['nom_prov'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
                                </div>
                                <!-- C/U-->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Cantidad por Unidad: </label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="CU" required>
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
                                </div>
                                <!-- Costo-->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Costo:</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number" name="costo" step="any" min="0" required>
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
                                </div>
                                <!-- Precio Actual-->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Precio Actual: </label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="precio" type="number" step="any" min="0" required>
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
                                </div>
                                <!-- Stock-->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Stock: </label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="stock" type="number" min="0" required>
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
                                </div>
                                <!-- Descuento-->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Descuento: </label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="descuento" type="number" step="any" min="0" required>
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
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
                                <!-- URL IMAGEN-->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">URL Imagen: </label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="imagen" required>
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-12 text-center">
                                        <br><br>
                                        <button type="submit" id="guardar" name="guardar" class="btn btn-primary">Guardar</button>
                                        <button type="reset" class="btn btn-secondary" value="Cancel">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                            <!--Fin Formulario-->
                        </div>   
                    <!--Fin cartas formulario-->
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