function validarLogin()
{
		var varUsuario=$("#user").val();
		var varClave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');

		
		
//$("#informe").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			usuario:varUsuario,
			clave:varClave    // parametros que se toman y se pasan!!!!!
		}
	});


	funcionAjax.done(function(retorno){
		console.log(retorno);

			if(retorno!="No-esta"){	
				window.location = "https://arganarastomas.000webhostapp.com";
				//die();
                              alert("logeo exitoso");
                             
			}else
			{
                            
				$("#Logeo").html("usuario o clave incorrecta");	
				$("#formLogin").addClass("animated bounceInLeft");
			}
	});
	funcionAjax.fail(function(retorno){
                 alert("retorno fail: " + retorno);
		$("#Logeo").html(retorno.responseText);	
	});
	
}

function Admin()
{
	document.getElementById('user').value='admin';
	document.getElementById('clave').value='123456';
}

function Empleado()
{
	document.getElementById('user').value='Tomas';
	document.getElementById('clave').value='123456';
}

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
        alert("Usted fue deslogeado");
	window.location = "https://arganarastomas.000webhostapp.com";
        //die();
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