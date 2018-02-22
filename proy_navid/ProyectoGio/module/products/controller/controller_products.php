<?php
session_start();
//include  with absolute route

include ($_SERVER['DOCUMENT_ROOT'] . "/proy_navid/ProyectoGio/module/products/utils/validaPhp.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/proy_navid/ProyectoGio/utils/common.inc.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/proy_navid/ProyectoGio/utils/uploadP.php");

//////////////////////////////////////////////////////////////// upload
if ((isset($_GET["upload"])) && ($_GET["upload"] == true)) {
    $result_avatar = upload_filesP();
    $_SESSION['result_avatar'] = $result_avatar;
    //echo debug($_SESSION['result_avatar']); //se mostraría en alert(response); de dropzone.js
}

// echo '<script language="javascript">alert("pepon "'.$_SESSION['result_avatar']['datos'].');</script>'; 
// exit;

//////////////////////////////////////////////////////////////// alta_products
if ((isset($_POST['alta_users_json']))) {

    alta_users();
} 




function alta_users() {

    // echo ($_POST["alta_users_json"]);//imrime en forma de alert
    // exit;

    $jsondata = array();
    $usersJSON = json_decode($_POST["alta_users_json"], true);//convierte en un array asociativo
    
    $result = validate_prod($usersJSON);
    // echo ($result['datos']['price']);//imrime en forma de alert
    // exit;
    $date_today=date("y/m/d");

    if (empty($_SESSION['result_avatar'])) {
        $_SESSION['result_avatar'] = array('resultado' => true, 'error' => "", 'datos' => 'media/products/default-potho.jpg');
    }

    $result_avatar = $_SESSION['result_avatar'];
    $_SESSION['result_avatar']=null;

    if ($result['resultado']) {//$result['resultado'] viene de valida_php
        //echo "es valido";
        //exit;
        if ($result['datos']['product_type']==='Sale Vehicle') {
            $arrArgument = array(
                'un' => ucfirst($result['datos']['un']),
                'pbt' => ucfirst($result['datos']['pbt']),
                'country' => strtoupper($result['datos']['country']),
                'province' => strtoupper($result['datos']['province']),
                'city' => strtoupper($result['datos']['city']),
                'add1' => $result['datos']['add1'],
                'phone' => $result['datos']['phone'],
                'email' => $result['datos']['email'],
                'message' => $result['datos']['message'],
                'price' => $result['datos']['price'],
                'product_type' => $result['datos']['product_type'],
                'brand' => $result['datos']['brand'],
                'model' => $result['datos']['model'],
                'year' => $result['datos']['year'],
                'combustible' => $result['datos']['combustible'],
                'color' => $result['datos']['color'],
                'date_today' => $date_today,
                'avatar' => $result_avatar['datos']
            );
        }else{
            $arrArgument = array(
                'un' => ucfirst($result['datos']['un']),
                'pbt' => ucfirst($result['datos']['pbt']),
                'country' => strtoupper($result['datos']['country']),
                'province' => strtoupper($result['datos']['province']),
                'city' => strtoupper($result['datos']['city']),
                'add1' => $result['datos']['add1'],
                'phone' => $result['datos']['phone'],
                'email' => $result['datos']['email'],
                'message' => $result['datos']['message'],
                'price' => $result['datos']['price'],
                'product_type' => $result['datos']['product_type'],
                'date_today' =>$date_today,
                'avatar' => $result_avatar['datos']
            );
        }

        // echo $arrArgument['price'];
        // exit;

        $arrValue = false;
        $path_model = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/module/products/model/model/';
        $arrValue = loadModel($path_model, "products_model", "create_product", $arrArgument);
          //echo json_encode($arrValue);
              //die();

        if ($arrValue){
            $mensaje = "Product has been successfull registered";
        }else{
            $mensaje = "Problem ocurred registering a porduct";
        }





        //redirigir a otra p�gina con los datos de $arrArgument y $mensaje
        $_SESSION['user'] = $arrArgument;
        $_SESSION['msje'] = $mensaje;
        
        $callback = "index.php?module=products&view=results_products";
        $jsondata["success"] = true;
        $jsondata["redirect"] = $callback;
       // echo("seguimos aqui");
       // echo "jsondata";
       // echo ($jsondata['redirect']);
       // exit;
        echo json_encode($jsondata);
        exit;
    } else {
        // $error = $result['error'];
        // $error_avatar = $result_avatar['error'];
        $jsondata["success"] = false;
        $jsondata["error"] = $result['error'];
        $jsondata["error_avatar"] = $result_avatar['error'];

        $jsondata["success1"] = false;
        if ($result_avatar['resultado']) {
            $jsondata["success1"] = true;
            $jsondata["img_avatar"] = $result_avatar['datos'];
        }

        header('HTTP/1.0 400 Bad error');
        echo json_encode($jsondata);
        //exit;
    }
}










