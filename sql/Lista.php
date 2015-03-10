<?php

class Lista{

	public function mostrar(){
		$model = new Conexion;
		$conexion = $model->conectar();

		$sql = "SELECT * FROM users";
		$consulta = $conexion->prepare($sql);
		$consulta->execute();
		while ($fila = $consulta->fetch()) {
			//echo $fila['idusers']." ".$fila['name']." ".$fila['email']." ".$fila['pass']." ".$fila['rol']."<br>";
			$var = "<tr class='odd gradeX'>";
			$var.= "<td>".$fila['idusers']."</td>";
			$var.= "<td>".$fila['name']."</td>";
			$var.= "<td>".$fila['email']."</td>";
			$var.= "<td class='center'>".$fila['pass']."</td>";
			$var.= "<td class='center'>".$fila['rol']."</td>";
			$var.= "</tr>";
			echo $var;

		}
		
	}
}
 


?>
