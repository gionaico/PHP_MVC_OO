$(document).ready(function () {
	$.post('module/myAccount/controller/controller_myAccount.php?type=likes',
             function(response){
                     var json = JSON.parse(response);
                     console.log(json);
                    var div_prin =document.getElementById("tablep"); 

                    for (var i = 0; i <json.length; i++) {
                    	var tr =crearElementos("tr", {"class":""});
                    	var td =crearElementos("td", {"class":""});
                    		td.innerHTML=json[i]['cod_pro'];
                    	var td2 =crearElementos("td", {"class":""});
                    		td2.innerHTML=json[i]['avatar'];
                    	var td3 =crearElementos("td", {"class":""});
                    		td3.innerHTML=json[i]['price'];
                    	var td4 =crearElementos("td", {"class":""});
                    		td4.innerHTML=json[i]['product_type'];
                    		
                    		tr.appendChild(td);
                    		tr.appendChild(td2);
                    		tr.appendChild(td3);
                    		tr.appendChild(td4);
                    		div_prin.appendChild(tr);
                    }
                       
             }).fail(function() {
                    alert( "kgjhgjhgjgjh" );
                     });
});//end doument ready	

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