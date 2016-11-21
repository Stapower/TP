<?php 


session_start();
if(isset($_SESSION['usuario']))
{

	require_once("clases/AccesoDatos.php");
	require_once("clases/Usuarios.php");
	$arrayDeUsuarios=Usuario::TraerTodosLosUsuarios();
var_dump($arrayDeUsuarios);
	//echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?>
<table class="table"  style=" background-color: beige;">
	<thead>

	<td><a onclick='Alta()' class='MiBotonUTN'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Agregar Usuario</a></td>

		<tr>
			<th>Usuario</th><th>Rol</th><th>Ascender</th><th>Degradar</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeUsuarios as $usuario) {
	echo"<tr>
			
			<td>$usuario->usuario</td>
			<td>$usuario->rol</td>
			<td><a onclick='Accion($usuario->id, Ascender)' class='MiBotonUTN'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Ascender</a></td>

			<td><a onclick='Accion($usuario->id, Degradar)' class='MiBotonUTN'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Degradar</a></td>
			
		</tr>   ";
}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>