$.post("module/basket/controller/controller_basket.php?basket=menu_basket",
	function(response){
		console.log(response);
		// var json_cont = JSON.parse(response);
		 var basket2=document.getElementById('cont_prod');
        basket2.innerHTML=response;//json_cont;   
	}).fail(function() {
        alert( "recepcion de datos fallida en boton detalles producto" );
    });
