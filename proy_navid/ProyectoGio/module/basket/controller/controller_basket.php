<?php
@session_start();
	 $_SESSION['cant_total'];
	 $_SESSION['prod_carritos'];
		
	switch ($_GET['basket']) {
		case 'menu_basket':
			echo ($_SESSION['cant_total']);
			exit;
			break;
		case 'view_basket':
			
			echo json_encode($_SESSION['All_p']);
			exit;
			break;
		
		default:
			# code...
			break;
	}
?>