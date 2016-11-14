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
 	
	
      public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Usuarios where");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuarios");		
	}
}

?>