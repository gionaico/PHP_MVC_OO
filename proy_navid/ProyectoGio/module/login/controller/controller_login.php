<?php
session_start();

// echo ($_POST["login_users_json"]);//imrime en forma de alert
// exit;
$path_controllerLogin = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';
        include ($path_controllerLogin . "module/login/model/DAOlogin.php");
        include ($path_controllerLogin . "module/login/model/validaLogin.php");


if (isset($_POST['login_users_json'])) {
    log_user();
}

if (isset($_POST['UserName'])) {
    if (userAlreadyExists_m($_POST['UserName'])) {
        $rdo=getEmail($_POST['UserName']);
        $email =$rdo->fetch_assoc();
        $_SESSION['UserRecovPass']=$_POST['UserName'];
        $_SESSION['codigo']=generaCodigo();
        $_SESSION['us']=$_POST['UserName'];
        $send_email=send_mailgun($email['email'], $_SESSION['codigo']);
        //$BorrarCodes=BorrarCodes($_POST['UserName']);
        
        //$insertarCodigo=insertCode($_POST['UserName'], $codigo);
        $r=array('resultado' => true, 
                            'code' => $_SESSION['codigo']);
        echo json_encode($r) ;
        exit;

    }else{
            echo false;
            exit;
    }

}

if (isset($_POST['datosRecoverPass'])) {
    $CambiaPasswo=CambiaPasswo($_SESSION['UserRecovPass'],$_POST['datosRecoverPass']);
    if ($CambiaPasswo) {
        echo true;
        exit;
    }else{
        echo false;
        exit;
    }
    //echo ($_POST['datosRecoverPass']);

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
}//end log_user

    function send_mailgun($email, $code){
            $config = array();
            $config['api_key'] = ""; //API Key
            $config['api_url'] = "https://api.mailgun.net/v2/sandbox4c1cb4d3fb9146438f1411d073994e1d.mailgun.org/messages"; //API Base URL
            
            $message = array();
            $message['from'] = "gmc.yanez@gmail.com";
            $message['to'] = $email;
            $message['h:Reply-To'] = "gm.ec@hotmail.com";
            $message['subject'] = "Code to recover password";
            $message['html'] = '<p>Your code es '.$code.'</p>';
         
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $config['api_url']);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_POST, true); 
            curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }


    function generaCodigo(){
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena=strlen($cadena);
         
        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass=10;
         
        //Creamos la contraseña
        for($i=1 ; $i<=$longitudPass ; $i++){
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos=rand(0,$longitudCadena-1);
         
            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }



