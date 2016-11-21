function RetirarVehiculo(id)
{
	alert(id);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Baja",
			id: id
		}
	});
	funcionAjax.done(function(retorno){
              
                 
                alert("dinero a cobrar: $" + retorno);
		llamada("MostrarEstacionados");
		$("#Estacionados").html("cantidad de eliminados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}


function Alta()
{

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Mostrar_Usuario_Form"
             }
	});
	funcionAjax.done(function(retorno){
		//var cd =JSON.parse(retorno);	
		//$("#idCD").val(cd.id);
		//$("#cantante").val(cd.cantante);
		//$("#titulo").val(cd.titulo);
		//$("#anio").val(cd.año);
		$("#formUsuario").val(retorno);
	});
	funcionAjax.fail(function(retorno){	
		$("#formUsuario").html(retorno);	
	});	
	usuarios("Usuarios");
}


function GuardarUsuario(id)
{
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Modificacion",
			id: id	
		}
	});
	funcionAjax.done(function(retorno){
		//var cd =JSON.parse(retorno);	
		//$("#idCD").val(cd.id);
		//$("#cantante").val(cd.cantante);
		//$("#titulo").val(cd.titulo);
		//$("#anio").val(cd.año);
	});
	funcionAjax.fail(function(retorno){	
		$("#formUsuario").html(retorno.responseText);	
	});	
	
}

function GuardarUsuario()
{
var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Alta"
			
		}
	});
	funcionAjax.done(function(retorno){
		//var cd =JSON.parse(retorno);	
		//$("#idCD").val(cd.id);
		//$("#cantante").val(cd.cantante);
		//$("#titulo").val(cd.titulo);
		//$("#anio").val(cd.año);
		alert("guardado exitoso!");
	});
	funcionAjax.fail(function(retorno){	
		$("#formUsuario").html(retorno.responseText);	
	});	
	
}

function Accion(id, queHacer)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			id : id,
			queHacer:queHacer			
		}
	});
	funcionAjax.done(function(retorno){
		//var cd =JSON.parse(retorno);	
		//$("#idCD").val(cd.id);
		//$("#cantante").val(cd.cantante);
		//$("#titulo").val(cd.titulo);
		$("#AMUser").val(retorno);
		//alert("guardado exitoso!");

	});
	funcionAjax.fail(function(retorno){	
				$("#AMUser").val(retorno);
	});
}