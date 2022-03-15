<?php
  include_once('../plantilla/encabezadocompras.php');

?>
  <div class="container">
  <div class="mx-auto main-section" id="myTab" role="tablist">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
        
          <a class="nav-link active" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
            aria-selected="true"><strong>Realizar Compra</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
            aria-selected="false"><strong>Listado Compras</strong></a>
        </li>
        
       
      </ul>

      <div class="tab-content" id="myTabContent">
      <?php
         include("../controladores/controladorcompras.php");
        if(isset($_POST['idproducto'])){
        
       $idproducto=$_POST['idproducto']; 

        $prove= new ControladorCompras;
        $proveedor=$prove->getcargardatos($idproducto); 

        }
        
      ?>
        <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
          <div class="card">
            <div class="card-header">
              <h4>Realizar compra</h4>
            </div>
            <div class="card-body">
              <form class="form needs-validation" id="form1"   method="post" role="form" autocomplete="off" novalidate>
                <div method="post" class="form-group row">
                 <label class="col-lg-3 col-form-label form-control-label">Producto: </label>       
                    <div class="col-lg-9">  
                      <div class="input-group">                  
                        <select  onChange="submit()"  style="width:80%"   method="post" class="custom-select" id="idproducto" name="idproducto" required>
                         <?php     
                         $Compra= new ControladorCompras;
                           $datos=$Compra->Listarproductos(); 
                         for ($i = 0; $i < count($datos); $i++) {
                        ?>
                       <option value=<?php echo $datos[$i]["id_producto"] ?>><?php echo $datos[$i]["producto"]; } ?></option>
                       <?php 
                        for ($i = 0; $i < count($datos); $i++) { 
                            if( $datos[$i]["id_producto"]==$idproducto){
                                   
                                $datoscarga[0]["producto"]=$datos[$i]["producto"];
                                $datoscarga[0]["nom_prov"]= $proveedor[0]["nom_prov"];
                                $datoscarga[0]["correo_prov"]= $proveedor[0]["correo_prov"];
                                $datoscarga[0]["stock"]= $proveedor[0]["stock"];
                                $datoscarga[0]["costo_producto"]= $proveedor[0]["costo_producto"];
                                $datoscarga[0]["id_prov"]=$proveedor[0]["id_prov"];
                                $datoscarga[0]["idproducto"]=$idproducto;

                                $fcha = date("Y-m-d");
                                 }
                                 else if($idproducto==null){
                                  $datoscarga[0]["producto"]="Seleccione un producto";
                                  $datoscarga[0]["nom_prov"]="";
                                  $datoscarga[0]["correo_prov"]="";
                                  $datoscarga[0]["ISV"]= "";
                                  $datoscarga[0]["stock"]= "";
                                  $datoscarga[0]["costo_producto"]=""; 
                                  $datoscarga[0]["id_prov"]="";
                                  $datoscarga[0]["idproducto"]="";
                                 }
                            }
                            ?>
                       <option selected disabled value=" "><?php echo $datoscarga[0]["producto"]; ?></option>
                       </select>
                       <div class="input-group">
                        <button class="btn btn-secondary" >Agregar producto</button>
                        <input  class="  form-control"  readonly  id="inputidprove" type="hidden" name="inputidprove" value="<?php echo  $datoscarga[0]["idproducto"]?> "> 
                        </div> 
                        </div> 
                   </div>      
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Proveedor: </label>
                  <div class="col-lg-9">

                     <div class="input-group">
                         <input  class="  form-control" readonly  style="width:95%"   id="InputProvee" name="InputProvee" value="<?php echo  $datoscarga[0]["nom_prov"]?> "> 
                        <input  class="  form-control"  readonly  id="InputIDPROV" name="InputIDPROV" value="<?php echo  $datoscarga[0]["id_prov"]?> "> 
                    </div>  
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Email del proveedor:</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="email" required disabled placeholder="<?php echo  $datoscarga[0]["correo_prov"]?>">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>          
                <div class="form-group row">
                     <label class="col-lg-3 col-form-label form-control-label">Fecha de Compra:</label>
                         <div class="col-lg-9">
                        <input class="form-control" type="date" id="fechacompra"   name="fechacompra" disabled required value="<?php echo $fcha;?>" >
                       <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                       </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Stock: </label>
                       <div class="col-lg-9">
                         <input class="form-control" type="text" required  readonly  id="Inputstock" name="Inputstock" value="<?php echo   $datoscarga[0]['stock']?>">
                    </div>
                </div>
                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Cantidad a comprar:</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" id="Inputcantidad"name="Inputcantidad"  onchange="cargar()" type="number" min="1">
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
                      <label class="col-lg-3 col-form-label form-control-label">Precio</label>   
                       <div class="col-lg-9">
                       <input class="form-control" type="text" required   readonly id="InputPrecio" name="InputPrecio" value="<?php echo $datoscarga[0]["costo_producto"]?>">
                    </div>
                </div>
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label  form-control-label" > Subtotal</label>
                  <div class="col-lg-9">
                    <input class="form-control" id="Inputsubtotal" type="text" srequired disabled>               
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"> Descuento</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="InputDescuent" name="InputDescuent" style="width:100%"  value="0" onchange="cargar()" required >
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                    
                  </div>                              
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">ISV: </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="InputISV" name="InputISV" style="width:100%"  onchange="cargar()" value="0" required >
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"> Total</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="Inputmonto" required disabled>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <?php
                if(isset($_REQUEST['enviar'])) {                                      
                                          $id_empleado= 29;                
                                          $isv = $_REQUEST['InputISV'];
                                          $descuento = $_REQUEST["InputDescuent"];
                                          $id_prov = $_REQUEST["InputIDPROV"];                                      
                                          $id_producto= $_REQUEST["inputidprove"];                                 
                                          $precio=$_REQUEST["InputPrecio"];
                                          $cantidad=$_REQUEST["Inputcantidad"];
                                          $dates=$Compra->Guardar($id_prov,$id_empleado , $isv, $descuento,$id_producto,$precio,$cantidad);   
                                }    
               ?>
                <div class="form-group row">
                  <div class="col-lg-12 text-center">
               <button class="btn btn-primary" method="post"  id="enviar"  name="enviar">Enviar</button></a>
                    <button type="reset" class="btn btn-secondary" value="Cancel">Cancelar</button>
                  </div>
                </div>              
              </form>
              <script src="../bootstrap/js/compras.js"></script>
            </div>
          </div>
        </div>       
      <div class="tab-pane fade " id="list" role="tabpanel" aria-labelledby="list-tab">
      <div class="card">
            <div class="card-header">
              <h4>Listado de Compras</h4>
               </div>
               <div class="card-body">
              <div class="table-responsive">
                <table id="userList" class="table table-bordered table-hover table-striped">
                  <thead class="thead-light">
                    <tr>  
                      <th scope="col">ID</th>                 
                      <th scope="col">producto</th>
                      <th scope="col">Empleado</th>
                      <th scope="col">Proveedor</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">cantidad</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php            
                    $Compras1= new ControladorCompras;
                    $listarCompras=$Compras1->Listar(); 
                    for ($i = 0; $i < count($listarCompras); $i++) {
                ?>
                 <tr>
                <th scope="row">
                <?php echo $listarCompras[$i]["id_compra"];?></th>
                <td><?php echo $listarCompras[$i]["descripcion_producto"];?></th>
                <td><?php echo $listarCompras[$i]["Empleado"];?></td>
                <td><?php echo $listarCompras[$i]["nom_prov"];?></td>
                <td><?php echo $listarCompras[$i]["fecha_compra"];?></td>
                <td><?php echo $listarCompras[$i]["cantidad"];?></td>
                <td><?php echo $listarCompras[$i]["precio"];?></td>
                <td><?php echo $listarCompras[$i]["Total"];?></td>
                <td>
                      <a href="./comprasactualizar.php?idactualizar=<?php echo $listarCompras[$i]["id_compra"]?>"><i class="fas fa-edit"></i></a> |
                       <a href="../controladores/controladorcompras.php?idcompra=<?php echo $listarCompras[$i]["id_compra"]?>"><i id="btneliminar" class="fas fa-trash"></i></a>
                      </td>
                </tr>               
                <?php } ?>
                <?php
                if(isset($_REQUEST['btneliminar'])) {             
                }?>

                  </tbody>
                </table>
              </div>
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
          Si cierra sesi&oacute;n podr&iacute;a perder los datos de compra.¿Desea continuar?
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