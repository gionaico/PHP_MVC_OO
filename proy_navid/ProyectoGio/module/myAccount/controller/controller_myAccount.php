<?php
@session_start();
$path_controller = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';    
    include ($path_controller . "module/myAccount/model/DAOmyAccount.php");

	switch ($_GET['type']) {

		case 'pedidos'://llega de basket.js
    if (isset($_GET['checkUser'])) {

      echo json_encode($_SESSION['usuarioLogueado75']);
      exit;
    }
      $user= $_SESSION["usuarioLogueado75"]['user_log'];
      $daoMyAccount = new DAOmyAccount();
      $rdo = $daoMyAccount->AllPedidos($user);

      $pedido = array();
      foreach ($rdo as $row) {

        $datos_pedido = array(
          'id_pedido' => $row['id_pedido'],
          'cod_pro' => $row['cod_pro'],
          'titulo' => $row['title'],
          'foto' => $row['avatar'],
          'price' => $row['price'],
          'total_price' => $row['total_price'],
          'order_date' => $row['order_date'],
          'description' => $row['description']
        );
        array_push($pedido, $datos_pedido);
      }


      $id_pedido="";
      $ap=array();
      $pedido2=$pedido;
      for ($i=0; $i <count($pedido); $i++) { 
        $a_new=array();
        $cont=0;
        if ($pedido[$i]['id_pedido']!=$id_pedido) {
          $id_pedido=$pedido[$i]['id_pedido'];
        
        for ($j=0; $j <count($pedido2); $j++) { 
        $prod=array();
          if ($pedido[$i]['id_pedido']==$pedido2[$j]['id_pedido']) {
            $prod=array(
              'id_pedido' => $pedido2[$j]['id_pedido'],
              'cod_pro' => $pedido2[$j]['cod_pro'],
              'titulo' => $pedido2[$j]['titulo'],
              'foto' => $pedido2[$j]['foto'],
              'price' => $pedido2[$j]['price'],
              'total_price' => $pedido2[$j]['total_price'],
              'order_date' => $pedido2[$j]['order_date'],
              'description' => $pedido2[$j]['description']
            );
            array_push($a_new, $prod);
          }
        }
        array_push($ap, $a_new);
        }
      }

      echo json_encode($ap);
      exit;
      
    case 'likes':
      $user_name=$_SESSION['usuarioLogueado75'];
      $daoA = new DAOmyAccount();
      // echo ($user_name['user_log'].$cod_prod);
      $rdo = $daoA->productsLikes($user_name['user_log']);

      $productos = array();
      foreach ($rdo as $row) {

        $datos_productos = array(          
          'cod_pro' => $row['cod_pro'],
          'avatar' => $row['avatar'],
          'product_type' => $row['product_type'],
          'price' => $row['price'],
          'date_today' => $row['date_today'],
          'description' => $row['description'],
          'phone' => $row['phone'],
          'email' => $row['email'],
          'country' => $row['country'],
          'title' => $row['title'],                          
        );
        array_push($productos, $datos_productos);
      }
      echo json_encode($productos);
      exit;
      break;			

    case 'EditPerfile':
        $user= $_POST["usuarioLogeado"];
        $daoMyAccount = new DAOmyAccount();
        $rdo = $daoMyAccount->UserDetails($user);
        // $res=$rdo->fetch_assoc();      
        echo json_encode($rdo->fetch_assoc());
        exit;

        break;

    case 'ChangeName':
        $dataJSON = json_decode($_POST["data"], true);
        $daoMyAccount = new DAOmyAccount();
        $rdo = $daoMyAccount->ChangeName($dataJSON);
        if ($rdo) {
          $msn="Your name and surname have been edited";
        }else{
          $msn="ERROR";
        }
        echo $msn;
        exit;
      // echo json_encode($dataJSON);

        exit;
      break;

    case 'ChangeEmail':
        $dataJSON = json_decode($_POST["data"], true);        
        $daoMyAccount = new DAOmyAccount();
        $rdo = $daoMyAccount->ChangeEmail($dataJSON);
        if ($rdo) {
          $msn="Your Email have been edited";
        }else{
          $msn="ERROR";
        }
        echo $msn;
        exit;
      // echo json_encode($dataJSON);

        exit;
      break;

    case 'ChangePass':
      $dataJSON = json_decode($_POST["data"], true);        
      $daoMyAccount = new DAOmyAccount();
       $rdo = $daoMyAccount->ChangePass($dataJSON);
       
       if (!$rdo) {
        $msn="Incorrect Password";
           echo (false);
           exit;
       }else{
        $msn="Your Password has been changed";    
          echo json_encode($msn);
            exit;
       }

      break;

    case 'ChangePhone':
        $dataJSON = json_decode($_POST["data"], true);        
        $daoMyAccount = new DAOmyAccount();
        $rdo = $daoMyAccount->ChangePhone($dataJSON);

        if ($rdo) {
          $msn="Your Phone have been edited";
        }else{
          $msn="ERROR";
        }
        echo $msn;
        exit;
      // echo json_encode($dataJSON);

        exit;
      break;

		default:
			# code...
			break;
	}
?>