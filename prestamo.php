<?php
////////////INICIO DEL HTML CON EL NAVBAR//////////////////
require('librerias/motor.php');


echo start();

$usx = nuevos();
$editar = "";
$borrar = "";
$id = "";
$monto = "";
$tiempo = "";
$id_usuariot = "";
$guardar = "";
$modi = "";
$cuota = "";

if (isset($_POST['guardar'])) $guardar = $_POST['guardar'];
if (isset($_POST['modi'])) $modi = $_POST['modi'];
if (isset($_POST['borra'])) $borrar = $_POST['borra'];
if (isset($_POST['edita'])) $editar = $_POST['edita'];
if (isset($_POST['edita'])) $id = $_POST['edita'];

if (isset($_POST['guardar'])) {
  $e = new stdClass();
  //nombreEm, rnc, color, comentarios, aportacion

  /*cedula'
Nombre'
donacio*/
  $e->monto = $_POST['monto'];
  $e->id = $_POST['idP'];
  $e->tiempo = $_POST['tiempo'];
  $e->cuota = $_POST['cuota'];
  $e->id_usuario = $_POST['id_usuario'];
  

  guarda($e);
}
if (isset($_POST['borra'])) {
  $idi = $_POST['borra'];
  borrar3($idi);
}

if ($editar) {

  $usx = edita($id);
 
}
if(isset($_POST['modi'])){
  $id = $_POST['idP'];
  $name = $_POST['monto'];
  

  $sql = "UPDATE prestamo set monto='$name'
  where idP=$id";
   conexion::consulta($sql);
}


?>

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

<link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet">
<script type="text/javascript">
    (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
          _input = e.target;
          var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
          Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
              Arr.forEach.call(tbody.rows, _filter);
            });
          });
        }

        function _filter(row) {
          var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
          row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Arr.forEach.call(inputs, function(input) {
              input.oninput = _onInputEvent;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          LightTableFilter.init();
        }
      });

    })(document);
    </script>
<section class="hero-wrap js-fullheight img" style="background-image: url(images/admin.png);" >
  
  <div class="container" style="margin-left: 20%;">

  

    <div class="overlay">
      <div class="sidebar" data-color="danger" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">

     
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo"><a href="admin.php" class="simple-text logo-normal">
            Administrador
          </a></div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item active" >
              <a class="nav-link" href="admin.php">
                <i class="material-icons">dashboard</i>
                <p>Módulo Clientes</p>
              </a>
            </li>

          
          
            
            <li class="nav-item active-pro ">
              <a class="nav-link" href="salir.php">
                <i class="material-icons">unarchive</i>
                <p>Salir</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <br>

   <!--  *********************************************************************************  -->    
   <br>
 
   <form action="" method="post">


   <div class="col-sm-8">
            <div class="modal-content">
                <form  method="post" action="" class="col-12">
                    <div class="row">
                        <input type="hidden" name="idP" value="<?= $id; ?>">
                        <input type="hidden" name="monto" value="<?= $nombre; ?>">
                        <input type="hidden" name="tiempo" value="<?= $telefono; ?>">
                        <input type="hidden" name="cuota" value="<?= $cuota; ?>">
                        <input type="hidden" name="id_usuario" value="<?= $cuenta; ?>">

                        <div class="col-sm-10">
                            <br>
                            <?php
                            ?>
                            <div style="margin-bottom:5px">
                                <?= input('monto', 'Monto del prestamo', $usx->nombre); ?>
                            </div>
                            <div style="margin-bottom:5px">
                                <?= input('tiempo', 'Duracion del prestamo', $usx->telefono); ?>
                            </div>
                            <div style="margin-bottom:5px">
                                <?= input('cuota', 'Cuota del prestamo', $usx->cuota); ?>
                            </div>
                            <div style="margin-bottom:5px">
                                <?= input('id_usuario', 'Usuario que pertenece al ID registrado', $usx->cuenta) ?>
                            </div>
                            
                            <div class="form-1-2">
                             
                             <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar.."
                             style="border: 1px solid #fe0000;
   height: 500px;
   width: 800px;
   border-radius: 10px;
   padding: 0px 10px;">


</div>
                            <div>
                                  
                                <button style="width:120px; margin:5px;" class="btn btn-warning" type="submit" name="modi" id="modi">Modificar</button>

                                <button style="width:120px; margin:5px;" class="btn btn-success" type="submit" name="guardar" id="guardar">Agregar</button>

                            </div>
                            <?php  ?>
                        </div>



                        <div class="col-sm-10">
                        <div class="table-responsive">
                        <div class="table table-bordered table-hover table-striped">
                            <table id="userList" class="order-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID Prestamo</th>
                                        <th scope="col">Monto del prestamo</th>
                                        <th scope="col">Duracion del prestamo</th>
                                        <th scope="col">Cuota del prestamo</th>
                                        <th scope="col">ID Usuario</th>
                                        
                                       
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
    $us = saca();
    foreach ($us as $mostrar) { ?>
    <tr>
    <th scope="row"><?php echo $mostrar['idP'] ?></th>
    <td><?php echo $mostrar['monto'] ?></td>
    <td><?php echo $mostrar['tiempo'] ?></td>
    <td><?php echo $mostrar['cuota'] ?></td>
    <td><?php echo $mostrar['id_usuario'] ?></td>

                            

    <td>
    <button type="submit" name="borra" id="borra" value="<?php echo $mostrar['idP'] ?>" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
              <i class="material-icons">close</i>
            </button>

            <button type="submit" name="edita" id="edita" value="<?php echo $mostrar['idP'] ?>" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
              <i class="material-icons">done</i>
            </button>

                                            </td>  
                                            
              
            
        </div>
     
      </div>
      </div>
    </div>
      
    <?php }  ?>
    </tbody>

</table>

</div>

   
    </form>
</section>





<?= /* fin del html */ finaly(); ?>

