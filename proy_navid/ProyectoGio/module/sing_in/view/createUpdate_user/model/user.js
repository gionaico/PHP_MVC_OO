

function checkInput(idInput, pattern) {
  return $(idInput).val().match(pattern) ? true : false;
}

var user_namePattern="^[_A-Za-z0-9-\\+]{4,}$";

var namePattern="^[a-zA-Z]{3,}$";

var dniPattern="^[0-9]{8}[A-Z]$";

// var born_datePattern="[0-1]{1}[0-9]{1}[/][0-3]{1}[0-9]{1}[/][1-2]{1}[9,0]{1}[0-9]{2}";

var telephonePattern="^[0-9]{9}$";

var passwordPattern="^(?=.{8,})(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\\s).*$";

var emailPattern = "^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$";

var zipPattern="^[0-9]{4}$";

var addPattern="^[a-zA-Z1-9 ]{3,}$";

var phonePattern="^[0-9]{9}$";

var datePattern="(0[1-9]|1[012])[/](0[1-9]|1[0-9]|2[0-9]|3[01])[/][0-9]{4}";

// ^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$
Dropzone.autoDiscover = false;

$(document).ready(function () {
	// var un1 = document.getElementById('un').value;
	// var type_form="";
	// 	if (un1=="") {
	// 		type_form="create";
	// 	}else{
	// 		type_form="update";
	// 	}
	// console.log("uno"+type_form); 	
	var type_form = jQuery(".form").attr("id");

	// var elemento = document.querySelector('.form');
	// var type_form = elemento.getAttribute('id'); 
	

	$("#birth_date").datepicker({
        dateFormat: 'mm/dd/yy',
        defaultDate: '05/05/1999',
        
        changeMonth: true,
        changeYear: true,
        yearRange: '-110:-16'
    });


	$("#un").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_un").html("<span></span>");
		}else{
			$("#un").attr("style", "");
			var check=checkInput("#un", user_namePattern);
			if(check==true) {
				$("#un").removeAttr("style");
				$("#sp_un").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_un").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});




	$("#fn").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_fn").html("<span></span>");
		}else{
			var check=checkInput("#fn", namePattern);
			if(check==true) {
				$("#fn").removeAttr("style");
				$("#sp_fn").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_fn").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}	
		}
	});

	$("#ln").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_ln").html("<span></span>");
		}else{
			var check=checkInput("#ln", namePattern);
			if(check==true) {
				$("#ln").removeAttr("style");
				$("#sp_ln").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_ln").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});


	$("#dni").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_dni").html("<span></span>");
		}else{
			var check=checkInput("#dni", dniPattern);
			if(check==true) {
				$("#dni").removeAttr("style");				
				$("#sp_dni").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_dni").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});
///////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$("#birth_date").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_birth_date").html("<span></span>");
		}else{
			var check=checkInput("#birth_date", datePattern);
			if(check==true) {
				$("#birth_date").removeAttr("style");				
				$("#sp_birth_date").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_birth_date").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});

	$("#add1").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_add1").html("<span></span>");
		}else{
			var check=checkInput("#add1", namePattern);
			if(check==true) {
				$("#add1").removeAttr("style");				
				$("#sp_add1").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_add1").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});

	$("#add2").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_add2").html("<span ></span>");
		}else{
			var check=checkInput("#add2", user_namePattern);
			if(check==true) {
				$("#sp_add2").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_add2").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}	
		}
	});

	$("#zip").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_zip").html("<span></span>");
		}else{
			var check=checkInput("#zip", zipPattern);
			if(check==true) {
				$("#zip").removeAttr("style");				
				$("#sp_zip").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_zip").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});

	$("#phone").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_phone").html("<span></span>");
		}else{
			var check=checkInput("#phone", telephonePattern);
			if(check==true) {
				$("#phone").removeAttr("style");				
				$("#sp_phone").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_phone").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});


	$("#email").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_email").html("<span></span>");
		}else{
			var check=checkInput("#email", emailPattern);
			if(check==true) {
				$("#email").removeAttr("style");				
				$("#sp_email").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_email").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});

	$("#password").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_password").html("<span></span>");
		}else{
			var check=checkInput("#password", passwordPattern);
			if(check==true) {
				$("#password").removeAttr("style");			
				$("#sp_password").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_password").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});


	$("#cmpny").keyup(function() {
		if ($(this).val()=="") {
			$("#sp_cmpny").html("<span></span>");
		}else{
			var check=checkInput("#cmpny", user_namePattern);
			if(check==true) {
				$("#cmpny").removeAttr("style");
				$("#sp_cmpny").html("<span style='color:green;'>Correct</span>");
			}else{
				$("#sp_cmpny").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
			}
		}	
	});





	$("#submit").click(function(){
		// alert("entasr");
		// alert(type_form);
			
			$("div").remove(".div_errPhp");

		// }
		if (($("#un").val()=="")|| (checkInput("#un", user_namePattern)===false)) {
			$("#un").focus();
			$("#un").attr("style", "background:#FFC9C9; border:red 2px solid");
		}else if (($("#fn").val()=="")|| (checkInput("#fn", namePattern)===false)) {
			$("#fn").focus();
			$("#fn").attr("style", "background:#FFC9C9; border:red 2px solid");
		}else if (($("#ln").val()=="")|| (checkInput("#ln", namePattern)===false)) {
			$("#ln").focus();
			$("#ln").attr("style", "background:#FFC9C9; border:red 2px solid");
		}else if (($("#dni").val()=="")|| (checkInput("#dni", dniPattern)===false)) {
			$("#dni").focus();
			$("#dni").attr("style", "background:#FFC9C9; border:red 2px solid");
		}else if (($("#birth_date").val()=="")|| (checkInput("#birth_date", datePattern)===false)) {
			$("#birth_date").focus();
			$("#birth_date").attr("style", "background:#FFC9C9; border:red 2px solid");
		}else if (($("#add1").val()=="")|| (checkInput("#add1", addPattern)===false)) {
			$("#add1").focus();
			$("#add1").attr("style", "background:#FFC9C9; border:red 2px solid");
		}else if (($("#zip").val()=="")|| (checkInput("#zip", zipPattern)===false)) {
			$("#zip").focus();
			$("#zip").attr("style", "background:#FFC9C9; border:red 2px solid");
		}else if (($("#phone").val()=="")|| (checkInput("#phone", phonePattern)===false)) {
			$("#phone").focus();
			$("#phone").attr("style", "background:#FFC9C9; border:red 2px solid");
		}else if (($("#email").val()=="")|| (checkInput("#email", emailPattern)===false)) {
			$("#email").focus();
			$("#email").attr("style", "background:#FFC9C9; border:red 2px solid");
		}else if (($("#password").val()=="")|| (checkInput("#password", passwordPattern)===false)) {
			$("#password").focus();
			$("#password").attr("style", "background:#FFC9C9; border:red 2px solid");
		}else if (($("#cmpny").val()=="")|| (checkInput("#cmpny", user_namePattern)===false)) {
			$("#cmpny").focus();
			$("#cmpny").attr("style", "background:#FFC9C9; border:red 2px solid");
		}
		validaForm(type_form);//validate de JS		
	});//end_CLICK_event


	// Control de seguridad para evitar que al volver atrás de la pantalla results a create, no nos imprima los datos
   $.get("module/sing_in/controller/controller_sing_in.php?load_data=true",
    
            function (response) {
                // alert(response.user);
                if (response.user === "") {
                    $("#un").val('');
                    $("#fn").val('');
                    $("#ln").val('');
                    $("#dni").val('');
                    $("#birth_date").val('');
                    $("#genere").val('');
                    $("#add1").val('');
                    $("#zip").val('');
                    $("#phone").val('');
                    $("#email").val('');
                    $("#password").val('');
                    $("#cmpny").val('');
                    $("#country").val('Select level');
                    var inputElements = document.getElementsByClassName('hob_checkbox');
                    for (var i = 0; i < inputElements.length; i++) {
                        if (inputElements[i].checked) {
                            inputElements[i].checked = false;
                        }
                    }
                    //siempre que creemos un plugin debemos llamarlo, sino no funcionará
    // $(this).fill_or_clean();
                } else {
                    $("#un").val( response.user.un);
                    $("#fn").val( response.user.fn);
                    $("#ln").val( response.user.ln);
                    $("#dni").val( response.user.dni);
                    $("#genere").val( response.user.genere);
                    $("#add1").val( response.user.add1);
                    $("#zip").val( response.user.zip);
                    $("#phone").val( response.user.phone);
                    $("#email").val( response.user.email);
                    $("#password").val( response.user.password);
                    $("#cmpny").val( response.user.cmpny);
                    $("#country").val( response.user.country);
                    var v_hobbies = response.user.interests;
                    var inputElements = document.getElementsByClassName('hob_checkbox');
                    for (var i = 0; i < v_hobbies.length; i++) {
                        for (var j = 0; j < inputElements.length; j++) {
                            if(v_hobbies[i] ===inputElements[j] )
                                inputElements[j].checked = true;
                        }
                    }
                }
            }, "json");/*end_$.get*/






	    //Dropzone function //////////////////////////////////
	    $('#dropzone').dropzone({
	        url: "module/sing_in/controller/controller_sing_in.php?upload=true",
	        addRemoveLinks: true,
	        maxFileSize: 1000,
	        dictResponseError: "Ha ocurrido un error en el server",
	        acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
	        init: function () {
	            this.on("success", function (file, response) {
	                alert(response);
	                $("#progress").show();
	                $("#bar").width('100%');
	                $("#percent").html('100%');
	                $('.msg').text('').removeClass('msg_error');
	                $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({'right': '300px'}, 300);
	            });
	        },
	        complete: function (file) {
	            if(file.status == "success"){
	            alert("El archivo se ha subido correctamente: " + file.name);
	            }
	        },
	        error: function (file) {
	            alert("Error subiendo el archivo " + file.name);
	        },
	        removedfile: function (file, serverFileName) {
	            var name = file.name;
	            $.ajax({
	                type: "POST",
	                url: "module/sing_in/controller/controller_sing_in.php?delete=true",
	                data: "filename=" + name,
	                success: function (data) {
	                    $("#progress").hide();
	                    $('.msg').text('').removeClass('msg_ok');
	                    $('.msg').text('').removeClass('msg_error');
	                    $("#e_avatar").html("");

	                    var json = JSON.parse(data);
	                    if (json.res === true) {
	                        var element;
	                        if ((element = file.previewElement) != null) {
	                            element.parentNode.removeChild(file.previewElement);
	                            alert("Imagen eliminada: " + name);
	                        } else {
	                            false;
	                        }
	                    } else { //json.res == false, elimino la imagen también
	                        var element;
	                        if ((element = file.previewElement) != null) {
	                            element.parentNode.removeChild(file.previewElement);
	                        } else {
	                            false;
	                        }
	                    }
	                }
	            });
	        }
		  });//end_dropzone
	  
});//end_DOCUMENTE.ready



function validaForm(type_form){
// alert("ddd  "+type_form);
	    var result=true;

	    
	    var un = document.getElementById('un').value;
	    var fn = document.getElementById('fn').value;
	    var ln = document.getElementById('ln').value;
	    var dni = document.getElementById('dni').value;
	    var birth_date = document.getElementById('birth_date').value;

	    var genere = document.getElementsByClassName('genere');
		for (var i = 0; i < genere.length; i++) {
	        if (genere[i].checked) {
	            v_genere = genere[i].value;
	        }
	    } 
	    var country = document.getElementById('country').value;
	    var add1 = document.getElementById('add1').value;
	    var zip = document.getElementById('zip').value;
	    var phone = document.getElementById('phone').value;
	    var email = document.getElementById('email').value;
	    var password = document.getElementById('password').value;
	    var cmpny = document.getElementById('cmpny').value;
	    var interests = [];
 		var inputElements = document.getElementsByClassName('gio_checkbox');
	    var j = 0;
	
	    for (var i = 0; i < inputElements.length; i++) {
	        if (inputElements[i].checked) {
	            interests[j] = inputElements[i].value;
	            j++;
	        }
	    }

        if (($("#un").val()=="")|| (checkInput("#un", user_namePattern)===false)) {
          	result=false;
            return false;
        }
         if (($("#fn").val()=="")|| (checkInput("#fn", namePattern)===false)) {
          result=false;
            return false;
        }
         if (($("#ln").val()=="")|| (checkInput("#ln", namePattern)===false)) {
  			result=false;
            return false;
        }
         if (($("#dni").val()=="")|| (checkInput("#dni", dniPattern)===false)) {
    		result=false;
            return false;
        }
         if (($("#birth_date").val()=="")|| (checkInput("#birth_date", datePattern)===false)) {
    		result=false;
            return false;
        }
         if (($("#add1").val()=="")|| (checkInput("#add1", addPattern)===false)) {
            result=false;
            return false;
        }
         if (($("#zip").val()=="")|| (checkInput("#zip", zipPattern)===false)) {
            result=false;
            return false;
        }
         if (($("#phone").val()=="")|| (checkInput("#phone", phonePattern)===false)) {
            result=false;
            return false;
        }
         if (($("#email").val()=="")|| (checkInput("#email", emailPattern)===false)) {
   			result=false;
   			return false;
        }
         if (($("#password").val()=="")|| (checkInput("#password", passwordPattern)===false)) {
   			result=false;
            return false;
        }
         if (($("#cmpny").val()=="")|| (checkInput("#cmpny", user_namePattern)===false)) {
            result=false;
            return false;
        }
        
        if (result) {
        var data = {"un": un,"fn": fn, "ln": ln, "dni": dni, "birth_date": birth_date,  "genere": v_genere, 
        			"country":country, "add1": add1, "zip": zip,"phone": phone, "email": email,"password": password, 
        			"cmpny": cmpny,  "interests": interests, "type_form":type_form};
 
        var data_users_JSON = JSON.stringify(data);
                   alert(data_users_JSON);

        $.post('module/sing_in/view/createUpdate_user/controller/controller_user.php',
                {alta_users_json: data_users_JSON},



        function (response) {
        	//var json2 = JSON.parse(response);
        	// alert("ffffffffffffffffff"+json2.success); 
        	console.log(response);
            if (response.success) {
            	alert(response);
                window.location.href = response.redirect; 
                //Al establecer la propiedad va a redirigir la página.
				// window.open('http://www.xyz.com'); //This will open xyz in a new window.
				// window.location.href = 'http://www.xyz.com'; //Will take you to xyz.
            }
            
        
        }, "json").fail(function(xhr, status, error) {
        	alert("tiene fallos");
            //console.log(xhr.responseText);
            console.log(xhr.responseJSON);
            
            if (xhr.responseJSON.error.un){
            	$("#un").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.un + "</span><br></div>");
            	$("#sp_un").html("<span></span>");
            }

            if (xhr.responseJSON.error.fn){
                $("#fn").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.fn + "</span><br></div>");
                $("#sp_fn").html("<span></span>");
            }

            if (xhr.responseJSON.error.ln){
                $("#ln").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.ln + "</span><br></div>");
                $("#sp_ln").html("<span></span>");
            }

            if (xhr.responseJSON.error.dni){
                $("#dni").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.dni + "</span><br></div>");
                $("#sp_dni").html("<span></span>");
            }

            if (xhr.responseJSON.error.birth_date){
                $("#birth_date").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.birth_date + "</span><br></div>");
                $("#sp_birth_date").html("<span></span>");
            }

            if (xhr.responseJSON.error.genere){
                $("#genere").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.genere + "</span><br></div>");
                $("#sp_genere").html("<span></span>");
            }

            if (xhr.responseJSON.error.country){
                $("#country").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.country + "</span><br></div>");
                $("#sp_country").html("<span></span>");
            }

            if (xhr.responseJSON.error.add1){
                $("#add1").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.add1 + "</span><br></div>");
                $("#sp_add1").html("<span></span>");
            }

            if (xhr.responseJSON.error.zip){
                $("#zip").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.zip + "</span><br></div>");
                $("#sp_zip").html("<span></span>");
            }

            if (xhr.responseJSON.error.phone){
                $("#phone").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.phone + "</span><br></div>");
                $("#sp_phone").html("<span></span>");
            }

            if (xhr.responseJSON.error.email){
                $("#email").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.email + "</span><br></div>");
                $("#sp_email").html("<span></span>");
            }

            if (xhr.responseJSON.error.password){
                $("#password").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.password + "</span><br></div>");
                $("#sp_password").html("<span></span>");
            }
            
            if (xhr.responseJSON.error.cmpny){
                $("#cmpny").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.cmpny + "</span><br></div>");
            	$("#sp_cmpny").html("<span></span>");
            }

            if (xhr.responseJSON.error.interests){
                $("#div_hobbies").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.interests + "</span><br></div>");
                $("#sp_hobbies").html("<span></span>");
            }


            
        });

        }//end if(result)	

}//end	validaForm	