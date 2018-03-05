
function checkInput(idInput, pattern) {
  return $(idInput).val().match(pattern) ? true : false;
}

var user_namePattern="^[_A-Za-z0-9-\\+]{4,}$";

var phonePattern="^[0-9]{9}$";

var pricePattern="^[0-9]{1,6}([.][0-9]{1,2})?$";

var emailPattern = "^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$";

var addPattern="^[a-zA-Z1-9 ]{3,}$";

var messagePattern="^[_A-Za-z0-9-\\+ ]{30,}$";

var tittlePattern="^[_A-Za-z0-9-\\+ ]{10,40}$";

// ^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$
var usuarioLogeado=sessionStorage.getItem('app-usuarioLogeado');
Dropzone.autoDiscover = false;
$(document).ready(function () {
    console.log("prod "+usuarioLogeado);
      

      $.post('module/products/controller/controller_products.php',
                 {"checkUser": ""},
     function(response){
        var answer = response;
         console.log(typeof(response)); 
         console.log(response.length);        
        if ((answer== "null")||(answer==null)) {
            $("#un").prop('disabled', true);
            $("#pbt").prop('disabled', true);
            $("#add1").prop('disabled', true);
            $("#phone").prop('disabled', true);
            $("#email").prop('disabled', true);
            $("#message").prop('disabled', true);
            $("#country").prop('disabled', true);
            $("#product_type").prop('disabled', true);
            $("#submit").prop('disabled', true);
            var div_dropzone=document.getElementById('div_dropzone');
                        div_dropzone.style.display = 'none';
            $('#modal_login').modal('show'); // abrir
            var info_logPro=document.getElementById('info_logPro');
                info_logPro.style.display='block';
            //$('#myModalExito').modal('hide'); // cerrar                    
            // alert("NOOOOOOOO logueado");
            //$("#dropzone").prop('disabled', true);
        }else{
            $("#un").attr("value",usuarioLogeado);
            $("#un").prop('disabled', true);

            console.log("oooooooooo ES "+usuarioLogeado);
                   
        }
               
     }).fail(function() {
            alert( "recepcion de datos fallida en boton detalles producto" );
             });



    // if ((typeof(usuarioLogeado) == "undefined") || (usuarioLogeado == null)) {
    //     $("#un").prop('disabled', true);
    //     $("#pbt").prop('disabled', true);
    //     $("#add1").prop('disabled', true);
    //     $("#phone").prop('disabled', true);
    //     $("#email").prop('disabled', true);
    //     $("#message").prop('disabled', true);
    //     $("#country").prop('disabled', true);
    //     $("#product_type").prop('disabled', true);
    //     $("#submit").prop('disabled', true);
    //     var div_dropzone=document.getElementById('div_dropzone');
    //                 div_dropzone.style.display = 'none';
    //     $('#modal_login').modal('show'); // abrir
    //     var info_logPro=document.getElementById('info_logPro');
    //         info_logPro.style.display='block';
    //     //$('#myModalExito').modal('hide'); // cerrar                    
    //     // alert("NOOOOOOOO logueado");
    //     //$("#dropzone").prop('disabled', true);
    // }else{
    //     $("#un").attr("value",usuarioLogeado);
    //     $("#un").prop('disabled', true);

    //     console.log("oooooooooo ES "+usuarioLogeado);
               
    // }
    
    $("#product_type").change(function() {
        if ($(this).val()=="Sale Vehicle") {
            $("#brand").prop('disabled', false);
            $("#model").prop('disabled', false);
            $("#year").prop('disabled', false);
            $("#combustible").prop('disabled', false);
            $("#color").prop('disabled', false);
          

        }else{
            $("#brand").prop('disabled', true);
            $("#model").prop('disabled', true);
            $("#year").prop('disabled', true);
            $("#combustible").prop('disabled', true);
            $("#color").prop('disabled', true);
        }
    });

    


    // $("#un").keyup(function() {
    //  if ($(this).val()=="") {
    //      $("#sp_un").html("<span></span>");
    //  }else{
    //      $("#un").attr("style", "");
    //      var check=checkInput("#un", user_namePattern);
    //      if(check==true) {
    //          $("#un").removeAttr("style");
    //          $("#sp_un").html("<span style='color:green;'>Correct</span>");
    //      }else{
    //          $("#sp_un").html("<span style='color:#BA1C2E;'>Invalid Name</span>");
    //      }
    //  }   
    // });

    $("#pbt").keyup(function() {
        if ($(this).val()=="") {
            $("#sp_pbt").html("<span></span>");
        }else{
            $("#un").attr("style", "");
            var check=checkInput("#pbt", tittlePattern);
            if(check==true) {
                $("#pbt").removeAttr("style");
                $("#sp_pbt").html("<span style='color:green;'>Correct</span>");
            }else{
                $("#sp_pbt").html("<span style='color:#BA1C2E;'>Invalid. Min 10 Max 40 caracters</span>");
            }
        }   
    });

    $("#add1").keyup(function() {
        if ($(this).val()=="") {
            $("#sp_add1").html("<span></span>");
        }else{
            $("#un").attr("style", "");
            var check=checkInput("#add1", addPattern);
            if(check==true) {
                $("#add1").removeAttr("style");
                $("#sp_add1").html("<span style='color:green;'>Correct</span>");
            }else{
                $("#sp_add1").html("<span style='color:#BA1C2E;'>Invalid Address</span>");
            }
        }   
    });

    $("#phone").keyup(function() {
        if ($(this).val()=="") {
            $("#sp_phone").html("<span></span>");
        }else{
            var check=checkInput("#phone", phonePattern);
            if(check==true) {
                $("#phone").removeAttr("style");                
                $("#sp_phone").html("<span style='color:green;'>Correct</span>");
            }else{
                $("#sp_phone").html("<span style='color:#BA1C2E;'>Invalid Phone</span>");
            }
        }   
    });

    $("#email").keyup(function() {
        if ($(this).val()=="") {
            $("#sp_email").html("<span></span>");
        }else{
            var check=checkInput("#email", emailPattern);
            if(check==true) {
                $("#email").removeAttr("style");                
                $("#sp_email").html("<span style='color:green;'>Correct</span>");
            }else{
                $("#sp_email").html("<span style='color:#BA1C2E;'>Invalid Email</span>");
            }
        }   
    });

    $("#message").keyup(function() {
        if ($(this).val()=="") {
            $("#sp_message").html("<span></span>");
        }else{
            var check=checkInput("#message", messagePattern);
            if(check==true) {
                $("#message").removeAttr("style");              
                $("#sp_message").html("<span style='color:green;'>Correct</span>");
            }else{
                $("#sp_message").html("<span style='color:#BA1C2E;'>Min 10 caracters</span>");
            }
        }   
    });

    $("#price").keyup(function() {
        if ($(this).val()=="") {
            $("#sp_price").html("<span></span>");
        }else{
            // var check=$("#price").val();
            // console.log(typeof(check));
            var check=checkInput("#price", pricePattern);
            if(check==true) {
                $("#price").removeAttr("style");              
                $("#sp_price").html("<span style='color:green;'>Correct</span>");
            }else{
                $("#sp_price").html("<span style='color:#BA1C2E;'>Invalid Format. Please read the help message.</span>");
            }
        }   
    });

    $("#country").focusout(function() {
        if ($(this).val()==="") {
            $("#sp_country").html("<span style='color:#BA1C2E;'>Invalid</span>");
        }else{
            $("#sp_country").html("<span style='color:green;'>Correct</span>");         
        }   
    });

    $("#province").focusout(function() {
        if ($(this).val()==="") {
            $("#sp_province").html("<span style='color:#BA1C2E;'>Invalid</span>");
        }else{
            $("#sp_province").html("<span style='color:green;'>Correct</span>");            
        }   
    });

    $("#city").focusout(function() {
        if ($(this).val()==="") {
            $("#sp_city").html("<span style='color:#BA1C2E;'>Invalid</span>");
        }else{
            $("#sp_city").html("<span style='color:green;'>Correct</span>");            
        }   
    });


    $("#product_type").focusout(function() {
        if (($(this).val()==="") || ($(this).val()==="Product Type:")) {
            $("#sp_product_type").html("<span style='color:#BA1C2E;'>Invalid</span>");
        }else{
            $("#product_type").attr("style", "");
            $("#sp_product_type").html("<span style='color:green;'>Correct</span>");         
        }   
    });
    $("#brand").focusout(function() {
        if (($(this).val()==="") || ($(this).val()==="Select Brand")) {
            $("#sp_brand").html("<span style='color:#BA1C2E;'>Invalid</span>");
        }else{
            $("#brand").attr("style", "");
            $("#sp_brand").html("<span style='color:green;'>Correct</span>");         
        }   
    });
    $("#model").focusout(function() {
        if (($(this).val()==="") || ($(this).val()==="Select Model")) {
            $("#sp_model").html("<span style='color:#BA1C2E;'>Invalid</span>");
        }else{
            $("#model").attr("style", "");
            $("#sp_model").html("<span style='color:green;'>Correct</span>");         
        }   
    });
    $("#year").focusout(function() {
        if (($(this).val()==="") || ($(this).val()==="Select Year")) {
            $("#sp_year").html("<span style='color:#BA1C2E;'>Invalid</span>");
        }else{
            $("#year").attr("style", "");
            $("#sp_year").html("<span style='color:green;'>Correct</span>");         
        }   
    });
    $("#combustible").focusout(function() {
        if (($(this).val()==="") || ($(this).val()==="Select Combustible")) {
            $("#sp_combustible").html("<span style='color:#BA1C2E;'>Invalid</span>");
        }else{
            $("#combustible").attr("style", "");
            $("#sp_combustible").html("<span style='color:green;'>Correct</span>");         
        }   
    });
    $("#color").focusout(function() {
        if (($(this).val()==="") || ($(this).val()==="Select Color")) {
            $("#sp_color").html("<span style='color:#BA1C2E;'>Invalid</span>");
        }else{
            $("#color").attr("style", "");
            $("#sp_color").html("<span style='color:green;'>Correct</span>");         
        }   
    });







    $("#submit").click(function(){
        // alert("entasr");         
            $("div").remove(".div_errPhp");
        // }        
        validaForm();//validate de JS       
    });//end_CLICK_event


    //Dropzone function //////////////////////////////////
    $('#dropzone').dropzone({
        url: "module/products/controller/controller_products.php?upload=true",
        addRemoveLinks: true,
        maxFileSize: 2000,
        dictResponseError: "Ha ocurrido un error en el server",
        acceptedFiles: 'image/*',
        init: function () {
            this.on("success", function (file, response) {
                alert(response);
                $("#progress").show();
                $("#bar").width('100%');
                $("#percent").html('100%');
                $('.msg').text('').removeClass('msg_error');
                $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({'right': '300px'}, 300);
            });
        },
        complete: function (file) {
            if(file.status == "success"){
            alert("El archivo se ha subido correctamente: " + file.name);
            }
        },
        error: function (file) {
            alert("Error subiendo el archivo " + file.name);
        },
        removedfile: function (file, serverFileName) {
            var name = file.name;

            $.ajax({
                type: "POST",
                url: "module/products/controller/controller_products.php?delete=true",
                data: "filename=" + name,
                success: function (data) {
                    $("#progress").hide();
                    $('.msg').text('').removeClass('msg_ok');
                    $('.msg').text('').removeClass('msg_error');
                    $("#e_avatar").html("");

                    //var json = JSON.parse(data);
                    alert(data);
                    if (data.res) {
                        var element;
                        if ((element = file.previewElement) != null) {
                            element.parentNode.removeChild(file.previewElement);
                            alert("Imagen eliminada: " + name);
                        } else {
                            false;
                        }
                    } else { //json.res == false, elimino la imagen también
                        var element;
                        if ((element = file.previewElement) != null) {
                            element.parentNode.removeChild(file.previewElement);
                        } else {
                            false;
                        }
                    }
                }
            });
        }
       });//end_dropzone






load_countries_v1();
    
    $("#province").empty();
    $("#province").append('<option value="" selected="selected">Select province</option>');
    $("#province").prop('disabled', true);
    $("#city").empty();
    $("#city").append('<option value="" selected="selected">Select city</option>');
    $("#city").prop('disabled', true);

    $("#country").change(function() {
        var country = $(this).val();
        var province = $("#province");
        var city = $("#city");

        if(country !== 'ES'){
             province.prop('disabled', true);
             city.prop('disabled', true);
             $("#province").empty();
             $("#city").empty();
        }else{
             province.prop('disabled', false);
             city.prop('disabled', false);
             load_provinces_v1();
        }//fi else
    });

    $("#province").change(function() {
        var prov = $(this).val();
        if(prov > 0){
            load_cities_v1(prov);
        }else{
            $("#city").prop('disabled', false);
        }
    });





});//end_DOCUMENTE.ready

