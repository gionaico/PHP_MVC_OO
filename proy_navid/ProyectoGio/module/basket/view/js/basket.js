	$.post("module/basket/controller/controller_basket.php?basket=menu_basket",
		function(response){
			console.log(response);
			var json_cont = JSON.parse(response);
			var basket2=document.getElementById('cont_prod');
	        basket2.innerHTML=json_cont;   
		}).fail(function() {
	        alert( "recepcion de datos fallida en boton detalles producto" );
	    });


$(document).ready(function () {

		var tabla=document.getElementById('tab_comprar');
		var tr1=document.createElement("tr");
		var td1=document.createElement("td");
		var td2=document.createElement("td");
		var td3=document.createElement("td");

		td1.innerHTML="pepon";
        td2.innerHTML=15;
        td3.innerHTML=5;
        tr1.appendChild(td1);
        tr1.appendChild(td2);
        tr1.appendChild(td3);
        tabla.appendChild(tr1);
});
