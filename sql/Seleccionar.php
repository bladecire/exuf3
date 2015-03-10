<?php

class Seleccionar{
	public $mensaje; 
	public $usuario;
	public $password;

	public function login(){
		$model = new Conexion;
		$conexion = $model->conectar();

		$sql = "SELECT * FROM users WHERE ";
		$sql.= "name=:usuario AND pass=:clave";

		$consulta = $conexion->prepare($sql);
		$consulta->bindParam(":usuario",$this->usuario,PDO::PARAM_STR);
		$consulta->bindParam(":clave",$this->password,PDO::PARAM_STR);

		$consulta->execute();
		$total = $consulta->rowCount();

		if($total==0){
			$this->mensaje = "Error al iniciar sesión";
		}else{
			$fila = $consulta->fetch();
			session_start();
			$_SESSION['login'] = true;
			$_SESSION['idusuario'] = $fila['idusers'];
			$_SESSION['nombre'] = $fila['name'];
			$_SESSION['nivel_usuario'] = $fila['rol'];
			header('location:panel.php');
		}
	}
}



?>