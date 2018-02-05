// $.post("module/basket/controller/controller_basket.php?basket=menu_basket",
// 	function(response){
// 		console.log(response);
// 		// var json_cont = JSON.parse(response);
// 		 var basket2=document.getElementById('cont_prod');
//         basket2.innerHTML=response;//json_cont;   
// 	}).fail(function() {
//         alert( "recepcion de datos fallida en boton detalles producto" );
//     });
$(document).ready(function () {
	if (localStorage.getItem('productos_carrito')) {
		var carrito=localStorage.getItem('productos_carrito');
		var json = JSON.parse(carrito);
		// alert(json[0]['quantity']);
		var total=0;
		var cantidad_ac=0;
		for (var i=0; i <json.length ; i++) { 
		     cantidad_ac=json[i]['quantity'];
		     total=total+cantidad_ac;
		}
		// alert(total);
		var basket2=document.getElementById('cont_prod');
		        basket2.innerHTML=total;
	}else{
		var basket2=document.getElementById('cont_prod');
		        basket2.innerHTML=0;
	}	        
}); //Document.ready   	        