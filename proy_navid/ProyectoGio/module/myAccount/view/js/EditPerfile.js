$(document).ready(function () {

    var usuarioLogeado=sessionStorage.getItem('app-usuarioLogeado');
        console.log(usuarioLogeado);

    // if ((typeof(usuarioLogeado) == "undefined") || (usuarioLogeado == null)) {
    //     console.log("no logueado");
    // }else{ 

	$.post('module/myAccount/controller/controller_myAccount.php?type=EditPerfile',
	        {"usuarioLogeado": usuarioLogeado},
	function(response){
		 	var json_cont2 = JSON.parse(response);
			console.log(json_cont2);
		   console.log(response);

		   var name = document.getElementById('pName'),
		   		email=document.getElementById('pEmail'),
		   		mobile=document.getElementById('pMobile'),
		   		pass=document.getElementById('pPassword');

		   		name.innerHTML=json_cont2['first_name']+" "+json_cont2['last_name'],
		   		email.innerHTML=json_cont2['email'],
		   		mobile.innerHTML=json_cont2['phone'],
		   		pass.innerHTML="*******************";
	}).fail(function() {
	       alert( "recepcion de datos fallida en boton detalles producto" );
	   });

	// p=document.getElementById('pName');
	// alert(p.innerHTML);

	$('#btn_name').click(function(){
		uno=document.getElementById('infInicial');
		uno.style.display='none';
		dos=document.getElementById('divEdname');
		dos.style.display='';
	});

	$('#new_name').keyup(function(){
		$("#new_name").attr("style", "");
		$("#sp_new_name").html("<span></span>");
	});

	$('#new_lastName').keyup(function(){
		$("#new_lastName").attr("style", "");
		$("#sp_new_lastName").html("<span></span>");
	});


	$('#saveName').click(function(){
		var namePattern="^[a-zA-Z]{3,}$";

		var check1=checkInput("#new_name", namePattern);
		var check2=checkInput("#new_lastName", namePattern);
		if (!check1) {
			$("#new_name").attr("style", "background:#FFC9C9; border:red 2px solid");
			$("#sp_new_name").html("<span style='color:#BA1C2E;'>Invalid Name. Please just use letters.</span>");
		}else{
			if (check2) {
				var data = {"user_name": $("#new_name").val(), "user_lastName": $("#new_lastName").val(), "user":usuarioLogeado};
	    		var dataJSON = JSON.stringify(data);
				$.post('module/myAccount/controller/controller_myAccount.php?type=ChangeName',
		            {"data":dataJSON},
				function(response){
						console.log(response);
						alert (response);
						var redirect=document.URL;
	                	window.location.href =redirect;
					 // 	var json_cont2 = JSON.parse(response);
						// console.log(json_cont2);
					   
				}).fail(function() {
				       alert( "recepcion de datos fallida en boton detalles producto" );
				   });
			}else{
				$("#new_lastName").attr("style", "background:#FFC9C9; border:red 2px solid");
				$("#sp_new_lastName").html("<span style='color:#BA1C2E;'>Invalid Name. Please just use letters.</span>");
			}
		}	
	});//end saveName

	
	$('#btn_email').click(function(){
		uno=document.getElementById('infInicial');
		uno.style.display='none';
		dos=document.getElementById('divEdEmail');
		dos.style.display='';
	});
	$('#new_email').keyup(function(){
		$("#new_email").attr("style", "");
		$("#sp_new_email").html("<span></span>");
	});
	$('#saveEmail').click(function(){
		var emailPattern = "^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$";

		var check1=checkInput("#new_email", emailPattern);
		if (!check1) {
			$("#new_email").attr("style", "background:#FFC9C9; border:red 2px solid");
			$("#sp_new_email").html("<span style='color:#BA1C2E;'>Invalid Email.</span>");
		}else{			
			var data = {"email": $("#new_email").val(), "user":usuarioLogeado};
    		var dataJSON = JSON.stringify(data);
			$.post('module/myAccount/controller/controller_myAccount.php?type=ChangeEmail',
	            {"data":dataJSON},
			function(response){
					console.log(response);
					alert (response);
					var redirect=document.URL;
                	window.location.href =redirect;
				 // 	var json_cont2 = JSON.parse(response);
					// console.log(json_cont2);
				   
			}).fail(function() {
			       alert( "recepcion de datos fallida en boton detalles producto" );
			   });
			
		}	
	});//end saveEmail

});//end document.ready	

function checkInput(idInput, pattern) {
  return $(idInput).val().match(pattern) ? true : false;
}