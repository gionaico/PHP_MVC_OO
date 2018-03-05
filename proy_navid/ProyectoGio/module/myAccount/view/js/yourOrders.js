

$(document).ready(function () { 

 



    $.post('module/myAccount/controller/controller_myAccount.php?type=pedidos&checkUser',
                     
    function(response){
            // var json_cont2 = JSON.parse(response);
            console.log(response.length);
            if ((response== "null")||(response==null)) {
                console.log("no logueado");
                redirect="http://localhost/proy_navid/ProyectoGio/index.php";
                window.location.href =redirect;
            }else {
                console.log(response);
                  $.post('module/myAccount/controller/controller_myAccount.php?type=pedidos',
                    
        function(response){
            console.log(response);
             var json = JSON.parse(response);
             console.log(json[0][0].count);
             //console.log(json[2].length);
            console.log(json);




            var div_prin =document.getElementById("TusPedidos"); 


            /*-----------------------------------------------------------------------------*/  
            // var google = crearElementos("a",{"href":"http://google.com", "id":"prueba"},"google"),
            //     youtube = crearElementos("a",{"href":"http://youtube.com"},"youtube"),
            //     facebook = crearElementos("a",{"href":"http://facebook.com"},"facebook"),
            //     links_conteiner = crearElementos("div",{"id":"links"},[google,youtube,facebook]);

            //     div_prin.appendChild(links_conteiner); 
            /*-----------------------------------------------------------------------------*/



            for (var i = 0; i <json.length; i++) {
                var div_panel =crearElementos("div", {"class":"panel panel panel-warning aboutus-text"}),                    
                    div_panel_heading=crearElementos("div", {"class": "panel-heading"}),
                    div_panel_heading_row=crearElementos("div", {"class": "row"}),
                    div_panel_heading_row_precio=crearElementos("div", {"class": "col-md-4"}),
                    div_panel_heading_row_precioTotal=crearElementos("div", {"class": "col-md-4"}),
                    div_panel_heading_row_numeroPedido=crearElementos("div", {"class": "col-md-4"}),
                    p_precio=crearElementos("p",{"id":"precio"}, "EUR"),
                    p_precioTotal=crearElementos("p",{"id":"precioTotal"}, "EUR"),
                    p_numeroPedido=crearElementos("p",{"id":"numeroPedido"}, "Numero Pedido")
                    strong_precio=crearElementos("strong",{"id":"precio"}, "Order Date"),
                    strong_precioTotal=crearElementos("strong",{"id":"precio"}, "Total Price"),
                    strong_numeroPedido=crearElementos("strong",{"id":"precio"}, "Order Number"),

                    divPanelBody=crearElementos("div", {"class":"panel-body"}),
                    divPanelBody_row=crearElementos("div", {"class":"row"}),
                    divPanelBody_row_colmd12=crearElementos("div", {"class":"col-md-12"}),
                    divPanelBody_row_colmd12_colmd9=crearElementos("div", {"class":"col-md-9"}),
                    divPanelBody_row_colmd12_colmd3=crearElementos("div", {"class":"col-md-3"}),
                    divPanelBody_row_colmd12_colmd3_div=crearElementos("div", {"class":"list-group", "style":"text-align:center;"}),
                    divPanelBody_row_colmd12_colmd3_div_a1=crearElementos("a", {"class":"list-group-item", "href":"#"}, "Lorem ipsum dolor sit."),
                    divPanelBody_row_colmd12_colmd3_div_a2=crearElementos("a", {"class":"list-group-item", "href":"#"}, "Lorem ipsum dolor sit."),
                    divPanelBody_row_colmd12_colmd3_div_a3=crearElementos("a", {"class":"list-group-item", "href":"#"}, "Lorem ipsum dolor sit."),
                    divPanelBody_row_colmd12_colmd3_div_a4=crearElementos("a", {"class":"list-group-item", "href":"#"}, "Lorem ipsum dolor sit."),
                    divPanelBody_row_colmd12_colmd3_div_a5=crearElementos("a", {"class":"list-group-item", "href":"#"}, "Lorem ipsum dolor sit.");
                
                // div_prin.appendChild(div_panel); 
                div_prin.appendChild(div_panel);                 
                div_panel.appendChild(div_panel_heading);     
                div_panel_heading.appendChild(div_panel_heading_row); 
                div_panel_heading_row.appendChild(div_panel_heading_row_precio);
                div_panel_heading_row.appendChild(div_panel_heading_row_precioTotal);
                div_panel_heading_row.appendChild(div_panel_heading_row_numeroPedido);
                div_panel_heading_row_precio.appendChild(strong_precio);  
                div_panel_heading_row_precio.appendChild(p_precio); 
                div_panel_heading_row_precioTotal.appendChild(strong_precioTotal);
                div_panel_heading_row_precioTotal.appendChild(p_precioTotal);
                div_panel_heading_row_numeroPedido.appendChild(strong_numeroPedido);
                div_panel_heading_row_numeroPedido.appendChild(p_numeroPedido);

                div_panel.appendChild(divPanelBody);
                
                divPanelBody.appendChild(divPanelBody_row);
                divPanelBody_row.appendChild(divPanelBody_row_colmd12);
                divPanelBody_row_colmd12.appendChild(divPanelBody_row_colmd12_colmd9);
                divPanelBody_row_colmd12.appendChild(divPanelBody_row_colmd12_colmd3);
                divPanelBody_row_colmd12_colmd3.appendChild(divPanelBody_row_colmd12_colmd3_div);
                divPanelBody_row_colmd12_colmd3_div.appendChild(divPanelBody_row_colmd12_colmd3_div_a1);
                divPanelBody_row_colmd12_colmd3_div.appendChild(divPanelBody_row_colmd12_colmd3_div_a2);
                divPanelBody_row_colmd12_colmd3_div.appendChild(divPanelBody_row_colmd12_colmd3_div_a3);
                divPanelBody_row_colmd12_colmd3_div.appendChild(divPanelBody_row_colmd12_colmd3_div_a4);

                    //console.log(json[i].length);
                    
                p_precio.innerHTML=json[i][0]['order_date'];
                p_precioTotal.innerHTML="EUR  "+json[i][0]['total_price'];
                p_numeroPedido.innerHTML=json[i][0]['id_pedido'];
                for (var j = 0; j <json[i].length; j++) {
                    console.log(json[i].length);
                    var divPanelBody_row_colmd12_colmd9_row=crearElementos("div", {"class":"row"}),
                        divPanelBody_row_colmd12_colmd9_row_colMd3=crearElementos("div", {"class":"col-md-3"}),
                        divPanelBody_row_colmd12_colmd9_row_colMd3_a=crearElementos("a", {"class":"thumbnail"}),
                        divPanelBody_row_colmd12_colmd9_row_colMd3_a_img=crearElementos("img", {"src":""+json[i][j]['foto']+""}),

                        divPanelBody_row_colmd12_colmd9_row_colMd9=crearElementos("div", {"class":"col-md-9"}),
                        divPanelBody_row_colmd12_colmd9_row_colMd9_div=crearElementos("div"),
                        divPanelBody_row_colmd12_colmd9_row_colMd9_div_strong=crearElementos("strong", {"id":""}, ""+json[i][j]['titulo']+""),
                        divPanelBody_row_colmd12_colmd9_row_colMd9_div_p=crearElementos("p", {"id":""}, ""+json[i][j]['description']+""),
                        divPanelBody_row_colmd12_colmd9_row_colMd9_br=crearElementos("br"),
                        divPanelBody_row_colmd12_colmd9_row_colMd9_div2=crearElementos("div"),
                        divPanelBody_row_colmd12_colmd9_row_colMd9_div2_button=crearElementos("button", {"class":"btn btn-success"}, "Buy Again");
                    
                    //divPanelBody_row_colmd12_colmd9_row_colMd3_a_img.setAttribute("src", ""+json[i][j]['foto']+"");

                    divPanelBody_row_colmd12_colmd9.appendChild(divPanelBody_row_colmd12_colmd9_row);
                    divPanelBody_row_colmd12_colmd9_row.appendChild(divPanelBody_row_colmd12_colmd9_row_colMd3);
                    divPanelBody_row_colmd12_colmd9_row.appendChild(divPanelBody_row_colmd12_colmd9_row_colMd9);
                    divPanelBody_row_colmd12_colmd9_row_colMd3.appendChild(divPanelBody_row_colmd12_colmd9_row_colMd3_a);
                    divPanelBody_row_colmd12_colmd9_row_colMd3_a.appendChild(divPanelBody_row_colmd12_colmd9_row_colMd3_a_img);
                    divPanelBody_row_colmd12_colmd9_row_colMd9.appendChild(divPanelBody_row_colmd12_colmd9_row_colMd9_div);
                    divPanelBody_row_colmd12_colmd9_row_colMd9_div.appendChild(divPanelBody_row_colmd12_colmd9_row_colMd9_div_strong);
                    divPanelBody_row_colmd12_colmd9_row_colMd9_div.appendChild(divPanelBody_row_colmd12_colmd9_row_colMd9_div_p);
                    divPanelBody_row_colmd12_colmd9_row_colMd9.appendChild(divPanelBody_row_colmd12_colmd9_row_colMd9_br);
                    divPanelBody_row_colmd12_colmd9_row_colMd9.appendChild(divPanelBody_row_colmd12_colmd9_row_colMd9_div2);
                    divPanelBody_row_colmd12_colmd9_row_colMd9.appendChild(divPanelBody_row_colmd12_colmd9_row_colMd9_div2_button);

                   //  for (var i in json[i][j]) {
                      
                   // }
                 //console.log(json[i][j]['foto']);
                }
           }//end for

             // var id_pedido="";
             // var div=document.getElementById('TusPedidos');
             // for (var i =0 ; i<json_cont2.length; i++) {
             //    a_nuevo=array();
             //    for (var j =0 ; j<json_cont2.length; j++) {
                               
             //    }                  
             // }
                $(".list-group-item").mouseover(function(){
                    
                    $(this).attr("class", "list-group-item active")
                });
                $(".list-group-item").mouseout(function(){
                    $(this).attr("class", "list-group-item")
    });
        }).fail(function() {
               alert( "recepcion de datos fallida en boton detalles producto" );
           });
            }
            console.log(response);
        

    }).fail(function() {
           alert( "recepcion de datos fallida en boton detalles producto" );
        });
    





    // if ((typeof(usuarioLogeado) == "undefined") || (usuarioLogeado == null)) {
    //     console.log("no logueado");
    //     redirect="http://localhost/proy_navid/ProyectoGio/index.php";
    //     window.location.href =redirect;
    // }else{
        
      
    // }
    

});//end document.ready

function crearElementos(element, attribute, inner){
    if(typeof(element) === "undefined"){
        return false;}
    if(typeof(inner) === "undefined"){
        inner = "";}
    var el = document.createElement(element);
    if(typeof(attribute) === 'object'){
        for(var key in attribute){
            el.setAttribute(key,attribute[key]);}
        }
        if(!Array.isArray(inner)){inner = [inner];}
        for(var k = 0;k < inner.length;k++){
            if(inner[k].tagName){el.appendChild(inner[k]);}
            else{el.appendChild(document.createTextNode(inner[k]));}
        }
    return el;
}