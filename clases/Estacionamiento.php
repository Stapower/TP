<?php
class Estacionamiento
{
	public $id;
 	public $patente;
  	public $fechaEntrada;
  	public $fechaSalida;
  	public $fechaActual;
  	public $valor;

	   	public function ExtraerVehiculo($idABorrar)
	 {

          try
          {
	 		$date=new DateTime(); //this returns the current date time
			$hoy =  $date->format('Y-m-d H:i:s');
	 		$this->fechaActual = $hoy;
                     	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("
							UPDATE Estacionamiento SET fechaEgreso ='$this->fechaActual'WHERE id='$this->id'");
	
             $consulta->execute();


$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM Estacionamiento WHERE id='$idABorrar'");

	
             $consulta->execute();


             $objeto =  $consulta->fetchObject('Estacionamiento');

  
  $ingreso = strtotime($objeto->fechaIngreso);
  $egreso = strtotime($objeto->fechaEgreso);

  $diffMinutes = round(($egreso - $ingreso) / 60);//3600 horas
  												  //60 minutos
			 $precio = $diffMinutes * (20/60);


echo $precio;
 $this->cobrar($precio, $idABorrar);


          }	
         catch(Exception $e)
        { 
         print "Error!: " . $e->getMessage(); 
         die();
        }
	 }

	 public function cobrar($precio, $id)
	 {
	 	                   	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				UPDATE Estacionamiento SET precio = '$precio'	
				WHERE id='$id'");	
			$consulta->execute();
			 return $consulta->fetchObject('Estacionamiento');
				//$consulta->bindValue
	 }


	/*public static function BorrarCdPorAnio($año)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from cds 				
				WHERE jahr=:anio");	
				$consulta->bindValue(':anio',$año, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }*/

	/*public function ModificarCd()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update cds 
				set titel='$this->titulo',
				interpret='$this->cantante',
				jahr='$this->año'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }*/
	public function ProbandoEstacionamiento()
	 {
	 	return "pasaste por estacionamiento.php";
	 }
  
	 public function InsertarElVehiculo()
	 {
                   try{
	 			$date = new DateTime();
	 			$this->fechaActual= $date->format('Y-m-d H:i:s');

				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                                var_dump($objetoAccesoDato);
				$consulta =$objetoAccesoDato->RetornarConsulta('INSERT INTO Estacionamiento (patente,fechaIngreso) values (?, ?)');
                                
				$consulta->execute(array($this->patente, $this->fechaActual));
                               
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
                        }
                     catch(Exception $e)
                    { 
                     print "Error!: " . $e->getMessage(); 
                     die();
                    }
	 }

	  /*public function ModificarCdParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update cds 
				set titel=:titulo,
				interpret=:cantante,
				jahr=:anio
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
			$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
			return $consulta->execute();
	 }

	 public function InsertarElCdParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values(:titulo,:cantante,:anio)");
				$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
				$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
				$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }*/
	 public function GuardarVehiculo()
	 {




	 	InsertarElVehiculo();
	 	/*if($this->id>0)
	 		{
	 			$this->ModificarCdParametros();
	 		}else {
	 			$this->InsertarElCdParametros();
	 		}*/

	 }


  	public static function TraerTodoLosVehiculosEstacionados()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Estacionamiento where fechaEgreso IS NULL"); //si no anda precio = 0
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Estacionamiento");		
	}	 

    public static function TraerTodoLosVehiculosRetirados()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Estacionamiento where fechaSalida IS NOT NULL"); //si no anda precio > 0
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Estacionamiento");		
	}

    public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Usuarios where");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuarios");		
	}


/*
	public static function TraerUnd($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, titel as titulo, interpret as cantante,jahr as año from cds where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
			return $cdBuscado;				

			
	}

	public static function TraerUnCdAnio($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=? AND jahr=?");
			$consulta->execute(array($id, $anio));
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}

	public static function TraerUnCdAnioParamNombre($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
			$consulta->bindValue(':id', $id, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $anio, PDO::PARAM_STR);
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}
	
	public static function TraerUnCdAnioParamNombreArray($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
			$consulta->execute(array(':id'=> $id,':anio'=> $anio));
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}*/

	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->patente."  ".$this->fechaEntrada."  ".$this->precio;
	}

	
}