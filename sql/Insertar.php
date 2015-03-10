<?php

class Insertar{
	public $mensaje;
	public $nombre;
	public $email;
	public $password;
	public $rol;

	public function insert(){
		$model = new Conexion();
		$conexion = $model->conectar();
		
		$sql = "INSERT INTO users (name,email,pass,rol) VALUES(:nombre,:email,:password,:rol)";

		$consulta = $conexion->prepare($sql);

		$consulta->bindParam(':nombre', $this->nombre);
		$consulta->bindParam(':email', $this->email);
		$consulta->bindParam(':password', $this->password);
		$consulta->bindParam(':rol', $this->rol);

		if(!$consulta){
			$this->mensaje= $conexion->errorInfo();
		}else{
			if (!$consulta->execute()) {
			    print_r($consulta->errorInfo());
		    }else{
		    	$this->mensaje = "Inserción ejecutada con exito";	
		    }
		}
	}
}
 


?>