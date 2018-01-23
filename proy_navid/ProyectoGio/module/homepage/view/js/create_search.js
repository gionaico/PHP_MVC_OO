$(document).ready(function () {
    
        $.post("module/homepage/controller/controller_homepage.php?homepage=btn_search&draw=products",
        
     function (response) {
        console.log(response);
        var json = JSON.parse(response);
             //console.log(json[0]["product"]);
             console.log(json);
             //console.log(json.length);
//             console.log(json.length);

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
                    
                    parr1.innerHTML="<strong>User: </strong>"+json[i].user;
                    parr2.innerHTML="<strong>Title: </strong>"+json[i].title;
                    parr3.innerHTML="<strong>Phone: </strong>"+json[i].phone;
                    parr4.innerHTML="<strong>Email: </strong>"+json[i].email;
                    parr5.innerHTML="<strong>Publication Date: </strong>"+json[i].date;

                    div_row.appendChild(div_col);
                    div_col.appendChild(div_thumbnail);
                    div_thumbnail.appendChild(img);
                    div_thumbnail.appendChild(div_content);
                    div_content.appendChild(h);
                    div_content.appendChild(border_team);
                    div_content.appendChild(parr1);
                    div_content.appendChild(parr2);
                    div_content.appendChild(parr3);
                    div_content.appendChild(parr4);
                    div_content.appendChild(parr5);
            }

            if ((i%3)==0) {
             div_resultado.appendChild(div_row);   
            }
        }
 
      
    })
    .fail(function() {
        alert( "error dfsdgffg" );
    });





    
});    