//////////////////////////////////////////////////////////////// delete
if (isset($_GET["delete"]) && $_GET["delete"] == true) {
    $_SESSION['result_avatar'] = array();
    $result = remove_file();
    if ($result === true) {
        //echo("true");
        //exit;
        echo json_encode(array("res" => true));
        exit;
    } else {
        //echo("false");
        //exit;
        echo json_encode(array("res" => false));
        exit;
    }
}











//////////////////////////////////////////////////////////////// load
if (isset($_GET["load"]) && $_GET["load"] == true) {

    $jsondata = array();
    if (isset($_SESSION['user'])) {
        //echo debug($_SESSION['user']);
        $jsondata["user"] = $_SESSION['user'];
    }
    if (isset($_SESSION['msje'])) {
        //echo $_SESSION['msje'];
        $jsondata["msje"] = $_SESSION['msje'];
    }
    close_session();
    echo json_encode($jsondata);
    exit;
}








function close_session() {
    unset($_SESSION['user']);
    unset($_SESSION['msje']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}


/////////////////////////////////////////////////// load_data
if (isset($_GET["load_data"]) && $_GET["load_data"] == true) {
    $jsondata = array();
    if (isset($_SESSION['user'])) {
        $jsondata["user"] = $_SESSION['user'];
        echo json_encode($jsondata);
        exit;
    } else {
        $jsondata["user"] = "";
        echo json_encode($jsondata);
        exit;
    }
}


/////////////////////////////////////////////////// load_country
if(  (isset($_GET["load_country"])) && ($_GET["load_country"] == true)  ){
        $json = array();

        $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';
        $path_model=$_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/module/products/model/model/';
        $json = loadModel($path_model, "products_model", "obtain_countries", $url);
        echo $json;
            exit;
        if($json){
            echo $json;
            exit;
        }else{
            $json = "error";
            echo $json;
            exit;
        }
    }

/////////////////////////////////////////////////// load_provinces
if(  (isset($_GET["load_provinces"])) && ($_GET["load_provinces"] == true)  ){
        $jsondata = array();
        $json = array();

        $path_model=$_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/module/products/model/model/';
        $json = loadModel($path_model, "products_model", "obtain_provinces");

        if($json){
            $jsondata["provinces"] = $json;
            echo json_encode($jsondata);
            exit;
        }else{
            $jsondata["provinces"] = "error";
            echo json_encode($jsondata);
            exit;
        }
    }

/////////////////////////////////////////////////// load_cities
if(  isset($_POST['idPoblac']) ){
        $jsondata = array();
        $json = array();

        $path_model=$_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/module/products/model/model/';
        $json = loadModel($path_model, "products_model", "obtain_cities", $_POST['idPoblac']);

        if($json){
            $jsondata["cities"] = $json;
            echo json_encode($jsondata);
            exit;
        }else{
            $jsondata["cities"] = "error";
            echo json_encode($jsondata);
            exit;
        }
    }
