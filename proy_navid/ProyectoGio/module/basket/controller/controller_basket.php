<?php
@session_start();
$path_controller = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';    
    include ($path_controller . "module/basket/model/DAObasket.php");

	 $_SESSION['cant_total'];
	 $_SESSION['prod_carritos'];
		
	switch ($_GET['basket']) {

		case 't_pedidos'://llega de basket.js
			$Pedido = json_decode($_POST["jsonPedido"], true);
			$date_today=date("m.d.y");

			$daoPedido = new DAObasket();
            $rdo = $daoPedido->insertarPedido($Pedido, $date_today);

            if ($rdo) {
            	$msn="You will recieve your products in the next days";
            }else{
            	$msn="Error DB";
            }
			echo json_encode($msn);
			exit;
			break;
		
		default:
			# code...
			break;
	}
?>