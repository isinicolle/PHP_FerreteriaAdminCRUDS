<?php
include_once('../controladores/controladorVentas.php')
?>
<!DOCTYPE html>
<html lang="en">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


    <!-- DATA TABLE-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <script type="text/javascript">
        $(document).ready(function() {
            //Asegurate que el id que le diste a la tabla sea igual al texto despues del simbolo #
            $('#userList').DataTable();
        });
    </script>

<body>
    <?php
    include_once('../plantilla/encabezadoVistas.php');
    ?>
    <div class="container">
  <div class="mx-auto main-section" id="myTab" role="tablist">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
        
          <a class="nav-link active" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
            aria-selected="true"><strong>Realizar venta</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
            aria-selected="false"><strong>Listado Ventas</strong></a>
        </li>
        
       
      </ul>

      <div class="tab-content" id="myTabContent">
      <?php
        include("../controladores/controladorcompras.php");
        if(isset($_POST['idproducto'])){

        $idproducto=$_POST['idproducto']; 
        $prove= new ControladorVentas;
        $proveedor=$prove->getcargardatos($idproducto); 

        }
        
      ?>
        <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
          <div class="card">
            <div class="card-header">
              <h4>Realizar Venta</h4>
            </div>
            <div class="card-body">
              <form class="form needs-validation" id="form1"   method="post" role="form" autocomplete="off" novalidate>
                
                <div method="post" class="form-group row">
                 <label class="col-lg-3 col-form-label form-control-label">Producto: </label>       
                    <div class="col-lg-9">  
                      <div class="input-group">                  
                        <select  onChange="submit()"  style="width:80%"   method="post" class="custom-select" id="idproducto" name="idproducto" required>
                         <?php     
                         $Compra= new ControladorVentas;
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
                     <label class="col-lg-3 col-form-label form-control-label">Fecha de Venta:</label>
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
                  <label class="col-lg-3 col-form-label form-control-label"> Id del cliente</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text"  name="idCliente" style="width:100%"  required >
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
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
                                  document.getElementById('Inputmonto').value=document.getElementById('Inputsubtotal').value                        
                                 }
                                 function descuento()
                                {
                                  document.getElementById('Inputporcentajedescue').value=((document.getElementById('InputDescuent').value /100)*document.getElementById('Inputsubtotal').value)
                                  document.getElementById('Inputmonto').value=document.getElementById('Inputsubtotal').value-document.getElementById('Inputporcentajedescue').value + document.getElementById('InputporISV').value
                                }
                                function ISV()
                                {
                                  document.getElementById('InputporISV').value=((document.getElementById('InputISV').value /100)*document.getElementById('Inputsubtotal').value)
                                  document.getElementById('Inputmonto').value=parseFloat(document.getElementById('Inputsubtotal').value)+parseFloat(document.getElementById('InputporISV').value) - document.getElementById('Inputporcentajedescue').value
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
                    <input class="form-control" type="text" id="InputDescuent" name="InputDescuent" style="width:100%"  value="0" onchange="descuento()" required >
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                    <input class="form-control" type="text" id="Inputporcentajedescue" value="0"  disabled required >
                  </div>                              
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">ISV: </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="InputISV" name="InputISV" style="width:100%"  onchange="ISV()" value="0" required >
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                    <input class="form-control" type="text" id="InputporISV" value="0"  disabled required >
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
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Rtn?</label>
                  <div class="col-lg-9">
                    <div class="form-check form-check-inline">
                      <input value="" name="rtn" id="rtn" class="form-check-input" type="checkbox" id="inlineCheckbox1"/>

                    </div>
                  </div>
                </div>
                <?php
                if(isset($_REQUEST['enviar'])) {                                      
                                    $Ventas= new ControladorVentas();                
                                    $isv = $_REQUEST['InputISV'];
                                    $descuento = $_REQUEST["InputDescuent"];
                                    $idCliente = $_REQUEST["idCliente"];                                      
                                    $id_producto= $_REQUEST["inputidprove"];
                                    $RtnEstado = ($_REQUEST["rtn"]? '1':'0');                                 
                                    $precio=$_REQUEST["InputPrecio"];
                                    $cantidad=$_REQUEST["Inputcantidad"];
                                    $idDireccion=2;
                                    $dates=$Ventas->Guardar($idCliente,$RtnEstado,$isv , $idDireccion, $descuento,$id_producto,$precio,$cantidad);   
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
                      <th scope="col">Cliente</th>
                      <th scope="col">DNI Cliente</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">cantidad</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php            
                    $Ventas= new ControladorVentas;
                    $listarCompras=$Ventas->Listar(); 
                    for ($i = 0; $i < count($listarCompras); $i++) {
                ?>
                 <tr>
                <th scope="row">
                <?php echo $listarCompras[$i]["id_Venta"];?></th>
                <td><?php echo $listarCompras[$i]["descripcion_producto"];?></th>
                <td><?php echo $listarCompras[$i]["Cliente"];?></td>
                <td><?php echo $listarCompras[$i]["DNI_Cliente"];?></td>
                <td><?php echo $listarCompras[$i]["fecha"];?></td>
                <td><?php echo $listarCompras[$i]["cantidad"];?></td>
                <td><?php echo $listarCompras[$i]["precio"];?></td>
                <td><?php echo $listarCompras[$i]["Subtotal"];?></td>
                <td>
                      <a href="./frmVentaEdit.php?idVentaE=<?php echo $listarCompras[$i]["id_Venta"]?>"> <i class="fas fa-edit"></i></a> |
                       <a href="../controladores/controladorVentas.php?idVenta=<?php echo $listarCompras[$i]["id_Venta"]?>"><i id="btneliminar" class="fas fa-trash"></i></a>
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
                    Si cierra sesi&oacute;n podr&iacute;a perder los datos en los que estaba trabajando.¿Desea continuar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary"> <a style="text-decoration: none;color: #fff;" href="./login.html">Cerrar sesión </a></button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once('../plantilla/pie.php');
    ?>
</body>