<?php 
//session_start();
if(true)//isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/Estacionamiento.php");
	$arrayDeVehiculos=Estacionamiento::TraerTodoLosVehiculosEstacionados();
	//echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?>
<table class="bounce"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Retirar</th><th>Patente</th><th>FechaIngreso</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeVehiculos as $vehiculo) {
	echo"<tr>
			<td><a onclick='RetirarVehiculo($vehiculo->id)' class='MiBotonUTN'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Retirar</a></td>
			<td>$vehiculo->patente</td>
			<td>$vehiculo->fechaIngreso</td>
			
		</tr>   ";
}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>