<?php
////////////INICIO DEL HTML CON EL NAVBAR//////////////////
require('librerias/motor.php');
session_start();
if (!empty($_SESSION['user_id'])) {
  header("Location: admin.php");
}


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

<section class="hero-wrap js-fullheight img" style="background-image: url(images/loginn.jpg);">

  <form action="" method="post" enctype="multipart/form-data">


      <div class="container">
        <div class="overlay"></div>

        <br><br><br>
        <br><br><br>
        <?php


if (isset($_POST['login'])) {

  $pase = Entrar($_POST['email']);
if ($pase->email == $_POST['email'] && $pase->pass == $_POST['password']) {
  header("Location: admin.php");
  
} else {
    echo '
            
    <div class="alert alert-danger" role="alert">
Tus datos han sido incorrectos debes de ser administrador para acceder.
</div>
    
    ';
  }
}
?>
      <div class="row justify-content-flex-end">
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="card card-login py-4">
              <form class="form-login" method="" action="">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Login</h4>

                  <div class="card-body p-4">
                  
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ion-ios-paper-plane"></i>
                        </span>
                      </div>
                      <input type="text" name="email" id="email" class="form-control" placeholder="Email...">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ion-ios-lock"></i>
                        </span>
                      </div>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña...">
                    </div>
                    <div class="container">
                      <div class="row justify-content-md-center">

                        <input type="submit" class="btn btn-light" name="login" id="login" value="Iniciar Sesion">


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
