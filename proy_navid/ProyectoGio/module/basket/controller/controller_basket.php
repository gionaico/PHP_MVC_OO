<?php
@session_start();
	 $_SESSION['cant_total'];
	 $_SESSION['prod_carritos'];
		
	switch ($_GET['basket']) {

		case 'menu_basket'://llega de view/js/carro_compra.js
			echo ($_SESSION['cant_total']);
			exit;
			break;

		case 'view_basket'://llega de basket.js
			echo json_encode($_SESSION['All_p']);
			exit;
			break;

		case 'select_quantity'://llega de basket.js
			$JSON = json_decode($_POST["dataProd_json"], true);
			$products=$_SESSION['All_p'];

			 echo "<PRE>";
			    print_r($_SESSION['All_p']);
			echo "</PRE>";
			for ($i=0; $i <count($_SESSION['All_p']) ; $i++) { 
                     if ($_SESSION['All_p'][$i]['id']==$JSON['id']) {
                        $_SESSION['All_p'][$i]['quantity']=$JSON['quantity'];
                        
                     }
                }
            echo "<PRE>";
			    print_r($_SESSION['All_p']);
			echo "</PRE>";
			//echo json_encode($JSON['id']);
			// echo json_encode($_POST['dataProd_json']);
			exit;
			break;

		// case 'view_basket'://llega de basket.js
		// 	echo json_encode($_SESSION['All_p']);
		// 	exit;
		// 	break;
		
		default:
			# code...
			break;
	}
?>