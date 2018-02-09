
$(document).ready(function () {
	$(".efectoActive").mouseover(function(){
		
		$(this).attr("style", "background:#ffb901;")
    });
    $(".efectoActive").mouseout(function(){
		$(this).attr("style", "")
    });
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