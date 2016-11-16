<?php
require_once("clases/AccesoDatos.php");
require_once("clases/Estacionamiento.php");
require_once("clases/Usuarios.php");
$date=new DateTime(); //this returns the current date time
$hoy = $date->format('Y-m-d-H-i-s');


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
               try
		{
                //var_dump($_POST);
		$auto = new Estacionamiento();
		$auto->id=$_POST['id'];
		$auto->fechaActual  = $hoy;
		$cantidad = $auto->ExtraerVehiculo($auto->id);
		echo $cantidad;	
		break;
                }
               	catch(Exception $ex)
		{
			echo $ex->getMessage();
		 	break;
		}
                
break;
	
	case 'MostrarEstacionados':
	
           include("partes/formGrilla.php");
            break;

	case 'Login':);
	    include("partes/formLogin.php"
	    break;
	case 'MostrarRecaudado':
        include("partes/recaudado.php");
      break;

      	case 'Usuarios':
        include("partes/Usuarios.php");
      break;

	default:
		# code...
		break;
}


?>