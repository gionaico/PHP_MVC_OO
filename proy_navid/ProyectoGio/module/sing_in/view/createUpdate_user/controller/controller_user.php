<?php
session_start();

include ($_SERVER['DOCUMENT_ROOT'] .'/proy_navid/ProyectoGio/module/sing_in/view/createUpdate_user/model/valida_php.php');
// echo ($_POST["alta_users_json"]);//imrime en forma de alert
// exit;

if ((isset($_POST['alta_users_json']))) {

    alta_user();
} 

function alta_user() {
    //echo ($_POST["alta_users_json"]);//imrime en forma de alert
    $jsondata = array();
    $usersJSON = json_decode($_POST["alta_users_json"], true);//convierte en un array asociativo
    
    if($usersJSON['type_form']=="create"){
        $callback = "index.php?page=sing_in&op=create&check=true";
    }else{
        $callback = "index.php?page=sing_in&op=update&check=true";
    }

    $result = validate_user($usersJSON);
    // echo ($result['resultado']);
    // exit;

    // if (empty($_SESSION['result_avatar'])) {
    //     $_SESSION['result_avatar'] = array('resultado' => true, 'error' => "", 'datos' => 'media/default-avatar.png');
    // }

    // $result_avatar = $_SESSION['result_avatar'];

    if ($result['resultado']) {//$result['resultado'] viene de valida_php

        $arrArgument = array(
            'un' => ucfirst($result['datos']['un']),
            'fn' => ucfirst($result['datos']['fn']),
            'ln' => ucfirst($result['datos']['ln']),
            'dni' => $result['datos']['dni'],
            'birth_date' => $result['datos']['birth_date'],
            'genere' => $result['datos']['genere'],
            'country' => strtoupper($result['datos']['country']),
            'add1' => strtoupper($result['datos']['add1']),
            'zip' => $result['datos']['zip'],
            'phone' => $result['datos']['phone'],
            'email' => $result['datos']['email'],
            'password' => $result['datos']['password'],
            'cmpny' => $result['datos']['cmpny'],
            'interests' => $result['datos']['interests'],

            // 'avatar' => $result_avatar['datos']
        );

        $mensaje = "User has been successfully registered";

        //redirigir a otra p�gina con los datos de $arrArgument y $mensaje
        $_SESSION['user'] = $arrArgument;
        $_SESSION['msje'] = $mensaje;
         $callback = "index.php?page=sing_in&op=create&check=true";/////////////////////////////////////////////////////

        $jsondata["success"] = true;
        $jsondata["redirect"] = $callback;
       // echo("seguimos aqui");
       // echo ($_SESSION['msje']);
        echo json_encode($jsondata);
        exit;
    } else {
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