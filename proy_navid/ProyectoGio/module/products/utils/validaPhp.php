<?php
function validate_prod($value) {
    $error = array();
    $valido = true;
    $filtro = array(
        'un' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9A-Z]{3,20}$/')
        ),
        'pbt' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[_A-Za-z0-9-\\+ ]{10,40}$/')
        ),
        'add1' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-zA-Z1-9 ]{5,}$/')
        ),
        'phone' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9]{9}$/')
        ),
        'email' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/')
        ),
        'message' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-zA-Z1-9 ]{20,}$/')
        ),
        
    );

    $resultado = filter_var_array($value, $filtro);

    $resultado['product_type'] = $value['product_type'];
    

    if ($resultado['product_type']==='Sale Vehicle') {
        $resultado['brand'] = $value['brand'];
        $resultado['model'] = $value['model'];
        $resultado['year'] = $value['year'];
        $resultado['combustible'] = $value['combustible'];
        $resultado['color'] = $value['color'];

        if ($resultado['brand']==='Select Brand') {
            $error['product_type'] = "*php You haven't select a Brand.";
            $valido = false;
        }
        if ($resultado['model']==='Select Model') {
            $error['product_type'] = "*php You haven't select a Model.";
            $valido = false;
        }
        if ($resultado['year']==='Select Year') {
            $error['product_type'] = "*php You haven't select a Year.";
            $valido = false;
        }
        if ($resultado['combustible']==='Select Combustible') {
            $error['product_type'] = "*php You haven't select a Combustible.";
            $valido = false;
        }
        if ($resultado['color']==='Select Color') {
            $error['product_type'] = "*php You haven't select a Color.";
            $valido = false;
        }
    }elseif ($resultado['product_type']==='Product Type:') {
        $error['product_type'] = "*php You haven't select a Product Type.";
        $valido = false;
    }

    $resultado['country'] = $value['country'];
    $resultado['province'] = $value['province'];
    $resultado['city'] = $value['city'];
    
    if ($value['country'] === 'Select country') {
        $error['country'] = "*php You haven't select a country.";
        $valido = false;
    }
    if ($resultado['province']==='Select province'){
            $error['province']="You need to choose a province";
            $valido = false;
    }

    if ($resultado['city']==='Select city'){
            $error['city']="You need to choose a city";
            $valido = false;
    }


    if (($resultado!=null) && ($resultado)) {


        if (!$resultado['un']) {
            $error['un'] = '<strong>*php</strong> Please write with capital letters';
            $valido = false;
        }

        if (!$resultado['pbt']) {
            $error['pbt'] = '<strong>*php</strong> Format must be min 3 characters';
            $valido = false;
        }

        if (!$resultado['add1']) {
            $error['add1'] = '<strong>*php</strong> User must be min 5 characters';
            $valido = false;
        }

        if (!$resultado['phone']) {
            $error['phone'] = '<strong>*php</strong> Format must be min 9 numeric characters';
            $valido = false;
        }

        if (!$resultado['email']) {
            $error['email'] = '<strong>*php</strong> Invalid Email';
            $valido = false;
        }

        if (!$resultado['message']) {
            $error['message'] = '<strong>*php</strong> Invalid Format. It must be min 3 characters';
            $valido = false;
        }

    } else {
        $valido = false;
    }
    
    return $return = array('resultado' => $valido, 
                            'error' => $error, 
                            'datos' => $resultado);
}
