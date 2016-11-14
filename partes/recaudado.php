<?php 
//session_start();
if(isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/Estacionamiento.php");
	$arrayDeVehiculos=Estacionamiento::TraerRecaudado();
	//echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?>
<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Patente</th><th>Precio</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeVehiculos as $vehiculo) {
	echo"<tr>
			
			<td>$vehiculo->patente</td>
			<td>$vehiculo->precio</td>
			
		</tr>   ";
}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>