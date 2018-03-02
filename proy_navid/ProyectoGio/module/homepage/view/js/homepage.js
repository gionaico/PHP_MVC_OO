var coches_brand = new Array("Mercedez", "Mazda", "Toyora", "Bmw", "Ford", "Fiat", "Volvo", "Chevrolet", "Audi");
var coches_model = new Array("Mondeo", "Alaska", "Fiesta", "Corola", "Bravo", "Uno", "Ranch", "Ibiza", "Monaco");
var coches_year = new Array(2001, 2005, 2010, 2015, 2003, 2008, 2013, 2009, 2014, 2001);
var coches_color = new Array("Black", "White", "Golden", "Silver", "Red", "Blue", "Green", "Yellow", "Purple");
var coches_combustible = new Array("Petrol", "Gasoil");
var coches_owner = new Array("Agency", "Person");


// var num_car=Math.round(Math.random()*5);
// console.log(num_car);

$(document).ready(function() {

if ( window.location.href!="http://localhost/proy_navid/ProyectoGio/index.php?page=homepage&view=search") {


	$.post("module/homepage/controller/controller_homepage.php?homepage=ultimos_productos",	            
	function(response){
		console.log(response);
		 	var json_cont2 = JSON.parse(response);
			console.log(json_cont2);
			
			// var div_row = document.createElement("div");
   //      	div_row.setAttribute("class", "row");
        	var cont=0;	
        	for (var i =0 ; i <json_cont2.length; i++) {
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

                 var a=document.createElement('a');
                a.setAttribute("class", "a_producto");
                a.setAttribute("id", json_cont2[i]['cod_pro']);
                a.setAttribute("style", "color:black");


	            var div_col = document.createElement("div");
	            div_col.setAttribute("class", "col-md-4");
        		var div_thumbnail = document.createElement("div");
	            div_thumbnail.setAttribute("class", "team-img thumbnail");

	            var div_img=document.createElement("div");
                        

	            var img = document.createElement("img");
	            img.setAttribute("src", json_cont2[i]['avatar']);
	            img.setAttribute("class", "img_pro2");
                

	            var div_content = document.createElement("div");
	            div_content.setAttribute("class", "team-content");

	            var h = document.createElement("h3");
	            h.innerHTML = json_cont2[i]['product_type'];

	            var border_team = document.createElement("div");
	            border_team.setAttribute("class", "border-team")

	            var parr0 = document.createElement("p");
	            var parr1 = document.createElement("p");
	            var parr2 = document.createElement("p");
	            var parr3 = document.createElement("p");
	            var parr4 = document.createElement("p");
                var parr5 = document.createElement("p");

                parr1.innerHTML = "<strong>Publication Date </strong>" + json_cont2[i]['publication_date'];
                parr2.innerHTML = "<strong>Product: </strong>" + json_cont2[i]['title'];
                parr3.innerHTML = "<strong>Price: </strong>" + json_cont2[i]['price'];
                parr4.innerHTML = "<strong>Mobile phone: </strong>" + json_cont2[i]['phone'];
                parr5.innerHTML = "<strong>City: </strong>" + json_cont2[i]['city'];


                var div_dummies = document.getElementById("dummies");
                div_row.appendChild(a);
                a.appendChild(div_col);
                div_col.appendChild(div_thumbnail);
                div_thumbnail.appendChild(div_img);
                div_img.appendChild(img);
                div_thumbnail.appendChild(div_content);
                div_content.appendChild(h);
                div_content.appendChild(border_team);
                div_content.appendChild(parr1);
                div_content.appendChild(parr2);
                div_content.appendChild(parr3);
                div_content.appendChild(parr4);
                div_content.appendChild(parr5);

                // div_dummies.appendChild(div_row);
                }
                if ((i%3)==0) {
                 div_dummies.appendChild(div_row);   
                }
           }       

        $('.a_producto').click(function() {
            var id = this.getAttribute('id');
            localStorage.setItem("productoSeleccionado", id);
            // alert(id);
            window.location.href="http://localhost/proy_navid/ProyectoGio/index.php?page=homepage&view=product";
        });

    }).fail(function() {
           alert( "recepcion de datos fallida en boton detalles producto" );
       });
    }

    // $("#submit_dummies").click(function() {

    //     var div_row = document.createElement("div");
    //     div_row.setAttribute("class", "row");

    //     for (var i = 0; i < 4; i++) {
    //         var num_att0 = Math.round(Math.random() * 8);
    //         var num_att1 = Math.round(Math.random() * 8);
    //         var num_att2 = Math.round(Math.random() * 8);
    //         var num_att3 = Math.round(Math.random() * 8);
    //         var num_att4 = Math.round(Math.random() * 1);
    //         // console.log(i+" uno "+num_att+" dos "+num_att2); 

    //         var div_col = document.createElement("div");
    //         div_col.setAttribute("class", "col-md-3");

    //         var div_thumbnail = document.createElement("div");
    //         div_thumbnail.setAttribute("class", "team-img thumbnail");

    //         var img = document.createElement("img");
    //         img.setAttribute("src", "view/img/servicies/servicies1.jpg");

    //         var div_content = document.createElement("div");
    //         div_content.setAttribute("class", "team-content");

    //         var h = document.createElement("h3");
    //         h.innerHTML = coches_brand[num_att0];

    //         var border_team = document.createElement("div");
    //         border_team.setAttribute("class", "border-team")

    //         var parr0 = document.createElement("p");
    //         var parr1 = document.createElement("p");
    //         var parr2 = document.createElement("p");
    //         var parr3 = document.createElement("p");
    //         var parr4 = document.createElement("p");
    //         var parr5 = document.createElement("p");

    //         parr1.innerHTML = "<strong>Model: </strong>" + coches_model[num_att1];
    //         parr2.innerHTML = "<strong>Year: </strong>" + coches_year[num_att2];
    //         parr3.innerHTML = "<strong>Color: </strong>" + coches_color[num_att3];
    //         parr4.innerHTML = "<strong>Combustible: </strong>" + coches_combustible[num_att4];
    //         parr5.innerHTML = "<strong>Owner type: </strong>" + coches_owner[num_att4];


    //         var div_dummies = document.getElementById("dummies");
    //         div_row.appendChild(div_col);
    //         div_col.appendChild(div_thumbnail);
    //         div_thumbnail.appendChild(img);
    //         div_thumbnail.appendChild(div_content);
    //         div_content.appendChild(h);
    //         div_content.appendChild(border_team);
    //         div_content.appendChild(parr1);
    //         div_content.appendChild(parr2);
    //         div_content.appendChild(parr3);
    //         div_content.appendChild(parr4);
    //         div_content.appendChild(parr5);

    //         div_dummies.appendChild(div_row);
    //     }
    // });

    $('#tableProducts').DataTable();
    	div = document.getElementById('div_datatable');
   		function mostrar() {
        div.style.display = '';
    }

    function cerrar() {
        div.style.display = 'none';
    }

    $('#bt_dataTable').click(function() {
        mostrar();
    });
    // console.log("22256656565656656");

    // load_countries_v2();
    load_provinces_v2();

    $("#city_home").empty();
    $("#city_home").append('<option value="" selected="selected">Select city</option>');
    $("#city_home").prop('disabled', true);

    $("#province_home").change(function() {
        var province = $(this).val();

        var city = $("#city_home");

        if (province > 0) {
            city.prop('disabled', false);
            if (province > 0) {
                load_cities_v2(province);
            } else {
                $("#city_home").prop('disabled', false);
            }
        } else {
            city.prop('disabled', true);
            $("#city_home").empty();
        } //fi else
    });

    $('#search_home').keyup(function() {
        // window.addEventListener( "keydown", function(evento){
        //     tecla = evento.keyCode;
        //     //console.log ("tecla es "+tecla);
        //     if ((tecla>36) && (tecla<41)) {
        //         console.log("ppp");
        //     }      
        // }, false );

        //alert("entar");
        var word_wrotten = $(this).val();

        autocomplete(word_wrotten);
    });

    $('#btn_search').click(function() {
        btn_search();
    });

}); //END_DOCUMENT.READY