function load_countries_v1() {
    $.get( "module/products/controller/controller_products.php?load_country=true",
        function( response ) {
        //alert(response);
            if(response === 'error'){
                load_countries_v2("resources/ListOfCountryNamesByName.json");
            }else{
                load_countries_v2("module/products/controller/controller_products.php?load_country=true"); //oorsprong.org
            }
    })
    .fail(function(response) {
        load_countries_v2("resources/ListOfCountryNamesByName.json");
    });
}

function load_countries_v2(cad) {
    $.getJSON( cad, function(data) {
      $("#country").empty();
      $("#country").append('<option value="" selected="selected">Select country</option>');

      $.each(data, function (i, valor) {
        $("#country").append("<option value='" + valor.sISOCode + "'>" + valor.sName + "</option>");
      });
    })
    .fail(function() {
        alert( "error load_countries" );
    });
}


function load_provinces_v1() { //provinciasypoblaciones.xml - xpath
    $.get( "module/products/controller/controller_products.php?load_provinces=true",
        function( response ) {
          $("#province").empty();
            $("#province").append('<option value="" selected="selected">Select province</option>');

            //alert(response);
        var json = JSON.parse(response);
            var provinces=json.provinces;
            //alert(provinces);
            //console.log(provinces);

            //alert(provinces[0].id);
            //alert(provinces[0].nombre);

            if(provinces === 'error'){
                load_provinces_v2();
            }else{
                for (var i = 0; i < provinces.length; i++) {
                    $("#province").append("<option value='" + provinces[i].id + "'>" + provinces[i].nombre + "</option>");
                }
            }
    })
    .fail(function(response) {
        load_provinces_v2();
    });
}


