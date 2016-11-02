<!DOCTYPE html>
<html>
<head>
	<title>Estacionamiento</title>
</head>

	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/animations.css">

<body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/funcionesAjax.js"></script>

<div id="ingreso">
<form >
	
	<label> Patente: </label>
 	<input type= "text" name="patente" ID="patente">

	
</form>


	<input type="submit" class="MiBotonUTN" name="btnIngreso" id="btnIngreso" onclick="llamada()" >
	
</div>


<div id="usuarios">
</div>

<div id="Estacionados">
</div>


<div id ="importes">
</div>




</body>
</html>