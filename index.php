<!DOCTYPE html>
<html>
<head>
	<title>Estacionamiento</title>
</head>

	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/animations.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

<body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/funcionesAjax.js"></script>
<script type="text/javascript" src="js/funcionesLogin.js"></script>


	       <div style="top: 0; right: 0;"><input type="button" class="MiBotonUTN" value="<?php if(isset($_SESSION['usuario'])){echo 'LogOut';} else{echo 'LogIn';}?>" onclick= "<?php if(isset($_SESSION['usuario'])){echo 'LogOut()';}else{echo 'redirect()';}?>" /></div>



    <div style="position: absolute; top: 0; right: 0;"><input type="button" value="<?php  if(isset($_SESSION['usuario'])){echo 'LogOut' onclick=llamada('logOut');} else {echo 'LogIn' onclick=llamada('logIn');}?>" /></div>


<div id="ingreso">
<form >
	
	<label> Patente: </label>
 	<input type= "text" name="patente" ID="patente">

	
</form>


	<input type="submit" class="MiBotonUTN" name="btnIngreso" id="btnIngreso" onclick="llamada('alta')" value="Alta">
	<input type="submit" class="MiBotonUTN" name="btnEgreso" id="btnEgreso" onclick="llamada()" value="Baja">
	<input type="submit" class="MiBotonUTN" name="btnGrillaEstacionados" id="btnGrillaEstacionados" onclick="llamada('MostrarEstacionados')" value="Estacionados">
	<input type="submit" class="MiBotonUTN" name="btnGrillaRecaudado" id="btnGrillaRecaudado" onclick="llamada()" value="Recaudado" >
	<input type="submit" class="MiBotonUTN" name="btnGrillaUsuarios" id="btnGrillaUsuarios" onclick="llamada()" value="Usuarios">


</div>
</div>


<div id="usuarios">
</div>

<div id="content" >
<article  class="post clearfix">
<div id="Estacionados">
</div>
</article>
</div>
<div id ="importes">
</div>




</body>
</html>