function load_provinces_v2() {
    $.get("resources/provinciasypoblaciones.xml", function (xml) {
        $("#province").empty();
        $("#province").append('<option value="" selected="selected">Select province</option>');

        $(xml).find("provincia").each(function () {
            var id = $(this).attr('id');
            var name = $(this).find('nombre').text();
            $("#province").append("<option value='" + id + "'>" + name + "</option>");
        });
    })
    .fail(function() {
        alert( "error load_provinces" );
    });
}


function load_cities_v2(prov) {
    $.get("resources/provinciasypoblaciones.xml", function (xml) {
        $("#city").empty();
        $("#city").append('<option value="" selected="selected">Select city</option>');

        $(xml).find('provincia[id=' + prov + ']').each(function(){
            $(this).find('localidad').each(function(){
                 $("#city").append("<option value='" + $(this).text() + "'>" + $(this).text() + "</option>");
            });
        });
    })
    .fail(function() {
        alert( "error load_cities" );
    });
}

function load_cities_v1(prov) { //provinciasypoblaciones.xml - xpath
    var datos = { idPoblac : prov  };
    $.post("module/products/controller/controller_products.php", datos, function(response) {
        //alert(response);
        var json = JSON.parse(response);
        var cities=json.cities;
        //alert(poblaciones);
        //console.log(poblaciones);
        //alert(poblaciones[0].poblacion);

        $("#city").empty();
        $("#city").append('<option value="" selected="selected">Select city</option>');

        if(cities === 'error'){
            load_cities_v2(prov);
        }else{
            for (var i = 0; i < cities.length; i++) {
                $("#city").append("<option value='" + cities[i].poblacion + "'>" + cities[i].poblacion + "</option>");
            }
        }
    })
    .fail(function() {
        load_cities_v2(prov);
    });
}

