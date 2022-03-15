<?php
  include_once('../plantilla/encabezadocompras.php');
  include("../controladores/controladorcompras.php");
  
  
  if(isset($_GET['idactualizar'])){
    $idactualizar = $_GET['idactualizar'];
    $datoscarga= new ControladorCompras;
    $datecarga=$datoscarga->getcargardatosactualizar($idactualizar);
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
                <h4>Actualizar Compra</h4>
              </div>
              <div class="card-body">

                <form class="form needs-validation" id="form1" action="../controladores/controladorcompras.php?id=<?php echo $_GET['idactualizar']?>" method="POST" role="form" autocomplete="off" novalidate>               
   
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Producto</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo  $datecarga[0]["descripcion_producto"]?>" name="id" readonly required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
               
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Proveedor</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo  $datecarga[0]["nom_prov"]?>" id="InputProveedor" readonly name="InputProveedor" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

             
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Compra realizada por</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo  $datecarga[0]["Empleado"]?>" id="InputEmpleado" readonly name="InputEmpleado" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

       
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Fecha de compra</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text"value="<?php echo   $datecarga[0]["fecha_compra"] ?>" id="Inputfechacompr"  readonly name="Inputfechacompr" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>


                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Precio</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $datecarga[0]["precio"]?>" id="InputPrecio" readonly  name="InputPrecio" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

                    <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Cantidad a comprar:</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" id="Inputcantidad"name="Inputcantidad" value="<?php echo $datecarga[0]["cantidad"]?>" onchange="cargar()" type="number" min="1">
                                        <div class="valid-feedback">Correcto</div>
                                        <div class="invalid-feedback">Ingrese datos correctos</div>
                                    </div>
                                </div>
                                <script type="text/javascript">  
                            function cargar()
                                {
                                  document.getElementById('Inputsubtotal').value=document.getElementById('Inputcantidad').value * document.getElementById('InputPrecio').value;  
                                  document.getElementById('Inputmonto').value=document.getElementById('Inputsubtotal').value-((document.getElementById('InputDescuent').value /100)*document.getElementById('Inputsubtotal').value)+((document.getElementById('InputISV').value /100)*document.getElementById('Inputsubtotal').value)                      
                                 }
                                
                           </script>
                        

                     <div class="form-group row">
                  <label class="col-lg-3 col-form-label  form-control-label" > Subtotal</label>
                  <div class="col-lg-9">
                    <input class="form-control" id="Inputsubtotal" type="text"  value="<?php echo $datecarga[0]["subTotal"]?>" srequired readonly>               
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"> Descuento</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="InputDescuent" name="InputDescuent" style="width:100%" value="<?php echo $datecarga[0]["descuento"]?>"  onchange="cargar()" required >
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                   
                  </div>                              
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">ISV: </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="InputISV" name="InputISV" value="<?php echo $datecarga[0]["isv"]?>"  style="width:100%"  onchange="cargar()"  required >
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                   
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"> Total</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="Inputmonto" value="<?php echo $datecarga[0]["total"]?>"  required readonly>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                   



                    <div class="form-group row">
                      <div class="col-lg-12 text-center">
                        <input type='submit' class="btn btn-primary" name="updatecompra" value="Guardar Cambios">
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