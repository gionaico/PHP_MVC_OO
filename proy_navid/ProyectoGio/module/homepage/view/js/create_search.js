 $(document).ready(function () {
    var l=localStorage.getItem('productos_buscados');
    prueba(JSON.parse(l));
    var array_filtroxxx=[{province:"", city:"", product_type:"", price:"", publication_date:"", order:""}];
    localStorage.setItem('filtroDetails', JSON.stringify(array_filtroxxx));

    $( function() {
        $( "#slider-range-min" ).slider({
          range: "min",
          value: 2500,
          min: 0,
          max: 5000,
          step: 50,
          slide: function( event, ui ) {
            $( "#amount" ).val(ui.value+ " €" );
            var str=$( "#amount" ).val();
            console.log(str);
           CrearArrayPushLocalStorage("price","price<"+str+"");
            peticion();
          }
        });
        $( "#amount" ).val($( "#slider-range-min" ).slider( "value" )+ " €" );
        console.log($( "#amount" ).val());
    });

    $('.publication_date').click(function() {
        var id = this.getAttribute('id');
        var elemento = document.getElementById(""+id+"");
        elemento.className += " active";
        if (id=="1") {
          var text="0";
        }else if (id=="2") {
          var text="8";  
        }else if (id=="3") {
          var text="30";  
        }else if (id=="4") {
          var text="365";  
        }
        CrearArrayPushLocalStorage("publication_date", text);
        peticion();
        /* Act on the event */
    });

    $('#order').change(function() {
        var order = document.getElementById('order').value;
        if (order!="Order by") {          
            if (order=="Price: Low to High") {
              var text="ORDER BY price ASC";  
            }else if (order=="Price: High to Low") {
              var text=" ORDER BY price DESC";  
            }else if (order=="Newest Arrivals") {
              var text="ORDER BY date_today DESC";  
            }
            CrearArrayPushLocalStorage("order", text);
            peticion();
        }
        //alert(order);
    });

    $('#province_home').change(function() {
        // if ($(this).val()==="") {
        //     editaArray("province");
        //     console.log("igual");
        // }else{            
            CrearArrayPushLocalStorage("province", "province='"+$(this).val()+"'");
        //}
        peticion();
        console.log($(this).val());
    });

    $('#city_home').change(function() {
        console.log($(this).val());
        // if ($(this).val()==="Product Type:") {
        //     editaArray("city");
        //     console.log("igual");
        // }else{
            CrearArrayPushLocalStorage("city", "city='"+$(this).val()+"'");
        //}
        peticion();
        
    });


    $('#product_type').change(function() {
        console.log($(this).val());
        console.log($(this).val());
        if ($(this).val()==="Product Type:") {
            editaArray("product_type");
            console.log("igual");
        }else{
            CrearArrayPushLocalStorage("product_type", "product_type='"+$(this).val()+"'");
        }
        peticion();
    });

    
        
 
//delete array_filtro.element_name;//borra un elemento 
 localStorage.removeItem("datos");
 localStorage.removeItem("data");

var array_filtro=[];
    var p="pepe";
    array_filtro.push({ [""+p+""]:"pepe='juan'"});  
    localStorage.setItem("datos", JSON.stringify(array_filtro));

        var local_1=localStorage.getItem('datos');
        var json=JSON.parse(local_1);
//var array_filtro2=[];
    // var p="pepe='juan'";
    if (!json['oeeee']) {
        console.log("ddd");
    }else{
        console.log("kkhkhhk");
    json.push({"o":"pepe='zsfsafsdf'"});  
    localStorage.setItem("datos", JSON.stringify(json));
    }
//var udos=JSON.stringify(array_filtro); pasa un objeto a String
console.log(JSON.parse(localStorage.getItem('datos'))[0]);

        console.log(json);
        
    


    
}); //Document.ready   


