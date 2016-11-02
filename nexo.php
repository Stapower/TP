<?php
require_once("clases/AccesoDatos.php");
require_once("clases/Estacionamiento.php");

$queHacer = $_POST['queHacer'];

switch ($queHacer) {
	case 'alta':

			$auto = new Estacionamiento();
			$auto->patente=$_POST['patente'];
			$cantidad=$auto->ProbandoEstacionamiento();
			echo $cantidad;
		break;
	
	default:
		# code...
		break;
}


?>



