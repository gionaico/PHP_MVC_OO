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

$('#saveName').click(function(){
	var namePattern="^[a-zA-Z]{3,}$";
	var check=checkInput("#new_name", namePattern);
	alert(check);
});

});//end document.ready	

function checkInput(idInput, pattern) {
  return $(idInput).val().match(pattern) ? true : false;
}