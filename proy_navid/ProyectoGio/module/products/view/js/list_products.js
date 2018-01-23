////////////////////////////////////////////////////////////////
function load_users_ajax() {
    $.ajax({
        type: 'GET',
        url: "module/products/controller/controller_products.php?load=true",
        //dataType: 'json',
        async: false
    }).done(function (data) {
        var json = JSON.parse(data);
        alert(json.user.un);

        print_product(json);

    }).fail(function (xhr) {
        alert(xhr.responseText);
    });
}

$(document).ready(function () {
    load_users_ajax();
});

function print_product(data) {
    alert(data.user.avatar);
    //console.log(data.msje);
    //console.log(data.user);
    
    var content = document.getElementById("content");
    var div_product = document.createElement("div");
    var parrafo = document.createElement("p");


    var un = document.createElement("div");
    un.innerHTML = "un = ";
    un.innerHTML += data.user.un;

    var pbt = document.createElement("div");
    pbt.innerHTML = "pbt = ";
    pbt.innerHTML += data.user.pbt;


    var country = document.createElement("div");
    country.innerHTML = "country = ";
    country.innerHTML += data.user.country;

    var province = document.createElement("div");
    province.innerHTML = "province = ";
    province.innerHTML += data.user.province;

    var city = document.createElement("div");
    city.innerHTML = "city = ";
    city.innerHTML += data.user.city;

    var add1 = document.createElement("div");
    add1.innerHTML = "add1 = ";
    add1.innerHTML += data.user.add1;

    var phone = document.createElement("div");
    phone.innerHTML = "phone = ";
    phone.innerHTML += data.user.phone;

    var email = document.createElement("div");
    email.innerHTML = "email = ";
    email.innerHTML += data.user.email;

    var message = document.createElement("div");
    message.innerHTML = "message = ";
    message.innerHTML += data.message;

    

    //arreglar ruta IMATGE!!!!!

    var cad = data.user.avatar;
    //console.log(cad);
    //var cad = cad.toLowerCase();
    var img = document.createElement("div");
    var html = '<img src="' + cad + '" height="500" width="500"> ';
    img.innerHTML = html;
    //alert(html);

    div_product.appendChild(parrafo);
    parrafo.appendChild(un);
    parrafo.appendChild(pbt);
    parrafo.appendChild(country);
    parrafo.appendChild(province);
    parrafo.appendChild(city);
    parrafo.appendChild(add1);
    parrafo.appendChild(phone);
    parrafo.appendChild(email);
    parrafo.appendChild(message);
    
    content.appendChild(div_product);
    content.appendChild(img);
}
