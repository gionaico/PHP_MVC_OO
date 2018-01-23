<?php
session_start();

// echo ($_POST["login_users_json"]);//imrime en forma de alert
// exit;
$path_controllerLogin = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';
        include ($path_controllerLogin . "module/login/model/validaLogin.php");


if (isset($_POST['login_users_json'])) {
    log_user();
}

function log_user() {
    //echo ($_POST["login_users_json"]);//imrime en forma de alert
    $jsondata = array();
    $usersJSON = json_decode($_POST["login_users_json"], true);//convierte en un array asociativo
    
    $result = validate_user_log($usersJSON);
    // echo($result['datos']['user_log']);
    // exit;
    if ($result['resultado']) {//$result['resultado'] viene de valida_php
 // echo("exito");
 //    exit;
        $arrArgument = array(
            'user_log' => ucfirst($result['datos']['user_log']),
            'password_log' => $result['datos']['password_log'],

        );

        $mensaje = "Welcome " .$result['datos']['user_log'];

        //redirigir a otra p�gina con los datos de $arrArgument y $mensaje
        // $callback = "index.php?page=sing_in&op=create&check=true";/////////////////////////////////////////////////////

        $jsondata["success"] = true;
        $jsondata["user_log"] = $result['datos']['user_log'];
        $jsondata["logUser_type"] = $result['logUser_type'];
        
        
        $_SESSION['user_log'] = $jsondata["user_log"];
        $_SESSION['user_type'] = $result["logUser_type"];
        
    //    echo($jsondata["user_log"] );
    // exit;
        // $jsondata["redirect"] = $callback;
       // echo("seguimos aqui");
       // echo ($_SESSION['msje']);
        echo json_encode($jsondata);
        exit;
    } else {
    //     echo('d   '.$result['error']['user_log'].'  fgdfg');
    // exit;
        $error = $result['error'];
        // $error_avatar = $result_avatar['error'];
        $jsondata["success"] = false;
        $jsondata["error"] = $result['error'];
        // $jsondata["error_avatar"] = $result_avatar['error'];

        // $jsondata["success1"] = false;
        // if ($result_avatar['resultado']) {
        //     $jsondata["success1"] = true;
        //     $jsondata["img_avatar"] = $result_avatar['datos'];
        // }
        header('HTTP/1.0 400 Bad error');
        echo json_encode($jsondata);
        //exit;
    }
}


