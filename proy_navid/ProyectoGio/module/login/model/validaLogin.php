<?php
$path_validaphp = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';
    // include($path . "module/user/model/DAOUser.php");
    
    include ($path_validaphp . "model/connect.php");
    include ($path_validaphp . "module/login/model/DAOlogin.php");

function validate_user_log ($value) {
    $error = array();
    $valido = true;
    $filtro = array(
        'user_log' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9A-Z]{3,20}$/')
        ),
        'password_log' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^(?=.{8,})(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\\s).*$/')
        )
        
    );

    $resultado = filter_var_array($value, $filtro);

    
    $logUser_type=null;
    if (($resultado!=null) && ($resultado)) {


        if (!$resultado['user_log']) {
            $error['user_log'] = '<strong>*php</strong> Please write with capital letters';
            $valido = false;
        }
        
        if (!$resultado['password_log']) {
            $error['password_log'] = '<strong>*php</strong> Invalid Format: Ex:12345678Aa';
            $valido = false;
        }

        if (($resultado['user_log'])&&($resultado['password_log'])) {
            $make_login=make_login($resultado['user_log'], $resultado['password_log']);
            if ($make_login['resultado']) {
            }else{
                $error['password_log'] = '<strong>*php</strong>'.$make_login['error'].' ';
                $valido = false;
            }
                $logUser_type=$make_login['logUser_type'];
        }

        
    } else {
        $valido = false;
    };
    
    return $return = array('resultado' => $valido, 
                            'error' => $error, 
                            'datos' => $resultado,
                            'logUser_type' => $logUser_type);
}









