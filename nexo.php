<?php
require_once("clases/AccesoDatos.php");
require_once("clases/Estacionamiento.php");
var_dump($_POST);
$date=new DateTime(); //this returns the current date time
$hoy = $date->format('Y-m-d-H-i-s');

var_dump($_POST);
$queHacer = $_POST['queHacer'];


switch ($queHacer)
{
	case 'alta':
		try
		{
			$auto = new Estacionamiento();
			$auto->patente=$_POST['patente'];

			$auto->fechaActual=$hoy;
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
		
	case 'Baja':
		$auto = new Estacionamiento();
		$auto->patente=$_POST['patente'];
		$auto->fechaActual  = $hoy;
		$cantidad = $auto->ExtraerVehiculo();
		echo $cantidad;	
		break;

	case 'MostrarEstacionados':
		/*$auto = new Estacionamiento();
		$Autos[] = {$auto->TraerTodoLosVehiculosEstacionados();}
		echo $Autos[];	*/
		include("partes/formGrilla.php");
		break;


	default:
		# code...
		break;
}


?>