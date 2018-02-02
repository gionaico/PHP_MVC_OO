$(document).ready(function () {
// $('#tab_comprar').DataTable();
$.post("module/basket/controller/controller_basket.php?basket=view_basket",
	function(response){
		 var json_cont2 = JSON.parse(response);
		console.log(json_cont2);


		var tabla_carrito=document.getElementById('body_comprar');
		for (var i = 0; i < json_cont2.length; i++) {
			var tr1=document.createElement("tr");
			tr1.setAttribute("id", "tr_"+i);
			var td1=document.createElement("td");
			var td2=document.createElement("td");
			var td3=document.createElement("td");
			var select=document.createElement("select");
			select.setAttribute("class", "select_quantity");
			select.setAttribute("id", json_cont2[i]['id']);
			var td4=document.createElement("td");
			td4.setAttribute("id", json_cont2[i]['id']);
			var td5=document.createElement("td");
			var button=document.createElement("button");
			button.setAttribute("id", json_cont2[i]['id']);
			button.setAttribute("tr", "tr_"+i);
			button.setAttribute("class", "btn btn-danger delete_product");


			td1.innerHTML=json_cont2[i]['title'];
	        td2.innerHTML=json_cont2[i]['price']+" $";
	        td4.innerHTML=(json_cont2[i]['price']*json_cont2[i]['quantity'])+" $";
	        button.innerHTML="Delete";

	        td5.appendChild(button);

	        tr1.appendChild(td1);
	        tr1.appendChild(td2);
	        tr1.appendChild(td3);
	        tr1.appendChild(td4);
	        tr1.appendChild(td5);

	         
	          for(var j = 1; j <=10; j++){
	          	var option=document.createElement("option");
	          	option.setAttribute("value", ""+j+"");
	          	if (j==json_cont2[i]['quantity']) {
	          		option.setAttribute("selected", "");
	          	}
	          	option.innerHTML=j;
	          	select.appendChild(option);
	           
	          }

	          select.appendChild(option);
        td3.appendChild(select);
        
        tabla_carrito.appendChild(tr1);
        
		}
		$(".select_quantity").change(function() {
			var id = this.getAttribute('id');
			var value = $(this).val();
	       alert("cambia "+id+" "+value);
	       /*------------------------------------------en prueba----------------------------------------------------*/
	       /////
	       	var data = {"id": id, "quantity": value};
        	var data_JSON = JSON.stringify(data);

                   alert(data_JSON);
    


	       $.post("module/basket/controller/controller_basket.php?basket=select_quantity",
                {"dataProd_json": data_JSON},
			function(response){
				 	console.log(response);
				 	
				 	$.post("module/basket/controller/controller_basket.php?basket=menu_basket",
					function(response){
						console.log(response);
						// var json_cont = JSON.parse(response);
						 var basket2=document.getElementById('cont_prod');
				        basket2.innerHTML=response;//json_cont;   
					}).fail(function() {
				        alert( "recepcion de datos fallida en boton detalles producto" );
				    });
				 // 	var json_cont2 = JSON.parse(response);
					// console.log(json_cont2);
				   
			}).fail(function() {
			       alert( "recepcion de datos fallida en boton detalles producto" );
			   });
			////
			/*------------------------------------------en prueba----------------------------------------------------*/
    	});

		$(".delete_product").click(function() {
			var id = this.getAttribute('tr');
			$("#"+id).remove();
	       alert("delete "+id);

    	});

		   
	}).fail(function() {
        alert( "recepcion de datos fallida en boton detalles producto" );
    });


		// var tabla_carrito=document.getElementById('body_comprar');

		// var tr1=document.createElement("tr");
		// var td1=document.createElement("td");
		// var td2=document.createElement("td");
		// var td3=document.createElement("td");
		// var select=document.createElement("select");
		

		// td1.innerHTML="pepon";
  //       td2.innerHTML=15;
  //       td3.innerHTML=5;

  //       tr1.appendChild(td1);
  //       tr1.appendChild(td2);
  //       tr1.appendChild(td3);

         
  //         for(var i = 1; i <=10; i++){
  //         	var option=document.createElement("option");
  //         	option.setAttribute("value", ""+i+"");
  //         	option.innerHTML=i;
  //         	select.appendChild(option);
           
  //         }



  //       var tr2=document.createElement("tr");
		// var td11=document.createElement("td");
		// var td22=document.createElement("td");
		// var td33=document.createElement("td");

		// td11.innerHTML="tetete";
  //       td22.innerHTML=1596;
  //       td33.innerHTML=59;

  //       select.appendChild(option);
  //       td3.appendChild(select);
  //       tr2.appendChild(td11);
  //       tr2.appendChild(td22);
  //       tr2.appendChild(td33);
  //       tabla_carrito.appendChild(tr1);
  //       tabla_carrito.appendChild(tr2);

});
