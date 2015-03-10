<?php session_start();

  require "sql/Conexion.php";
  require "sql/Lista.php";

if($_SESSION['login']==true){
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Examen UF3 - Eric Rodriguez Carmona</title><meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/maruti-style.css" />
<link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
</head>
<body>

<!--Header-part-->
<div id="header">
<h2 style="color:white">Examen UF3 - Eric Rodriguez Carmona</h2>
</div>
<!--close-Header-part--> 

<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class="" ><a title="" href="#"><i class="icon icon-user"></i> <span class="text">

<?php

    echo "Bienvenido ".$_SESSION['nombre']. " (".$_SESSION['idusuario'].") ";
    switch($_SESSION['nivel_usuario']){
      case 1:
        echo "[GUEST]";
      break;
      case 2:
        echo "[USER]";
      break;
      case 3:
        echo "[ADMIN]";
      break;
    }

?>

    </span></a></li>
    <li class=""><a title="" href="desconectar.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->

<div id="content">
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
          <li> <a href="insertar.php"> <i class="icon-user"></i> Crear usuario </a> </li>
          <li> <a href="lista.php"> <i class="icon-search"></i> Listar usuarios</a> </li>
        </ul>
  </div>
  <div class="container-fluid">
    <div class="row-fluid" style="margin-top:0px !important">
      <div class="span12"> 
        <div class="row-fluid" style="margin-top:0px !important">

        <div class="widget-box">
          <div class="widget-title">
            <h5>Lista de usuarios</h5>
          </div>
          <div class="widget-content nopadding">
          <?php if($_SESSION['nivel_usuario']==3){?>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Contraseña</th>
                  <th>Rol</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  $model = new Lista();
                  $model->mostrar();
                ?>
                
              </tbody>
            </table>
            <?php }else{ ?>

            <div class="alert alert-danger">
              <button class="close" data-dismiss="alert">×</button>
              <h4 class="alert-heading">¡Alerta!</h4> No deberías estar aquí.
            </div>
            <?php } ?>
            
          </div>
        </div>
        <a class="btn btn-primary" href="panel.php">Volver al panel</a>

        </div> 
      </div>
    </div>
  </div>
</div>
<div class="row-fluid">
      <div id="footer" class="span12"> 2015 &copy; Eric Rodriguez Carmona - 2º DAW</div>
    </div>
<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/maruti.js"></script> 
<script src="js/maruti.dashboard.js"></script> 

</body>

</html>
<?php
  }else{
    session_unset();
    session_destroy();
    header('location:index.php');
  }
?>