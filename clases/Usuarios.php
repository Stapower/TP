<?php
class Usuario
{
	public $id;
 	public $usuario;
  	public $contraseña;
  	public $rol;
  	
    public static function ConsultarUsuario($nombreUsuario)
    {
    	 try{
                   echo "consultaroUsuario()";
	 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		 $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM Usuarios WHERE usuario = '$nombreUsuario'");
                          $consulta->execute();	 


		 //return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
		//$consulta->execute(array($this->patente, "2012-12-12"));
                	 $objeto = $consulta->fetchObject('Usuario');
return $objeto;
                       
		//return $objetoAccesoDato->RetornarUltimoIdInsertado();
             }
             catch(Exception $e)
            { 
             print "Error!: " . $e->getMessage(); 
             die();
            }
    }
	public function ProbandoUsuario()
	 {
	 	return "pasaste por estacionamiento.php";
	 }
 	
	
      public static function TraerTodosLosUsuarios()
	{
		try{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
		}
		catch(Exception $e)
		{
 			print "Error!: " . $e->getMessage(); 
             die();
		}
	}

	public static function Degradar($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE Usuarios SET rol = 'empleado' WHERE id = '$id'");
		$consulta->execute();			
		return $consulta->rowCount();
	}

	public static function Ascender($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE Usuarios SET rol = 'admin' WHERE id = '$id'");
		$consulta->execute();			
		return $consulta->rowCount();
	}
}

?>