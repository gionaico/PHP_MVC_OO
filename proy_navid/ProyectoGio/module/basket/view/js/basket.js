$(document).ready(function () {
// $('#tab_comprar').DataTable();

		var tabla_carrito=document.getElementById('body_comprar');
		var tr1=document.createElement("tr");
		var td1=document.createElement("td");
		var td2=document.createElement("td");
		var td3=document.createElement("td");
		var select=document.createElement("select");
		

		td1.innerHTML="pepon";
        td2.innerHTML=15;
        td3.innerHTML=5;

        tr1.appendChild(td1);
        tr1.appendChild(td2);
        tr1.appendChild(td3);

         
          for(var i = 1; i <=10; i++){
          	var option=document.createElement("option");
          	option.setAttribute("value", ""+i+"");
          	option.innerHTML=i;
          	select.appendChild(option);
           
          }



        var tr2=document.createElement("tr");
		var td11=document.createElement("td");
		var td22=document.createElement("td");
		var td33=document.createElement("td");

		td11.innerHTML="tetete";
        td22.innerHTML=1596;
        td33.innerHTML=59;

        select.appendChild(option);
        td3.appendChild(select);
        tr2.appendChild(td11);
        tr2.appendChild(td22);
        tr2.appendChild(td33);
        tabla_carrito.appendChild(tr1);
        tabla_carrito.appendChild(tr2);

});
