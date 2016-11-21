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
              if(!isset($_POST['patente']))
              {
		$auto = new Estacionamiento();
		$auto->id=$_POST['id'];
		$auto->fechaActual  = $hoy;
		$cantidad = $auto->ExtraerVehiculo($auto->id);
		echo $cantidad;	
              }
              else
             {
              Estacionamiento::ExtraerVehiculoPatente($_POST['patente']);
             }
		break;
        }
        catch(Exception $exe)
		{
			echo $exe->getMessage();
		 	break;
		}
                
	case 'MostrarEstacionados':
	
           include("partes/formGrilla.php");
//Estacionamiento::Registros();
            break;

	case 'Login':
	    include("partes/formLogin.php");
	    break;
	case 'MostrarRecaudado':
        include("partes/recaudado.php");
      break;

      	case 'Usuarios':
        include("partes/formUsuarios.php");

      break;

      case 'Mostrar_Usuario_Form':
      include("partes/formAltaUsuario.php");
      break;

            case 'Ascender':
    $res =   Usuario::Degradar($_POST['id']);
    echo $res;
      break;

            case 'Degradar':
      $res  = Usuario::Ascender($_POST['id']);
      echo $res;
      break;

	default:
		# code...
		break;
}


?>