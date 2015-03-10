<?php
class Conexion{
	public function conectar(){
		$usuario = "2daw09_admin";
		$password = "o0NsXvOvct";
		$host = "localhost";
		$db = "2daw09_exuf3";
		return $conexion = new PDO("mysql:host=$host;dbname=$db",$usuario,$password);
	}
}
?>

