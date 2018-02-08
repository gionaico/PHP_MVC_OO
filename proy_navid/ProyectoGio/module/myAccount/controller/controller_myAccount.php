<?php
@session_start();
$path_controller = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';    
    include ($path_controller . "module/myAccount/model/DAOmyAccount.php");
		
	switch ($_GET['type']) {

		case 'pedidos'://llega de basket.js
      $user= $_POST["usuarioLogeado"];
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
          'order_date' => $row['order_date']
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
              'titulo' => $row['title'],
              'foto' => $row['avatar'],
              'price' => $pedido2[$j]['price'],
              'total_price' => $pedido2[$j]['total_price'],
              'order_date' => $pedido2[$j]['order_date']
            );
            array_push($a_new, $prod);
          }
        }
        array_push($ap, $a_new);
        }
      }

      echo json_encode($ap);
      exit;
      

			break;

		default:
			# code...
			break;
	}
?>