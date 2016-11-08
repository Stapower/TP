<?php
require_once("clases/AccesoDatos.php");
require_once("clases/Estacionamiento.php");
var_dump($_POST);
$queHacer = $_POST['queHacer'];


switch ($queHacer) {
	case 'alta':
try{
			$auto = new Estacionamiento();
			$auto->patente=$_POST['patente'];
			//$auto->fechaEntrada = date_timestamp_get();
                        echo "Vamos para insertarElVehiculo";
			$cantidad=$auto->InsertarElVehiculo();

			echo $cantidad;
			 break;
	}
	catch(Exception $ex)
	{
		echo $ex->getMessage();
		 break;
	}
		
	
	default:
		# code...
		break;
}


?>