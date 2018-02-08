// <!-- for (var j = 0; j < records.length; j++) {
//                 var rowData = records[j];
//                 var laptops = rowData.laptops;
//                 var container = "<div style='padding-left: 15px;'>";
//                 for (var i = 0; i < laptops.length; i++) {
//                     var laptop = laptops[i];
//                     var item = "<div style='float: left; width: 220px; overflow: hidden; white-space: nowrap; height: 265px;'>";
//                     var image = "<div style='margin: 5px; margin-bottom: 3px;'>";
//                     var imgurl = laptop.img;
//                     var img = '<img width=160 height=120 style="display: block;" src="' + imgurl + '"/>';
//                     image += img;
//                     image += "</div>";
//                     var info = "<div style='margin: 5px; margin-left: 20px; margin-bottom: 3px;'>";
//                     info += "<div><i>" + laptop.model + "</i></div>";
//                     info += "<div>Price: $" + laptop.price + "</div>";
//                     info += "<div>RAM: " + laptop.ram + "</div>";
//                     info += "<div>HDD: " + laptop.hdd + "</div>";
//                     info += "<div>CPU: " + laptop.cpu + "</div>";
//                     info += "<div>Display: " + laptop.display + "</div>";
//                     info += "</div>";
//                     var buy = "<button class='buy' style='margin: 5px; width: 80px; left: -50px; position: relative; margin-left: 50%; margin-bottom: 3px;'>Buy</button>";
//                     item += image;
//                     item += info;
//                     item += buy;
//                     item += "</div>";
//                     container += item;
//                 }
//                 container += "</div>";
//                 $(container).appendTo($("#content"));
//             } -->

$(document).ready(function () { 

        var usuarioLogeado=sessionStorage.getItem('app-usuarioLogeado');
        console.log(usuarioLogeado);

    if ((typeof(usuarioLogeado) == "undefined") || (usuarioLogeado == null)) {
        console.log("no logueado");
    }else{
        
        $.post('module/myAccount/controller/controller_myAccount.php?type=pedidos',
                    {"usuarioLogeado":  usuarioLogeado},
        function(response){
            console.log(response);
             var json_cont2 = JSON.parse(response);
             console.log(json_cont2);

             // var id_pedido="";
             // var div=document.getElementById('TusPedidos');
             // for (var i =0 ; i<json_cont2.length; i++) {
             //    a_nuevo=array();
             //    for (var j =0 ; j<json_cont2.length; j++) {
                               
             //    }                  
             // }
               
        }).fail(function() {
               alert( "recepcion de datos fallida en boton detalles producto" );
           });
    }
    

});//end document.ready