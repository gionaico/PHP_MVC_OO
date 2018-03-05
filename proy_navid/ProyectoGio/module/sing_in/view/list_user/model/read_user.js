$(document).ready(function () {

    $('.user_read').click(function () { //modal_read
        var id = this.getAttribute('id');
        //alert(id);

		$.get('module/sing_in/controller/controller_sing_in.php?op=read&modal='+id, 
        function (respose) {
             var json = JSON.parse(respose);
             console.log(json);
            
            if(json === 'error') {
                //console.log(json);
                //pintar 503
			    window.location.href='index.php?page=503';
            }else{
                console.log(json.genere);
                $("#user").html(json.user);
                $("#first_name").html(json.first_name);
                $("#last_name").html(json.last_name);
                $("#dni").html(json.dni);
                $("#birthdate").html(json.birthdate);
                $("#genere").html(json.genere);
                $("#country").html(json.country);
                $("#address").html(json.address);
                $("#zip").html(json.zip);
                $("#phone").html(json.phone);
                $("#email").html(json.email);
                $("#cmpy").html(json.cmpy);
                $("#hobbies").html(json.hobbies);
     
                
                //$("#details_user").show();
             
                // $("#user_modal").dialog({
                //     width: 850, //<!-- ------------- ancho de la ventana -->
                //     height: 500, //<!--  ------------- altura de la ventana -->
                //     //show: "scale", <!-- ----------- animación de la ventana al aparecer -->
                //     //hide: "scale", <!-- ----------- animación al cerrar la ventana -->
                //     resizable: "false", //<!-- ------ fija o redimensionable si ponemos este valor a "true" -->
                //     //position: "down",<!--  ------ posicion de la ventana en la pantalla (left, top, right...) -->
                //     modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
                //     buttons: {
                //         Ok: function () {
                //             $(this).dialog("close");
                //         }
                //     },
                //     show: {
                //         effect: "blind",
                //         duration: 1000
                //     },
                //     hide: {
                //         effect: "explode",
                //         duration: 1000
                //     }
                // });
            }//end-else
        });
    });

    $('.user_delete').click(function () { //modal_delete
            var id = this.getAttribute('id');
            console.log(id);
            //alert(id);

            $.get('module/sing_in/controller/controller_sing_in.php?op=delete&modal='+id, 
            function (respose) {
                 var json = JSON.parse(respose);
                 console.log(json);
                
                if(json === 'error') {
                    //console.log(json);
                    //pintar 503
                    window.location.href='index.php?page=503';
                }else{

                    console.log(json.genere);
                    $("#user_delete_id").html(json.user);
                    $('.user_delete_ok').click(function () { //modal_delete
                    /////////////////////////
                    console.log(id);
                    //alert(id);

                    $.get('module/sing_in/controller/controller_sing_in.php?op=delete&answer='+id, 
                    function (respose) {
                         //var json = JSON.parse(respose);
                         console.log(respose);
                        
                        if(respose === 'error') {
                            //console.log(json);
                            //pintar 503
                            window.location.href='index.php?page=503';
                        }else{
                            alert("User deleted successful");
                            window.location.href='index.php?page=sing_in&op=list';
                            
                        }//end-else
                    });
                });//////////////////////////////
                }//end-else
            });
        });


    




	});