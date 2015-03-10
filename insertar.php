<?php session_start();

  require "sql/Conexion.php";
  require "sql/Insertar.php";

  if(isset($_POST['insertar'])){
    $model = new Insertar();
    $model->nombre = htmlspecialchars($_POST['nombre']);
    $model->email = htmlspecialchars($_POST['email']);
    $model->password = htmlspecialchars($_POST['password']);
    $model->rol = htmlspecialchars($_POST['rol']);
    $model->insert();
    $mensaje = $model->mensaje;
  }

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

        <?php if(isset($_POST['insertar'])){?>
        <div class="alert alert-success">
          <button class="close" data-dismiss="alert">×</button>
          <strong>¡Felicidades!</strong> <?php echo $mensaje; ?>
        </div>
        <?php }?>
        <div class="widget-box">
          <div class="widget-title">
            <h5>Nuevo usuario</h5>
          </div>
          <div class="widget-content nopadding">
          <?php if($_SESSION['nivel_usuario']==3){?>


            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="form-horizontal">

              <div class="control-group">
                <label class="control-label">Nombre :</label>
                <div class="controls"><input type="text" class="span20" placeholder="Nombre" name="nombre"></div>
              </div>

              <div class="control-group">
                <label class="control-label">Email :</label>
                <div class="controls"><input type="text" class="span20" placeholder="Email" name="email"></div>
              </div>

              <div class="control-group">
                <label class="control-label">Password :</label>
                <div class="controls"><input type="password" class="span20" placeholder="Password" name="password"></div>
              </div>

              <div class="control-group">
                <label class="control-label">Rol :</label>
                <div class="controls">
                <select name="rol">
                  <option value="1">Invitado</option>
                  <option value="2">Usuario</option>
                  <option value="3">Administrador</option>
                </select>
                </div>
              </div>
              <div class="form-actions" style="text-align:center">
                <input type="submit" class="btn btn-success" value="Insertar usuario">
              </div>

            <input type="hidden" name="insertar">
            
            </form>


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