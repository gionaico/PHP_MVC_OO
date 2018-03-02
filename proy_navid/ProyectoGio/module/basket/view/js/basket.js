$(document).ready(function () {
// $('#tab_comprar').DataTable();

var worldToFind=localStorage.getItem('worldToFind');
//alert(worldToFind);
var script=document.getElementById('script_api');
var divApi=document.getElementById('results_api');
script.setAttribute("src", "https://svcs.ebay.com/services/search/FindingService/v1?SECURITY-APPNAME=giovanny-Proyecto-PRD-9134e8f72-11cd8019&OPERATION-NAME=findItemsByKeywords&SERVICE-VERSION=1.0.0&RESPONSE-DATA-FORMAT=JSON&callback=_cb_findItemsByKeywords&REST-PAYLOAD&keywords="+worldToFind+" para coche&paginationInput.entriesPerPage=6&GLOBAL-ID=EBAY-ES&siteid=186");
divApi.appendChild(script);









	var containers_tabla=document.getElementsByClassName('tabla_basket1');

	if (localStorage.getItem('productos_carrito') ) {
		var json=localStorage.getItem('productos_carrito');
		

		//     var data_JSON = JSON.stringify(data);
		$.post('module/basket/controller/controller_basket.php?basket=total',
		            {"json_cont2": json},
		function(response){
			 	
				console.log(response);
			var sumaApagar=response;
			var json_1 = JSON.parse(response);
			var json_cont2 = json_1[0];
				console.log(json_1[1]);

			if ((json_cont2) && (json_cont2.length>0)) {
				
				var parrafo=document.getElementById('p_basket');
				parrafo.style.display='none';
				for (var i =0 ; i <containers_tabla.length; i++) {
					containers_tabla[i].style.display='';
				}

				console.log(json_cont2);
				var totalPagar=document.getElementById('totalPagar');
				var pagoTotal=0;
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
					td4.setAttribute("id", "td"+json_cont2[i]['id']);
					var td5=document.createElement("td");
					var button=document.createElement("button");
					button.setAttribute("id", json_cont2[i]['id']);
					button.setAttribute("tr", "tr_"+i);
					button.setAttribute("class", "btn btn-danger delete_product");


					td1.innerHTML=json_cont2[i]['title'];
			        td2.innerHTML=json_cont2[i]['price']+" $";
			        td4.innerHTML=(json_cont2[i]['price']*json_cont2[i]['quantity'])+" $";
			        pagoTotal=pagoTotal+(json_cont2[i]['price']*json_cont2[i]['quantity']);
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
				totalPagar.innerHTML=json_1[1]+" $";
				// console.log(typeof(pagoTotal));
				//console.log(typeof(pagoTotal.toFixed( 2 )));

				$(".select_quantity").change(function() {
					var id = this.getAttribute('id');
					var value = $(this).val();
					//parseInt(cantidad_ac, 10)
			       // alert("cambia "+id+" "+value);
			       /*------------------------------------------Pintar en Navegador----------------------------------------------------*/
			       ////////////////////////////////////////////
			       // for (var i =0; i <json_cont2.length; i++) {
			       //      if (json_cont2[i]['id']==id) {
			       //      	var price_producto=json_cont2[i]['price'];
			       //          json_cont2[i]['quantity']=parseInt(value, 10);
			       //      }
			       //  }

			       //  var nuevo_json=JSON.stringify(json_cont2);
		        //     	localStorage.setItem("productos_carrito", nuevo_json);

		        //     var carrito_3=localStorage.getItem('productos_carrito');
		        //    	var json_menu = JSON.parse(carrito_3);
		        //     // alert(json[0]['quantity']);
		             
		             
		            
		        //     var total=0;
		        //     var cantidad_ac=0;
		        //     var precio=0;
		        //     var suma_precio=0;
		        //     for (var i=0; i <json_menu.length ; i++) { 
		        //          cantidad_ac=json_menu[i]['quantity'];
		        //          total=total+cantidad_ac;
		        //          precio=parseFloat(json_menu[i]['price']);
		        //          suma_precio=suma_precio+(cantidad_ac*precio);
		        //     }
		        ///////////////////////////////////////////////////////////////

		        // var data = {"id": id, "quantity":value};
		        // var array=[data];


		        var inputElements = document.getElementsByClassName('select_quantity');
			    var array = [];
			
			    for (var i = 0; i < inputElements.length; i++) {
			    	var data = {"id": inputElements[i].getAttribute('id'), "quantity":inputElements[i].value};
			        array[i]=data;
			    }	
			    console.log(array);
				var json = JSON.stringify(array);
				$.post('module/basket/controller/controller_basket.php?basket=total',
				            {"json_cont2": json},
				function(response){
					 	
					console.log(response);
					var json_7=JSON.parse(response);
					totalPagar.innerHTML=json_7[1]+" $";
					var sumaQuantity=0;
					for (var i =0; i <json_7[0].length; i++) {
			            sumaQuantity=sumaQuantity+(parseInt(json_7[0][i]['quantity']));
			            if (json_7[0][i]['id']==id) {			            	
				            var priceUnidades=document.getElementById("td"+id); 
							priceUnidades.innerHTML=(parseInt(json_7[0][i]['quantity']*parseInt(json_7[0][i]['price'])))+" $";
			            }
			        }  
			        var basket2=document.getElementById('cont_prod');
		            basket2.innerHTML=sumaQuantity;

			        var nuevo_json=JSON.stringify(json_7[0]);
		            localStorage.setItem("productos_carrito", nuevo_json);
				}).fail(function() {
				       alert( "recepcion de datos fallida en boton detalles producto" );
			   		});

		            // alert(total);
		   //          var basket2=document.getElementById('cont_prod');
		   //                  basket2.innerHTML=total;
					// ////
					// ----------------------------------------------------------------------------------------------
					// var priceUnidades=document.getElementById("td"+id); 
					// priceUnidades.innerHTML=(price_producto*parseFloat($(this).val()))+" $";
					// totalPagar.innerHTML=suma_precio+" $";
					//alert(priceUnidades);	

		    	});

				$(".delete_product").click(function() {
					var id_fila = this.getAttribute('tr');
					$("#"+id_fila).remove();
			       // alert("delete "+id);
			       var id_producto=this.getAttribute('id');
			       
			       var carrito_delete_product=localStorage.getItem('productos_carrito');
			       var json_delProd = JSON.parse(carrito_delete_product);
			        
			       for (var i=0; i <json_delProd.length ; i++) { 
			            if (json_delProd[i]['id']==id_producto) {
		                    var posicion=i;
		                }
			       }
			       json_delProd.splice(posicion,1);

			       var nuevo_json=JSON.stringify(json_delProd);
		           localStorage.setItem("productos_carrito", nuevo_json);
			      //alert(this.getAttribute('id'));
			       /*------------------------------------------Pintar en Navegador----------------------------------------------------*/
			       /////
			       var carrito_delete2=localStorage.getItem('productos_carrito');
			       var json_delPro = JSON.parse(carrito_delete2);
			        var total=0;
		            var cantidad_ac=0;
		                 var precio=0;
					var suma_precio=0;
		            for (var i=0; i <json_delPro.length ; i++) { 
		                 cantidad_ac=json_delPro[i]['quantity'];
		                 total=total+parseInt(cantidad_ac);
						precio=parseFloat(json_delPro[i]['price']);
						suma_precio=suma_precio+(cantidad_ac*precio);
		                 //total=total+(parseInt(cantidad_ac, 10));
		            }



		            // alert(total);
		            var basket2=document.getElementById('cont_prod');
		                    basket2.innerHTML=total;
					totalPagar.innerHTML=suma_precio+" $";
		            ////
					/*----------------------------------------------------------------------------------------------*/

		    	});

		    	$('#pay_products').click(function() {
		    		var usuarioLogeado=sessionStorage.getItem('app-usuarioLogeado');//llega en string
		    		if ((typeof(usuarioLogeado) == "undefined") || (usuarioLogeado == null)) {
			    		$('#modal_login').modal('show'); // abrir
			       		var info_logPro=document.getElementById('info_pay');
			            info_logPro.style.display='block';
			        }else{
				       console.log("paga de usuario "+usuarioLogeado);
				    //    var precio_peddido=(document.getElementById('totalPagar').innerHTML);
				    //    var productosPedido=localStorage.getItem('productos_carrito');
				    //     console.log( JSON.parse(productosPedido));


				    //    var data = {"precio_peddido": precio_peddido, "user": usuarioLogeado};
					   // var jsonPedido = JSON.stringify(data);
					   	var inputElements = document.getElementsByClassName('select_quantity');
			    		var array = [];
			    		for (var i = 0; i < inputElements.length; i++) {
					    	var data = {"id": inputElements[i].getAttribute('id'), "quantity":inputElements[i].value};
					        array[i]=data;
					    }	
					    console.log(array);
						var json = JSON.stringify(array);

					               //alert(jsonPedido);
						$.post('module/basket/controller/controller_basket.php?basket=t_pedidos',
						 {"datosCompra":json},
						function(response){
								console.log(response);
							 	var json = JSON.parse(response);
								console.log(json.success);
							 	if (json.success) {
							 		localStorage.removeItem("productos_carrito");
							 		alert(json.resultado);
							 		window.location.href ="index.php";
							 	}else{
							 		alert(json.resultado);
							 	}
							 	//alert(response);
							   
						}).fail(function() {
						       alert( "recepcion de datos fallida en boton detalles producto" );
						   });
				    }
			    		
				   
		    	});

		    }//end carga datos
			   
		}).fail(function() {
		       localStorage.removeItem("productos_carrito");
		       alert( "Fallo de seguridad. Imposible identificar algunos productos" );
	   		});
	}



	
    // 	var totalPagar=document.getElementById('div_carrito');
    	
     


});
