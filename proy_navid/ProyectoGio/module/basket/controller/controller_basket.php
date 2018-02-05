<?php
@session_start();
$path_controller = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';    
    include ($path_controller . "module/basket/model/DAObasket.php");

	 $_SESSION['cant_total'];
	 $_SESSION['prod_carritos'];
		
	switch ($_GET['basket']) {

		// case 't_pedidos'://llega de basket.js
		// 	$Pedido = json_decode($_POST["jsonPedido"], true);
		// 	$date_today=date("m.d.y");
		// 	$productosPedido=json_decode($_POST["productosPedido"], true);

		// 	$daoPedido = new DAObasket();
  //           $rdo = $daoPedido->insertarPedido($Pedido, $date_today);

  //           if ($rdo) {
  //           	$daoPedido2 = new DAObasket();
  //          		$rdo2 = $daoPedido->ObtId_pedido($Pedido, $date_today);
  //          		if ($rdo2) {
  //          			$id_pedido=$rdo2->fetch_assoc();
  //          			// $id_pedido['id_pedido']
  //           	$msn="You will recieve your products in the next days";
  //          		}
  //          		$msn="You";
  //           }else{
  //           	$msn="Error DB";
  //           }
		// 	echo json_encode($id_pedido['id_pedido']);
		// 	exit;
		// 	break;
		case 't_pedidos'://llega de basket.js
			$Pedido = json_decode($_POST["jsonPedido"], true);
			$date_today=date("m.d.y");
			$productosPedido=json_decode($_POST["productosPedido"], true);
			// echo (count($productosPedido));
			// exit;

			$daoPedido = new DAObasket();
            $rdo = $daoPedido->insertarPedido($Pedido, $date_today, $productosPedido);

            if ($rdo) {
            	// $daoPedido2 = new DAObasket();
           		// $rdo2 = $daoPedido->ObtId_pedido($Pedido, $date_today);
           		// if ($rdo2) {
           		// 	$id_pedido=$rdo2->fetch_assoc();
           		// 	// $id_pedido['id_pedido']
            	$msn="You will recieve your products in the next days";
            	$success=true;
           		
            }else{
            	$msn="Error DB";
            	$success=false;
            }
            

			echo json_encode(array('resultado' => $msn, 
                'success' => $success));
			exit;
			break;

		default:
			# code...
			break;
	}
?>