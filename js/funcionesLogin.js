function validarLogin()
{
		var varUsuario=$("#user").val();
		var varClave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');

		alert("hola mundo");

		
//$("#informe").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"http://arganarastomas.000webhostapp.com/php/validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			usuario:varUsuario,
			clave:varClave    // parametros que se toman y se pasan!!!!!
		}
	});


	funcionAjax.done(function(retorno){
		//alert(retorno);

			if(retorno!="No-esta"){	
				window.location = "https://arganarastomas.000webhostapp.com";
				die();
			}else
			{
				$("#informe").html("usuario o clave incorrecta");	
				$("#formLogin").addClass("animated bounceInLeft");
			}
	});
	funcionAjax.fail(function(retorno){
		$("#informe").html(retorno.responseText);	
	});
	
}
function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
        setcookie("registro",$usuario,  time()-36000 , '/');
		window.location = "https://arganarastomas.000webhostapp.com/partes/formLogin";
        die();
	});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		//$("#botonesABM").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}
