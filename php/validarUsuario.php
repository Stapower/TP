<?php 
session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

$retorno;


try{
	header('Access-Control-Allow-Origin: *');
	include("https://arganarastomas.000webhostapp.com/clases/Usuarios.php");
    
	$user = new Usuario();
	$user->usuario = $usuario;
	$user = $user->ConsultarUsuario();


	if($user->usuario==$usuario && $clave== $user->clave)
	{			
		if($recordar=="true")
		{
			setcookie("registro",$usuario,  time()+36000 , '/');
			
		}else
		{
			setcookie("registro",$usuario,  time()-36000 , '/');
			
		}
		$_SESSION['registrado']= true;
		$_SESSION['rol'] = $user->rol;
		$_SESSION['usuario'] = $user->usuario;

		$retorno=" ingreso";

		
	}else
	{
		$retorno= "No-esta";
	}
}
catch(Exception $ex)
	{
		echo $ex->getMessage();
	 	
	}

echo $retorno;
?>