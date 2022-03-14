<?php
  include_once('../plantilla/encabezadousuarioclientes.php');

?>
  <div class="container">
    <div class="mx-auto main-section" id="myTab" role="tablist">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
            aria-selected="false"><strong>Listado Usuarios de Clientes</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
            aria-selected="true"><strong>Ingreso Usuarios de Clientes</strong></a>
        </li>
       
      </ul>

     
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
          <div class="card">
            <div class="card-header">
              <h4>Listado de Usuario Cliente</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="userList" class="table table-bordered table-hover table-striped">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nombre de usuario</th>
                      <th scope="col">Contrasenia</th>
                      <th scope="col">Id cliente</th>
                      <th scope="col">correo electronico</th>
                      <th scope="col">estado</th>
                      <th scope="col">Accion</th>
                     
                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include("../controladores/controladorusuariocliente.php");
                    $cliente= new ControladorClientes;
                    $datos=$cliente->Listar();
                    for ($i = 0; $i < count($datos); $i++) {
                ?>
                 <tr>
                <th scope="row"><?php echo $datos[$i]["id_usuarioCliente"];?></th>
                <td><?php echo $datos[$i]["nombre_usuario"];?></td>
                <td><?php echo $datos[$i]["contraenia_usuario"];?></td>
                <td><?php echo $datos[$i]["id_cliente"];?></td>
                <td><?php echo $datos[$i]["correo_usuario"];?></td>
                <td><?php echo $datos[$i]["estado"];?></td>
                <td class="text-center">
                         <a href="./usuarioClientesActualizar.php?id=<?php echo $datos[$i]["id_usuarioCliente"]?>"><i class="fas fa-edit"></i></a>  | 
                         <a href="../controladores/controladorusuariocliente.php?id_usuarioCliente=<?php echo $datos[$i]["id_usuarioCliente"]?>"><i class="fas fa-trash"></i></a>
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
            <div class="card-header">
              <h4>Ingreso del Cliente</h4>
            </div>
            <div class="card-body">
              <form class="form needs-validation" id="form1" method="post" role="form" autocomplete="off" novalidate>
                
               
                
                
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Nombre de usuario</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" required id="InputNom" name="InputNom" placeholder="Escriba el Nombre de Usuario">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
               
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Contraseña</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="password" required id="InputApe" name="InputApe" placeholder="Escriba la clave">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Id cliente </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" required id="InputRTN" name="InputRTN" placeholder="Escriba el id cliente">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Correo electronico</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="email" required id="InputDireccion" name="InputDireccion"  placeholder="Escriba la direccion de correo">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">¿Usuario Activo?</label>
                  <div class="col-lg-9">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    </div>
                  </div>
                </div>
                    
                <?php
                    if (isset($_REQUEST['enviar'])) {
                      $correo = $_REQUEST['InputDireccion'];
                     
                      $idcliente = $_REQUEST['InputRTN'];
                      $clave = $_REQUEST['InputApe'];
                      $usuario = $_REQUEST['InputNom'];
                      

              
                      $datos=$cliente->Guardar($usuario, $clave, $idcliente,$correo);

                   // $direccioness= new ControladorDirecciones;
                   
                  }
                  
                      ?>
               
                <div class="form-group row">
                  <div class="col-lg-12 text-center">
                  <a href="./usuarioClientes.php" target="nombre" onclick="location.refresh()"> <button type="sumit" class="btn btn-primary"   name="enviar"  >Enviar</button></a>
                    <button type="reset" class="btn btn-secondary" value="Cancel">Cancelar</button>
                  </div>
                </div>
              </form>
              <script src="../bootstrap/js/cliente.js"></script>
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