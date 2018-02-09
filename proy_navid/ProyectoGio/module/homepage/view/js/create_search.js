 $(document).ready(function () {
        var local_1=localStorage.getItem('productos_buscados');
        var json=JSON.parse(local_1);
        console.log(json);
    

        var div_resultado=document.getElementById('resultado');

        var cont=0;
        for (var i=0; i<json.length; i++) {
            
            if ((i==0)||((i%3)==0)) {
                var div_row=document.createElement("div");
                div_row.setAttribute("class", "row");
                // div_row.setAttribute("id", i);
            }

            if (cont>4) {
                cont=0;
            }
            if (cont<=4) {
                cont++;

                var div_col=document.createElement("div");
                div_col.setAttribute("class", "col-md-4");

                var div_thumbnail=document.createElement("div");
                div_thumbnail.setAttribute("class", "team-img thumbnail v_pro");
                
                var div_img=document.createElement("div");
                div_img.setAttribute("class", "div_imagen");


                var img=document.createElement("img");
                    img.setAttribute("src", json[i].avatar);
                    img.setAttribute("class", "img_pro");

                var div_content=document.createElement("div");
                    div_content.setAttribute("class", "team-content text_pro");

                var h=document.createElement("h3");
                    h.innerHTML=json[i].product_type;

                var border_team=document.createElement("div");
                    border_team.setAttribute("class", "border-team")

                var parr0=document.createElement("p");
                var parr1=document.createElement("p");
                var parr2=document.createElement("p");
                var parr3=document.createElement("p");
                var parr4=document.createElement("p");
                var parr5=document.createElement("p");
                var parr6=document.createElement("p"); 
                var parr7=document.createElement("p");
                var button=document.createElement("button");
                    button.setAttribute("id", json[i].cod_pro);
                    button.setAttribute("price", json[i].price);
                    button.setAttribute("title", json[i].title); 
                    button.setAttribute("class", "btn btn-primary prodToBasket");
                var button2=document.createElement("button");
                    button2.setAttribute("name", json[i].cod_pro); 
                    button2.setAttribute("class", "btn btn-warning prodToDetaills"); 
                    button2.setAttribute("data-toggle", "modal"); 
                    button2.setAttribute("data-target", "#modal_productsDetails");
        //             <p>
        //   <a href="#" class="btn btn-primary" role="button">Botón</a>
        //   <a href="#" class="btn btn-default" role="button">Botón</a>
        // </p>
                    parr1.innerHTML="<strong>User: </strong>"+json[i].user;
                    parr2.innerHTML="<strong>Title: </strong>"+json[i].title;
                    parr3.innerHTML="<strong>Phone: </strong>"+json[i].phone;
                    parr4.innerHTML="<strong>Email: </strong>"+json[i].email;
                    parr5.innerHTML="<strong>Publication Date: </strong>"+json[i].date;
                    parr6.innerHTML="<strong>Price: </strong>"+json[i].price+"<strong> €</strong>";
                    //parr7.innerHTML="<button id='"+json[i].cod_pro+"' class='btn btn-primary prodToBasket' type='button'>Add to <span class='glyphicon glyphicon-shopping-cart'></span>    </button>";
                    button.innerHTML="Add to <span class='glyphicon glyphicon-shopping-cart'></span>";
                    button2.innerHTML="Details <span class='glyphicon glyphicon-eye-open'></span>  ";

                    parr7.appendChild(button);
                    parr7.appendChild(button2);
                    div_row.appendChild(div_col);
                    div_col.appendChild(div_thumbnail);
                    div_thumbnail.appendChild(div_img);
                    div_img.appendChild(img);

                    div_thumbnail.appendChild(div_content);
                    div_content.appendChild(h);
                    div_content.appendChild(border_team);
                    div_content.appendChild(parr5);
                    div_content.appendChild(parr1);
                    div_content.appendChild(parr2);
                    div_content.appendChild(parr3);
                    div_content.appendChild(parr4);
                    div_content.appendChild(parr6);
                    div_content.appendChild(parr7);

        // data-toggle="modal" data-target="#modal_login"


            }

            if ((i%3)==0) {
             div_resultado.appendChild(div_row);   
            }
        }
        /*AGREGAR AL CARRITO-------------------------------------------------------*/
        $('.prodToBasket').click(function(){
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






        /*Ver detalles del producto---------------------------------------------------*/
        $('.prodToDetaills').click(function(){
            var id = this.getAttribute('name');
            //tengo que hacer una consulta nueva para imrimir los detalles en el modal
            console.log(id);
                $.post("module/homepage/controller/controller_homepage.php?homepage=prodToDetaills&id="+id,
                    
                 function (response) {
                    console.log(response);
                   var json_p = JSON.parse(response);
                         //console.log(json[0]["product"]);
                         console.log(json_p['user_name']);
                         //console.log(json.length);
            //             console.log(json.length);
            //             
                $("#description").html(json_p['description']);
                $("#title").html(json_p['title']);
                $("#country").html(json_p['country']);
                $("#province").html(json_p['province']);
                $("#city").html(json_p['city']);
                $("#address").html(json_p['address']);
                $("#phone").html(json_p['phone']);
                $("#email").html(json_p['email']);
                $("#brand").html(json_p['brand']);
                $("#model").html(json_p['model']);
                $("#year").html(json_p['year']);
                $("#combustible").html(json_p['combustible']);
                $("#color").html(json_p['color']);


             
                  
                }).fail(function() {
                    alert( "recepcion de datos fallida en boton detalles producto" );
                });
         });//end_prodToDetaills
    
}); //Document.ready   