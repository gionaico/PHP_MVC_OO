

$(document).ready(function () {
	$('#myUserName').keyup(function(){
		$('#myUserName').attr("style", "");
		$("#sp_myUserName").html("<span></span>");
	});

	$('#myCode').keyup(function(){
		$('#myCode').attr("style", "");
		$("#sp_myCode").html("<span></span>");
	});

	$('#btn_sendCode').click(function(){
		if ($('#myUserName').val()=="") {
			$('#myUserName').focus();
			$('#myUserName').attr("style", "background:#FFC9C9; border:red 2px solid");
			$("#sp_myUserName").html("<span style='color:red;'>Incorrect user name format</span>");
		}else{

			
			$.post('module/login/controller/controller_login.php',
			            {"UserName": $('#myUserName').val()},
			function(response){
				if (!response) {
					$('#myUserName').attr("style", "background:#FFC9C9; border:red 2px solid");
					$("#sp_myUserName").html("<span style='color:red;'>User not found in DB</span>");
				}else{
					$('#myUserName').attr("style", "");
					$("#sp_myUserName").html("<span></span>");
					$('#campoUserName').attr("style", "display:none;");
					$('#verifyCode').attr("style", "display:block;");

					console.log(response);
				 	var json = JSON.parse(response);
					console.log(json);
					$('#btn_verifyCode').click(function(){
						//console.log($('#myCode').val());						
						if (json.code==$('#myCode').val()) {
							$('#verifyCode').attr("style", "display:none;");
							$('#IntroNewPass').attr("style", "display:block;")
						}else{
							$('#myCode').attr("style", "background:#FFC9C9; border:red 2px solid");
							$("#sp_myCode").html("<span style='color:red;'>Incorrect code please check your email</span>");
						}
					});

					$('#changePasswo').click(function(){
						var passwordPattern="^(?=.{8,})(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\\s).*$";
						
						var check1=$('#re_recoverPassw').val().match(passwordPattern);
						var check2=$('#recoverPassw').val().match(passwordPattern);

						if (($('#re_recoverPassw').val()==$('#recoverPassw').val())&&check2&&check1) {							
							//var data = {"code": $('#myCode').val(), "newPass":$('#recoverPassw').val()};
						    //var data_JSON = JSON.stringify(data);

							$.post('module/login/controller/controller_login.php',
							            {"datosRecoverPass": $('#recoverPassw').val()},
							function(response){
								console.log(response);
								if (response) {
									alert("Tus cambios han sido hechos con exito. Inicia sesion con tu nuevo password");
									window.location.href="index.php"
								}else{
									alert("no");
								}

								 	var json_cont2 = JSON.parse(response);
									console.log(json_cont2);
								   
							}).fail(function() {
							       alert( "recepcion de datos fallida en boton detalles producto" );
						   		});
						}else{
							$('#recoverPassw').attr("style", "background:#FFC9C9; border:red 2px solid");
							$("#sp_recoverPassw").html("<span style='color:red;'>Password no son iguales o Invalido formato</span>");
							$('#re_recoverPassw').attr("style", "background:#FFC9C9; border:red 2px solid");
							$("#sp_re_recoverPassw").html("<span style='color:red;'>Password no son iguales o Invalido formato</span>");
						}
						
					});
				}//end else
				   
			}).fail(function() {
			       alert( "recepcion de datos fallida en boton detalles producto" );
		   		});
			//$('#verifyCode').attr("style", "display:block")
		}
	});
	
});	