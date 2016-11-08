<?php 
session_start();
if(isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/Estacionamiento.php");
	$arrayDeVehiculos=Estacionamiento::TraerTodoLosVehiculosEstacionados();
	echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?>
<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Retirar</th><th>Patente</th><th>FechaIngreso</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeVehiculos as $vehiculo) {
	echo"<tr>
			<td><a onclick='ExtraerVehiculo($vehiculo->patente)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Retirar</a></td>
			<td>$vehiculo->patente</td>
			<td>$vehiculo->fechaEntrada</td>
			
		</tr>   ";
}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>