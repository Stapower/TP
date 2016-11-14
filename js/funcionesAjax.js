function llamada(queMostrar)
{
	alert(queMostrar);
	var patente = document.getElementById('patente').value;
	$.ajax({
		url : "nexo.php",
		type : "POST",
		//contentType: "application/json; charset=utf-8",
   		//dataType: "json",
		data : {queHacer : queMostrar, patente : patente }

	})
	.then(function(retorno)
	{	
               $("#Estacionados").html(retorno);
		console.log(retorno);
		alert("Ok "+retorno);

	},function(retorno){
		console.log(retorno);
	});
	
}

function redirect()
{
	window.location = "https://arganarastomas.000webhostapp.com/partes/formLogin.php";
}
/*

/*

function MostrarError()
{
	var funcionAjax=$.ajax({url:"nexoNoExiste.php",type:"post",data:{queHacer:"MostrarTexto"}});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
			$("#principal").html("error :(");
		$("#informe").html(retorno.responseText);		
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);
	});
}
function MostrarSinParametros()
{
	var funcionAjax=$.ajax({url:"nexoTexto.php"});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}
function redirect()
{
	window.location = "https://arganarastomas.000webhostapp.com/partes/formLogin.php";
}
function Mostrar(queMostrar)
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostarLogin()
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}*/