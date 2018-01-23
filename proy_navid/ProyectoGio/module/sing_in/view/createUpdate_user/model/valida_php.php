<?php
$path_validaphp = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';
    // include($path . "module/user/model/DAOUser.php");
    
    include ($path_validaphp . "model/connect.php");

function validate_user($value) {
    $error = array();
    $valido = true;
    $filtro = array(
        'un' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9A-Z]{3,20}$/')
        ),
        'fn' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[A-Z]{3,30}$/')
        ),
        'ln' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[A-Z]{3,20}$/')
        ),
        'dni' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9]{8}[A-Z]$/')
        ),
        'birth_date' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^(0[1-9]|1[012]).(0[1-9]|1[0-9]|2[0-9]|3[01]).[0-9]{4}$/')
        ),
        'add1' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[A-Z1-9 ]{5,}$/')
        ),
        'zip' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9]{4}$/')
        ),
        'phone' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9]{9}$/')
        ),
        'email' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[_A-Z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/')
        ),
        'password' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^(?=.{8,})(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\\s).*$/')
        ),
        'cmpny' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[A-Z]{3,20}$/')
        ),
        
    );

    $resultado = filter_var_array($value, $filtro);

    $resultado['country'] = $value['country'];
    if ($value['country'] === 'Select country') {
        $error['country'] = "*php You haven't select a country.";
        $valido = false;
    }
    $resultado['genere']=$value['genere'];

   
    $resultado['interests'] =$value['interests'];


    


    $type_form = $value['type_form'];

    if (($resultado!=null) && ($resultado)) {


        if (!$resultado['un']) {
            $error['un'] = '<strong>*php</strong> Please write with capital letters';
            $valido = false;
        }else{
            if ($type_form=="create") {
                if (userAlreadyExists_m("user", $resultado['un'])) {
                    $error['un'] = '<strong>*php</strong> This User name alreary exist in DB';
                    $valido = false;
                }
            }
        }

        if (!$resultado['fn']) {
            $error['fn'] = '<strong>*php</strong> Format must be min 3 characters';
            $valido = false;
        }


        if (!$resultado['ln']) {
            $error['ln'] = '<strong>*php</strong> Format must be min 3 characters';
            $valido = false;
        }

        if (!$resultado['dni']) {
            $error['dni'] = '<strong>*php</strong> Invalid DNI. Format: 12345678D';
            $valido = false;
        }else{
                if ($type_form=="create") {
                    if (validar_dni($resultado['dni'])) {
                        if (userAlreadyExists_m("dni", $resultado['dni'])) {
                            $error['dni'] = '<strong>*php</strong> This User name alreary exist in DB';
                            $valido = false;
                        }
                    }else{
                         $error['dni'] = '<strong>*php</strong> This dni is not correct';
                         $valido = false;
                    }
                }
            
        }

        if (!$resultado['birth_date']) {
            if ($resultado['birth_date'] == "") {
                $error['birth_date'] = "<strong>*php</strong> this camp can't empty";
                $valido = false;
            } else {
                $error['birth_date'] = '<strong>*php</strong> error format date (mm/dd/yyyy)';
                $valido = false;
            }
        }else{
            //validate to user's over 16
            $dates = validateAge($resultado['birth_date']);
            // echo '<script language="javascript">alert('.$dates.');</script>'; 
            
            if (!$dates) {
                $error['birth_date'] = '<strong>*php</strong> Your age must be greater than 20 years';
                $valido = false;
            }
        }


        if (!$resultado['add1']) {
            $error['add1'] = '<strong>*php</strong> User must be min 5 characters';
            $valido = false;
        }

        if (!$resultado['zip']) {
            $error['zip'] = '<strong>*php</strong> Zip must be 4 numeric characters';
            $valido = false;
        }


        if (!$resultado['phone']) {
            $error['phone'] = '<strong>*php</strong> Format must be min 9 numeric characters';
            $valido = false;
        }else{
            if ($type_form=="create") {
                if (userAlreadyExists_m("phone", $resultado['phone'])) {
                    $error['phone'] = '<strong>*php</strong> This Phone alreary exist in DB';
                    $valido = false;
                }
            }elseif ($type_form=="update") {
                if (userAlreadyExists_update($resultado['un'], "phone", $resultado['phone'])) {
                    $error['phone'] = '<strong>*php</strong> This phone is been used by other User';
                    $valido = false;
                }
            }
        }


        if (!$resultado['email']) {
            $error['email'] = '<strong>*php</strong> Invalid Email';
            $valido = false;
        }else{
            if ($type_form=="create") {
                if (userAlreadyExists_m("email", $resultado['email'])) {
                    $error['email'] = '<strong>*php</strong> This email alreary exist in DB';
                    $valido = false;
                }
            }elseif ($type_form=="update") {
                if (userAlreadyExists_update($resultado['un'], "email", $resultado['email'])) {
                    $error['email'] = '<strong>*php</strong> This email is been used by other User';
                    $valido = false;
                }
            }
        }

        if (!$resultado['password']) {
            $error['password'] = '<strong>*php</strong> Invalid Format: Ex:12345678Aa';
            $valido = false;
        }

        if (!$resultado['cmpny']) {
            $error['cmpny'] = '<strong>*php</strong> Invalid Format. It must be min 3 characters';
            $valido = false;
        }

        if (!$resultado['interests']) {
            $error['interests'] = '<strong>*php</strong> Invalid Format. Select min 1 hobbie';
            $valido = false;
        }

    } else {
        $valido = false;
    };
    
    return $return = array('resultado' => $valido, 
                            'error' => $error, 
                            'datos' => $resultado);
}

    function validateAge($birthday) {
        // $birthday can be UNIX_TMESTAMP or just a string-date.
        $age = (20 * 31536000);
        $year_today=time();
        $today=getdate();
      
        
        if (is_string($birthday)) {
            // $time = strtotime($birthday);
            $birthday = strtotime($birthday);
            // $newformat = date('Y-m-d',$time);
            // return $newformat;

            // check
            // 31536000 is the number of seconds in a 365 days year.
            if ((time() - $birthday) < $age) {
                return false; //
           }
        }
        return true;
    }


    function userAlreadyExists_m($campo, $value){

            $sql=("SELECT * FROM usuario2 WHERE $campo ='$value' ");
        
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            
            $res_consulta=mysqli_num_rows($res);

            if($res_consulta!=0){
                connect::close($conexion);
                return true;
            }else{
                connect::close($conexion);
                return false;
            }

       
    }


    function userAlreadyExists_update($user, $campo, $value){

            $sql=("SELECT * FROM usuario2 WHERE $campo ='$value' and user !='$user'");
        
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            
            $res_consulta=mysqli_num_rows($res);

            if($res_consulta!=0){
                connect::close($conexion);
                return true;
            }else{
                connect::close($conexion);
                return false;
            }

       
    }

    function validar_dni($dni){
        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);
        if ( substr("TRWAGMYFPDXBNJZSQVHLCKET", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){ // dni argentina  8 caracteres
            return true;
        }
        return false;
        
    }


// function valida_dates($start_days, $dayslight) {

//     $start_day = date("m/d/Y", strtotime($start_days));
//     $daylight = date("m/d/Y", strtotime($dayslight));

//     list($mes_one, $dia_one, $anio_one) = split('/', $start_day);
//     list($mes_two, $dia_two, $anio_two) = split('/', $daylight);

//     $dateOne = new DateTime($anio_one . "-" . $mes_one . "-" . $dia_one);
//     $dateTwo = new DateTime($anio_two . "-" . $mes_two . "-" . $dia_two);

//     if ($dateOne <= $dateTwo) {
//         return true;
//     }
//     return false;
// }