/*--------------------------------------------------------------------------------------------------------------------------*/
function btn_search() {

    var province = document.getElementById('province_home').value;
    var city = document.getElementById('city_home').value;
    var word_wrotten = document.getElementById('search_home').value;
    localStorage.setItem("worldToFind", word_wrotten);
    //alert(localStorage.getItem('worldToFind'));
    //exit;

    var data = { "province": province, "city": city, "word_wrotten": word_wrotten };

    var data_prod = JSON.stringify(data);

    //alert(data_location_JSON);

    $.post("module/homepage/controller/controller_homepage.php?homepage=btn_search", { "data_prod": data_prod },


            function(response) {
                //console.log(response);
                //var json = JSON.parse(response);
                localStorage.removeItem("productos_buscados");
                localStorage.setItem("productos_buscados", response);
                var redirect = "index.php?page=homepage&view=search";
                window.location.href = redirect;
                // var local=localStorage.getItem('productos_buscados');
                //  var trans=JSON.parse(local);
                //  alert("ddddddddddddd");
                // console.log(trans)

            })
        .fail(function() {
            alert("Error RESPONSE btn_search");
        });
}

/*--------------------------------------------------------------------------------------------------------------------------*/


function autocomplete(word_wrotten) {
    var province = document.getElementById('province_home').value;
    var city = document.getElementById('city_home').value;

    var data = { "province": province, "city": city, "word_wrotten": word_wrotten };

    var data_location_JSON = JSON.stringify(data);

    //alert(data_location_JSON);
    document.getElementById("datalist_search").innerHTML="";
    $.post("module/homepage/controller/controller_homepage.php?homepage=search", { "data_location": data_location_JSON },
            function(response) {
                var json = JSON.parse(response);
                //console.log(json[0]["product"]);
                console.log(json);
                //console.log(json.length);
                console.log(json[0].title);

                for (var i = 0; i < json.length; i++) {
                    //alert('fgdfgdf');
                    // $("#datalist_search").append('<option value="" selected="selected">Select city</option>');
                    jQuery("#datalist_search").append("<option value='" + json[i].title + "'>" + json[i].title + "</option>");
                    console.log(json[i]["title"]);
                }

            })
        .fail(function() {
            alert("Error RESPONSE autocomplete");
        });
}

