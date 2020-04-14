<?php
////////////INICIO DEL HTML CON EL NAVBAR////////email, password//////////
require('librerias/motor.php');
$password;
echo start();



?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.html">Internet Banking</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav mr-auto">
        <li class="dropdown nav-item">
          <a href="#" class="dropdown-toggle nav-link icon d-flex align-items-center" data-toggle="dropdown">
            <i class="ion-ios-apps mr-2"></i>
            Notificaciones
            <b class="caret"></b>
          </a>
          <div class="dropdown-menu dropdown-menu-left">
          
          </div>
        </li>
        <li class="nav-item"><a href="salir.php" class="nav-link icon d-flex align-items-center"><i class="ion-ios-exit mr-2"></i>salir</a></li>
      </ul>
     
    </div>
  </div>
</nav>

<section class="hero-wrap js-fullheight img" style="background-image: url(images/admin.png);">

  <form action="" method="post" enctype="multipart/form-data">


      <div class="container">
        <div class="overlay"></div>

        <br><br><br>
        <br><br><br>
        <?php
//error_reporting (E_ALL ^ E_NOTICE);
        if (isset($_POST['registro'])) {
         
          if ($_POST['Ncuenta']){
            $r = new stdClass();


            $r->nombre = $_POST['nombre'];
            $r->telefono = $_POST['Ntelefono'];
            $r->cuenta = $_POST['Ncuenta'];

            registro($r);

            echo '
            
            <div class="alert alert-success" role="alert">
  Genial, ya puedes ir al modulo de <a href="admin.php" class="alert-link">administrador</a>, Has registrado al cliente.
</div>
            
            ';
          } else {
            echo alert('No puede', ' registrar al cliente.', 'danger');
          }
        }

        ?>
        <div class="row justify-content-flex-end" >
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="card card-login py-4">
              <form class="form-login" method="" action="">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Registrar cliente</h4>

                  <div class="card-body p-4">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ion-ios-contact"></i>
                        </span>
                      </div>
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Primer Nombre..." required>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="ion-ios-contact"></i>
                        </span>
                      </div>
                      <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Primer Apellido... " required>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ion-ios-paper plane"></i>
                        </span>

                      </div>
                      <input type="text" name="Ntelefono" id="Ntelefono" class="form-control" placeholder="Numero de Telefono..." required>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ion-ios-paper-plane"></i>
                        </span>
                      </div>
                      <input type="text" name="Ncuenta" id="Ncuenta" class="form-control" required placeholder=" Numero de Cuenta...">
                    </div>

                 
                    <div class="container">
                      <div class="row justify-content-md-center">

                        <input type="submit" class="btn btn-light" name="registro" id="registro" value="Registrar cliente">
                         
                      


                      </div>
                    </div>

                  </div>
                </div>
            </div>
          </div>
        </div>
  </form>
  </section>



  <?= /* fin del html */ finaly(); ?>