function CrearArrayPushLocalStorage(campoName, contenido){ 
    var local_1=localStorage.getItem('filtroDetails');
    var array_filtro=JSON.parse(local_1); 
    //console.log(JSON.parse(local_1));

    // if (array_filtro[0][''+campoName+'']!="undefined") {
    //     console.log(array_filtro[0]['province']);
        array_filtro[0][""+campoName+""]=contenido;  
        localStorage.setItem("filtroDetails", JSON.stringify(array_filtro)); //guarda algo en local storage
    //}
        
}


function editaArray(elemento){

   var pru=localStorage.getItem("filtroDetails");
   var json_filtro = JSON.parse(pru);
    
   
   console.log(JSON.parse(pru));
   //console.log(json_filtro[0]);
   
   json_filtro[0][""+elemento+""]="";
   console.log(json_filtro);

   var nuevo_json=JSON.stringify(json_filtro);
   localStorage.setItem("filtroDetails", nuevo_json);
   
}

function peticion(){
    var filtro=localStorage.getItem("filtroDetails");
    
    

    $.post('module/homepage/controller/controller_homepage.php?homepage=filtro',
             {"filtro": filtro},
    function(response){
        console.log(response);
        var json_cont2 = JSON.parse(response);
        console.log(json_cont2);
         prueba();
           
    }).fail(function() {
        alert( "recepcion de datos fallida en boton detalles producto" );
         });

}

function prueba(jsonc){
 

 $.post('module/homepage/controller/controller_homepage.php?homepage=cargadatos',
             
 function(response){
         var json = JSON.parse(response);
         console.log(json);
           
 



        var div_resultado=document.getElementById('resultado');
        div_resultado.innerHTML="";
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
                    button.setAttribute("class", "btn btn-primary col-md-12 prodToBasket btnDetaills2");
                var button2=document.createElement("button");
                    button2.setAttribute("name", json[i].cod_pro); 
                    button2.setAttribute("class", "btn btn-warning prodToDetaills col-md-12 btnDetaills2"); 
                    button2.setAttribute("data-toggle", "modal"); 
                    button2.setAttribute("data-target", "#modal_productsDetails");

                var button3=document.createElement("button");
                    button3.setAttribute("class", "btn btn-success col-md-12 allDeta btnDetaills2");
                    button3.setAttribute("id", json[i].cod_pro);
                    //             <p>
                    //   <a href="#" class="btn btn-primary" role="button">Botón</a>
                    //   <a href="#" class="btn btn-default" role="button">Botón</a>
                    // </p>
                    parr1.innerHTML="<strong>User: </strong>"+json[i].user;
                    parr2.innerHTML="<strong>Title: </strong>"+json[i].title;
                    parr3.innerHTML="<strong>Phone: </strong>"+json[i].phone;
                    parr4.innerHTML="<strong>Email: </strong>"+json[i].email;
                    parr5.innerHTML="<strong>Publication Date: </strong>"+json[i].publication_date;
                    parr6.innerHTML="<strong>Price: </strong>"+json[i].price+"<strong> €</strong>";
                    //parr7.innerHTML="<button id='"+json[i].cod_pro+"' class='btn btn-primary prodToBasket' type='button'>Add to <span class='glyphicon glyphicon-shopping-cart'></span>    </button>";
                    button.innerHTML="Add to <span class='glyphicon glyphicon-shopping-cart'></span>";
                    button2.innerHTML="Quick details <span class='glyphicon glyphicon-eye-open'></span>  ";
                    button3.innerHTML="All Details <span class='glyphicon glyphicon-eye-open'></span>  ";

                    parr7.appendChild(button);
                    parr7.appendChild(button2);
                    parr7.appendChild(button3);
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
        }//end for

        $('.allDeta').click(function() {
            var id = this.getAttribute('id');
            localStorage.setItem("productoSeleccionado", id);
            // alert(id);
            window.location.href="http://localhost/proy_navid/ProyectoGio/index.php?page=homepage&view=product";
        });
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
                  
                }).fail(function() {
                    alert( "recepcion de datos fallida en boton detalles producto" );
                });
         });//end_prodToDetaills
        }).fail(function() {
        alert( "recepcion de datos fallida en boton detalles producto" );
         });
 }