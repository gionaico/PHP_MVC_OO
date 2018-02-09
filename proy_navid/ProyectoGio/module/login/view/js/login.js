var passwordPattern_log="^(?=.{8,})(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\\s).*$";
var user_namePattern_log="^[_A-Za-z0-9-\\+]{4,}$";
function checkInput(idInput, pattern) {
  if($(idInput).val().match(pattern)){
  	return true;
  } 
  return false;
}
$(document).ready(function () {
	 
	// div_bienvenida.style.display = 'none';

	$("#user_log").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_user_log").html("<span></span>");
		}else{
			$("#user_log").attr("style", "");
			var check=checkInput("#user_log", user_namePattern_log);
			if(check==true) {
				$("#user_log").removeAttr("style");
				$("#sp_user_log").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_user_log").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});

	$("#password_log").keyup(function() {
		if ($(this).val()!=="") {
			var check=checkInput("#password_log", passwordPattern_log);
			if(check==true) {
				$("#password_log").removeAttr("style");			
			}
		}	
	});

	$('#submit_login').click(function () { 
		$("div").remove(".div_errPhp");
		validaLogin();
	});




var usuarioLogeado=sessionStorage.getItem('app-usuarioLogeado');
var user_type=sessionStorage.getItem('user_type');
        //alert(usuarioLogeado);
        if (usuarioLogeado==null) {
            console.log("es null");
        }
    if ((typeof(usuarioLogeado) == "undefined") || (usuarioLogeado == null)) {
        console.log("no logueado");
    }else{

        console.log("ESTO ES "+usuarioLogeado+" tipo "+user_type);
                var div_bienvenida=document.getElementById('div_bienvenida');
                div_bienvenida.style.display = 'block';

                var id_session=document.getElementById('id_session');
                id_session.innerHTML=usuarioLogeado;

                var li_singIn=document.getElementById('li_singIn');
                var li_login=document.getElementById('li_login');
                var li_logOut=document.getElementById('li_logOut');
                    li_singIn.style.display = 'none';
                    li_login.style.display = 'none';
                    li_logOut.style.display = 'block';
                    if (user_type==1) {
                        var crud=document.getElementById('crud');
                        crud.style.display='block';
                    }
    }



    $('#li_logOut2').click(function() {

        sessionStorage.clear();
        var div_bienvenida=document.getElementById('div_bienvenida');
                div_bienvenida.style.display = 'none';

                var id_session=document.getElementById('id_session');
                id_session.innerHTML=usuarioLogeado;

                var li_singIn=document.getElementById('li_singIn');
                var li_login=document.getElementById('li_login');
                var li_logOut=document.getElementById('li_logOut2');
                    li_singIn.style.display = 'block';
                    li_login.style.display = 'block';
                    li_logOut.style.display = 'none';
                    var redirect=document.URL;
                window.location.href =redirect;
    });

    

});//end document.ready





function validaLogin(){


	if (($("#user_log").val()=="")|| (checkInput("#user_log", user_namePattern_log)===false)) {
		$("#user_log").focus();
		$("#user_log").attr("style", "background:#FFC9C9; border:red 2px solid");
	}else if (($("#password_log").val()=="")|| (checkInput("#password_log", passwordPattern_log)===false)) {
		$("#password_log").focus();
		$("#password_log").attr("style", "background:#FFC9C9; border:red 2px solid");
	}
	
    
    var result=true;
    var un = document.getElementById('user_log').value;
    var password = document.getElementById('password_log').value;

	if (($("#user_log").val()=="")|| (checkInput("#user_log", user_namePattern_log)===false)) {
		result=false;
		//return false;
	}
	if (($("#password_log").val()=="")|| (checkInput("#password_log", passwordPattern_log)===false)) {
			result=false;
        //return false;
    }
 // alert(result);
 	if (result) {
 		var data = {"user_log": un, "password_log": password};
 
        var data_users_JSON = JSON.stringify(data);

                   alert(data_users_JSON);
    $.post('module/login/controller/controller_login.php',
                {"login_users_json": data_users_JSON},



        function (response) {
        	 console.log(response);
        	 //console.log(response.error);
        	// console.log(response.user_log);
        	//var json2 = JSON.parse(response);
        	//console.log(json2.error);
        	//alert(json2); 
        	//alert(json2);
        	// alert("ffffffffffffffffff"+json2.success); 
            if (response.success) {
            	alert(response.user_log);
            	$('#modal_login').modal('hide');
                console.log(response.logUser_type);

                var datosPrueba = {"user_log": response.user_log, "password_log": "password"};
                console.log(datosPrueba.user_log);

                sessionStorage.setItem('app-usuarioLogeado', response.user_log);
                sessionStorage.setItem('user_type', response.logUser_type);
                // usuarioLogeado = sessionStorage.getItem('app-usuarioLogeado');
                console.log(sessionStorage.setItem('user_type', response.logUser_type));
                console.log(document.URL);
                var redirect=document.URL;
                window.location.href =redirect; 
                

            	// var div_bienvenida=document.getElementById('div_bienvenida');
            	// div_bienvenida.style.display = 'block';

            	// var id_session=document.getElementById('id_session');
            	// id_session.innerHTML=response.user_log;

            	// var li_singIn=document.getElementById('li_singIn');
            	// var li_login=document.getElementById('li_login');
            	// var li_logOut=document.getElementById('li_logOut');
            	// 	li_singIn.style.display = 'none';
            	// 	li_login.style.display = 'none';
            	// 	li_logOut.style.display = 'block';





               // window.location.href = response.redirect; 
                //Al establecer la propiedad va a redirigir la página.
				// window.open('http://www.xyz.com'); //This will open xyz in a new window.
				// window.location.href = 'http://www.xyz.com'; //Will take you to xyz.
            }
            //console.log(json2);
              //alert(json2);  //para debuguear
            //}); //para debuguear
        //}, "json").fail(function (xhr) {
        
        }, "json").fail(function(xhr, status, error) {
        	alert("tiene fallos");
            console.log(xhr.responseText);
            
            
            if (xhr.responseJSON.error.user_log){
            	$("#user_log").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.user_log + "</span><br></div>");
            	$("#sp_user_log").html("<span></span>");
            }
            
            if (xhr.responseJSON.error.password_log){
                $("#password_log").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.password_log + "</span><br></div>");
                $("#sp_password_log").html("<span></span>");
            }
            
            
        });

        }//end if(result)	
}//end_validalogin


































