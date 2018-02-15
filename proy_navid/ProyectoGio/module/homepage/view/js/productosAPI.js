$(document).ready(function() {
	var productoSeleccionado=localStorage.getItem('productoSeleccionado');
	var data = {"id": productoSeleccionado};
    var data_JSON = JSON.stringify(data);

	$.post('module/homepage/controller/controller_homepage.php?homepage=vistaProducto',
	            {"data": data_JSON},
	function(response){
			// console.log(response);
		 	var json_cont2 = JSON.parse(response);
			console.log(json_cont2);
		   	
		   	var price=document.getElementById('price');
		   	price.innerHTML=json_cont2['price'];
		   	var publicationDate=document.getElementById('publicationDate');
		   	publicationDate.innerHTML=json_cont2['date_today'];
			var vendedor=document.getElementById('vendedor');
			vendedor.innerHTML=json_cont2['user_name'];
			var fotoProducto=document.getElementById('fotoProducto');
			fotoProducto.setAttribute('src', json_cont2['avatar']);
			var titulo=document.getElementById('titulo');
			titulo.innerHTML=json_cont2['title'];
			var description=document.getElementById('description');
			description.innerHTML=json_cont2['description'];
			var buyNOW=document.getElementById('buyNOW');
			buyNOW.setAttribute('id',json_cont2['cod_pro']);
			buyNOW.setAttribute('price',json_cont2['price']);
			buyNOW.setAttribute('title',json_cont2['title']);

			var worldToFind=json_cont2['title'];
	//alert(worldToFind);
			var script=document.getElementById('script_apiProd');
			var divApi=document.getElementById('pruductosAPI');
			script.setAttribute("src", "https://svcs.ebay.com/services/search/FindingService/v1?SECURITY-APPNAME=giovanny-Proyecto-PRD-9134e8f72-11cd8019&OPERATION-NAME=findItemsByKeywords&SERVICE-VERSION=1.0.0&RESPONSE-DATA-FORMAT=JSON&callback=_cb_findItemsByKeywords&REST-PAYLOAD&keywords="+worldToFind+"&paginationInput.entriesPerPage=6&GLOBAL-ID=EBAY-ES&siteid=186");
			divApi.appendChild(script);


			$('.addCarrito').click(function(){
            var id = this.getAttribute('id');
            // console.log(id);
            var price = this.getAttribute('price');
            var title = this.getAttribute('title');


           //localStorage.removeItem("productos_carrito");
            var carritoLocalStor=localStorage.getItem('productos_carrito');

            if (carritoLocalStor) {
                console.log("existe");
                var repetido=false;
                var array_1=JSON.parse(carritoLocalStor);
                for (var i =0; i <array_1.length; i++) {
                    if (array_1[i]['id']==id) {
                        var catidad_actual=array_1[i]['quantity'];
                        array_1[i]['quantity']=(catidad_actual+1);
                        repetido=true;
                    }

                }


                if (repetido) {
                    var nuevo_json=JSON.stringify(array_1);
                    localStorage.setItem("productos_carrito", nuevo_json);
                }else{
                    var nuevo_producto = {
                                'id' : id,
                                'price' : price ,
                                'title' : title,
                                'quantity' : 1
                            
                        }
                    
                    array_1.push(nuevo_producto);
                    console.log(array_1);
                    var array_prod=JSON.stringify(array_1);
                    //localStorage.removeItem("productos_carrito");
                    localStorage.setItem("productos_carrito", array_prod);

                    //var carritoLocalStor=localStorage.getItem('productos_carrito');
                    
                }


                
            }else{
                console.log("existe nooo");
                var productosCarrito = new Array;
                var nuevo_producto = {
                            'id' : id,
                            'price' : price ,
                            'title' : title,
                            'quantity' : 1 
                        
                    }
                productosCarrito.push(nuevo_producto);

                var array_prod=JSON.stringify(productosCarrito);
                localStorage.setItem("productos_carrito", array_prod);

                // var carritoLocalStor=localStorage.getItem('productos_carrito');
                //  var array_1=JSON.parse(carritoLocalStor);
                //  alert("ssssssssss");
                // console.log(array_1);
            }

            var carrito_3=localStorage.getItem('productos_carrito');
            var json_3 = JSON.parse(carrito_3);
            // alert(json[0]['quantity']);
            var total=0;
            var cantidad_ac=0;
            for (var i=0; i <json_3.length ; i++) { 
                 cantidad_ac=json_3[i]['quantity'];
                 total=total+cantidad_ac;
                 //total=total+(parseInt(cantidad_ac, 10));
            }
            // alert(total);
            var basket2=document.getElementById('cont_prod');
                    basket2.innerHTML=total;


         });
	}).fail(function() {
	       alert( "recepcion de datos fallida en boton detalles producto" );
   		});

	
});