function validaForm(){
        var result=true;

        
        var product_type = document.getElementById('product_type').value;
        var brand = document.getElementById('brand').value;        
        var model = document.getElementById('model').value;
        var year = document.getElementById('year').value;
        var combustible = document.getElementById('combustible').value;
        var color = document.getElementById('color').value;
        
        var un = document.getElementById('un').value;
        console.log("valida un "+un);
        var pbt = document.getElementById('pbt').value;
        var country = document.getElementById('country').value;
        var province = document.getElementById('province').value;
        var city = document.getElementById('city').value;
        var add1 = document.getElementById('add1').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;
        var message = document.getElementById('message').value;
        var price = document.getElementById('price').value;
        

        
         if (($("#pbt").val()=="")|| (checkInput("#pbt", tittlePattern)===false)) {
            $("#pbt").focus();
            $("#pbt").attr("style", "background:#FFC9C9; border:red 2px solid");
            result=false;
            return false;
        }
        if ($("#country").val() === "" || $("#country").val() === "Select country" || $("#country").val() === null) {
            $("#country").focus();
            $("#country").attr("style", "background:#FFC9C9; border:red 2px solid");
            return false;
        }else{
            $("#country").attr("style", "");
        }

        if ($("#province").val() === "" || $("#province").val() === "Select province") {
            $("#province").focus();
            $("#province").attr("style", "background:#FFC9C9; border:red 2px solid");
            return false;
        }

        if ($("#city").val() === "" || $("#city").val() === "Select city") {
            $("#city").focus();
            $("#city").attr("style", "background:#FFC9C9; border:red 2px solid");
            return false;
        }
         if (($("#add1").val()=="")|| (checkInput("#add1", addPattern)===false)) {
            $("#add1").focus();
            $("#add1").attr("style", "background:#FFC9C9; border:red 2px solid");
            result=false;
            return false;
        }
         if (($("#phone").val()=="")|| (checkInput("#phone", phonePattern)===false)) {
            $("#phone").focus();
            $("#phone").attr("style", "background:#FFC9C9; border:red 2px solid");
            result=false;
            return false;
        }
         if (($("#email").val()=="")|| (checkInput("#email", emailPattern)===false)) {
            $("#email").focus();
            $("#email").attr("style", "background:#FFC9C9; border:red 2px solid");
            result=false;
            return false;
        }
         if ( product_type=== "" || product_type === "Product Type:") {
            $("#product_type").focus();
            $("#product_type").attr("style", "background:#FFC9C9; border:red 2px solid");
            result=false;
            return false;
        }else{
                
            if (product_type === "Sale Vehicle") {
                if (brand === "" || brand === "Select Brand") {
                    $("#brand").focus();
                    $("#brand").attr("style", "background:#FFC9C9; border:red 2px solid");
                    result=false;
                    return false;
                }
                if ($("#model").val() === "" || $("#model").val() === "Select Model") {
                    $("#model").focus();
                    $("#model").attr("style", "background:#FFC9C9; border:red 2px solid");
                    result=false;
                    return false;
                }
                if ($("#year").val() === "" || $("#year").val() === "Select Year") {
                    $("#year").focus();
                    $("#year").attr("style", "background:#FFC9C9; border:red 2px solid");
                    result=false;
                    return false;
                }
                if ($("#combustible").val() === "" || $("#combustible").val() === "Select Combustible") {
                    $("#combustible").focus();
                    $("#combustible").attr("style", "background:#FFC9C9; border:red 2px solid");
                    result=false;
                    return false;
                }
                if ($("#color").val() === "" || $("#color").val() === "Select Color") {
                    $("#color").focus();
                    $("#color").attr("style", "background:#FFC9C9; border:red 2px solid");
                    result=false;
                    return false;
                }
            }   
        }
         if (($("#message").val()=="")|| (checkInput("#message", messagePattern)===false)) {
            $("#message").focus();
            $("#message").attr("style", "background:#FFC9C9; border:red 2px solid");
            result=false;
            return false;
        }
        if (($("#price").val()=="")|| (checkInput("#price", pricePattern)===false)) {
            $("#price").focus();
            $("#price").attr("style", "background:#FFC9C9; border:red 2px solid");
            result=false;
            return false;
        }
        
        if (result) {

        if (province === null) {
            province = 'default_province';
        }else if (province.length === 0) {
            province = 'default_province';
        }else if (province === 'Select province') {
            return 'default_province';
        }

        if (city === null) {
            city = 'default_city';
        }else if (city.length === 0) {
            city = 'default_city';
        }else if (city === 'Select city') {
            return 'default_city';
        }
        // alert(product_type);
        if (product_type==="Sale Vehicle") {
            var data = {"un": un, "pbt": pbt, "country":country, "province": province, "city":city, "add1": add1, "phone": phone, "email": email, "product_type": product_type, "brand": brand, "model":model, "year":year, "combustible":combustible, "color":color, "message": message, "price":price};
            console.log(1+" "+data);
        }else{
            var data = {"un": un, "pbt": pbt, "country":country, "province": province, "city":city, "add1": add1, "phone": phone, "email": email, "product_type": product_type, "message": message, "price":price};
            console.log(2+" "+data);
        }
        console.log("antes de controller "+data);
        var data_users_JSON = JSON.stringify(data);
                   alert(data_users_JSON);

        $.post('module/products/controller/controller_products.php',
                {alta_users_json: data_users_JSON},


        function (response) {
            //console.log(respose);
            
            // console.log(xhr.responseJSON);
            // alert(response.success);
            //var json2 = JSON.parse(response);
            //alert("ffffffffffffffffff"+json2.success+"ccccccc"); response
           //alert(json2); //
            if (response.success) {
                alert("entra sssssssssd");
                window.location.href = response.redirect; 
                //Al establecer la propiedad va a redirigir la página.
                // window.open('http://www.xyz.com'); //This will open xyz in a new window.
                // window.location.href = 'http://www.xyz.com'; //Will take you to xyz.
            }
            // alert("no entraaaaaaaaaaaaaaa"); 
            // alert(json2.success);  //para debuguear
            // }); //para debuguear
        //}, "json").fail(function (xhr) {
        
        }, "json").fail(function(xhr, textStatus, errorThrown){
            alert(xhr.responseText);
          console.log("Inside error jsoddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddn");
          console.log(xhr.responseJSON);
          
            if (xhr.status === 0) {
                alert('Not connect: Verify Network.');
            } else if (xhr.status == 404) {
                alert('Requested page not found [404]');
            } else if (xhr.status == 500) {
                alert('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                alert('Requested JSON parse failed.');//200
            } else if (textStatus === 'timeout') {
                alert('Time out error.');
            } else if (textStatus === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error: ' + xhr.responseText);
            }
          if (xhr.responseJSON == 'undefined' && xhr.responseJSON === null )
                  xhr.responseJSON = JSON.parse(xhr.responseText);
            
            // if (xhr.responseJSON.error.un){
            //     $("#un").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.un + "</span><br></div>");
            //     $("#sp_un").html("<span></span>");
            // }
            if (xhr.responseJSON.error.pbt){
                $("#pbt").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.pbt + "</span><br></div>");
                $("#sp_pbt").html("<span></span>");
            }

            if (xhr.responseJSON.error.country){
                $("#country").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.country + "</span><br></div>");
                $("#sp_country").html("<span></span>");
            }

            if (xhr.responseJSON.error.add1){
                $("#add1").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.add1 + "</span><br></div>");
                $("#sp_add1").html("<span></span>");
            }

            if (xhr.responseJSON.error.phone){
                $("#phone").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.phone + "</span><br></div>");
                $("#sp_phone").html("<span></span>");
            }

            if (xhr.responseJSON.error.email){
                $("#email").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.email + "</span><br></div>");
                $("#sp_email").html("<span></span>");
            }

            if (xhr.responseJSON.error.message){
                $("#message").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.message + "</span><br></div>");
                $("#sp_message").html("<span></span>");
            }
            if (xhr.responseJSON.error.price){
                $("#price").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error.price + "</span><br></div>");
                $("#sp_price").html("<span></span>");
            }

            if (xhr.responseJSON.error_avatar){
                $("#dropzone").focus().after("<div class='div_errPhp'><span  class='error' >" + xhr.responseJSON.error_avatar + "</span><br></div>");
                $("#sp_dropzone").html("<span></span>");
            }
            
            if (xhr.responseJSON.success1) {
                if (xhr.responseJSON.img_avatar !== "media/products/default-potho.jpg") {
                    alert("defaul");
                    //$("#progress").show();
                    //$("#bar").width('100%');
                    //$("#percent").html('100%');
                    //$('.msg').text('').removeClass('msg_error');
                    //$('.msg').text('Success Upload image!!').addClass('msg_ok').animate({ 'right' : '300px' }, 300);
                }
            } else {
                alert("dsfsdfffffffffff");
                $("#progress").hide();
                $('.msg').text('').removeClass('msg_ok');
                $('.msg').text('Error Upload image!!').addClass('msg_error').animate({'right': '300px'}, 300);
            }
        });

        }//end if(result)   

}//end  validaForm  







