<?php

    require 'sql/Conexion.php';
    require 'sql/Seleccionar.php';

    if(isset($_POST['login'])){
        $model = new Seleccionar;
        $model->usuario = htmlspecialchars($_POST['usuario']);
        $model->password = htmlspecialchars($_POST['password']);
        $model->login();
        $mensaje = $model->mensaje;
    }

?>
 
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Maruti Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/maruti-login.css" />
    </head>
    <body>
        <div id="logo">
            <img src="img/login-logo.png" alt="" />
        </div>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
				 <div class="control-group normal_text"><h3>Examen UF3 - PDO</h3></div>
                <div class="control-group">

                <?php if(isset($_POST['login'])){?>
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                <?php echo $mensaje; ?>
                </div>
                <?php }?>


                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input name="usuario" type="text" placeholder="Usuario" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input name="password" type="password" placeholder="Contraseña" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Entrar" /></span>
                    <input type="hidden" name="login">
                </div>
            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/maruti.login.js"></script> 
    </body>

</html>