/*--------------------------------------------------------------------------------------------------------------------------*/

function load_provinces_v2() {
    $.get("resources/provinciasypoblaciones.xml", function(xml) {
            $("#province_home").empty();
            $("#province_home").append('<option value="" selected="selected">Select province</option>');

            $(xml).find("provincia").each(function() {
                var id = $(this).attr('id');
                var name = $(this).find('nombre').text();
                $("#province_home").append("<option value='" + id + "'>" + name + "</option>");
            });
        })
        .fail(function() {
            alert("error load_provinces");
        });
}


/*--------------------------------------------------------------------------------------------------------------------------*/

function load_cities_v2(prov) {
    $.get("resources/provinciasypoblaciones.xml", function(xml) {
            $("#city_home").empty();
            $("#city_home").append('<option value="" selected="selected">Select city</option>');

            $(xml).find('provincia[id=' + prov + ']').each(function() {
                $(this).find('localidad').each(function() {
                    $("#city_home").append("<option value='" + $(this).text() + "'>" + $(this).text() + "</option>");
                });
            });
        })
        .fail(function() {
            alert("error load_cities");
        });
}




















































//  $("#submit_dummies").click(function(){
//     var id = this.getAttribute('id');
//     //alert(id);

//     $.get('module/homepage/controller/controller_homepage.php?homepage=list', 
//     function (respose) {
//          var json = JSON.parse(respose);
//          console.log(json);

//         if(json === 'error') {
//             //console.log(json);
//             //pintar 503
//             window.location.href='index.php?page=503';
//         }else{                
//             console.log("esto "+json.user_name);
//             var user=$("#user").html(json.user_name);
//             var country=$("#country").html(json.country);
//             var province=$("#province").html(json.province);
//             var city=$("#city").html(json.city);
//             var product_type=$("#product_type").html(json.product_type);

//             var div_row=document.createElement("div");
//             div_row.setAttribute("class", "row");

//             for (var i=0; i<4; i++) {                    
//                 var div_col=document.createElement("div");
//                     div_col.setAttribute("class", "col-md-3");

//                 var div_thumbnail=document.createElement("div");
//                     div_thumbnail.setAttribute("class", "team-img thumbnail");

//                 var img=document.createElement("img");
//                     img.setAttribute("src", "view/img/servicies/servicies1.jpg");

//                 var div_content=document.createElement("div");
//                     div_content.setAttribute("class", "team-content");

//                 var h=document.createElement("h3");
//                     h.innerHTML=product_type;

//                 var border_team=document.createElement("div");
//                     border_team.setAttribute("class", "border-team")

//                 var parr0=document.createElement("p");
//                 var parr1=document.createElement("p");
//                 var parr2=document.createElement("p");
//                 var parr3=document.createElement("p");
//                 var parr4=document.createElement("p");
//                 var parr5=document.createElement("p");

//                     parr1.innerHTML="<strong>Country: </strong>"+coches_model;
//                     parr2.innerHTML="<strong>City: </strong>"+coches_year;
//                     parr3.innerHTML="<strong>Province: </strong>"+coches_color;
//                     parr4.innerHTML="<strong>User: </strong>"+coches_combustible;



//                 var div_dummies=document.getElementById("dummies");
//                         div_row.appendChild(div_col);
//                         div_col.appendChild(div_thumbnail);
//                         div_thumbnail.appendChild(img);
//                         div_thumbnail.appendChild(div_content);
//                         div_content.appendChild(h);
//                         div_content.appendChild(border_team);
//                         div_content.appendChild(parr1);
//                         div_content.appendChild(parr2);
//                         div_content.appendChild(parr3);
//                         div_content.appendChild(parr4);


//                         div_dummies.appendChild(div_row);
//           } 
//         }     
//     });
// });