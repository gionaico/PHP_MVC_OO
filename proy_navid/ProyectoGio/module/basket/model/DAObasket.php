<?php
$path_validaphp = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';    
    include ($path_validaphp . "model/connect.php");
    class DAObasket{

  //   	function insertarPedido($array, $date){
  //   		$user=$array["user"];
  //           $precio_peddido=$array["precio_peddido"];

		// 	$sql = " INSERT INTO pedidos (user, order_date, total_price)"." VALUES ('$user', '$date', '$precio_peddido')";
		// 	$conexion = connect::conPedidos();
  //           $res = mysqli_query($conexion, $sql);
  //           connect::close($conexion);
  //           return $res;
		// }


		// function ObtId_pedido($array, $order_date){ 
		// 	$user=$array["user"];
  //           $total_price=$array["precio_peddido"];   

  //           $sql = 'SELECT id_pedido FROM pedidos WHERE user="'.$user.'" and order_date="'.$order_date.'" and total_price="'.$total_price.'"';    
  //        // 	$sql = " SELECT id_pedido FROM pedidos WHERE user='".$user."' and order_date='".$date."'  and total_price='".$precio_peddido."' "
  //       	// $sql = " INSERT INTO pedidos (user, order_date, total_price)"." VALUES ('$user', '$date', '$precio_peddido')";
  //       	$conexion = connect::conPedidos();
  //       	$res = mysqli_query($conexion, $sql);
  //       	connect::close($conexion);
  //       	// if ($res) {
  //       	// 	return "fgsdfgdfg";
  //       	// }else{
  //       	// 	return "63565654";
  //       	// }
			            
  //           return $res;
		// }
		// 
		function insertarPedido($array, $date, $array2){
			// echo ($array2[2]["quantity"]);
			// exit;
    		$user=$array["user"];
            $precio_peddido=$array["precio_peddido"];

			$sql = " INSERT INTO pedidos (user, order_date, total_price)"." VALUES ('$user', '$date', '$precio_peddido')";
			$conexion = connect::conPedidos();
            $res = mysqli_query($conexion, $sql);
            //$res2=false;
            $res3=false;

            if ($res) {
            	$sql2 = 'SELECT id_pedido FROM pedidos WHERE user="'.$user.'" and order_date="'.$date.'" and total_price="'.$precio_peddido.'"';    
            	$res2 = mysqli_query($conexion, $sql2);

            	if ($res2) {
	            	$id_pedido=$res2->fetch_assoc();
	           			// $id_pedido['id_pedido']
	           			
	           			$conexion3 = connect::conProd_comprados(); 
	           			for ($i=0; $i <count($array2) ; $i++) { 
	           				$cod_pro=$array2[$i]["id"];
	           				$quantity=$array2[$i]["quantity"];
	           				$sql3="";
	           				$sql3 = 'INSERT INTO prod_comprados (id_pedido, cod_pro, quantity) VALUES ("'.$id_pedido['id_pedido'].'", "'.$cod_pro.'", "'.$quantity.'")'; 
	           				$res3 = mysqli_query($conexion3, $sql3);
	           			}
            	}
            }
        	connect::close($conexion);
       		connect::close($conexion3);
            return $res3;
		}


		// function ObtId_pedido($array, $order_date){ 
		// 	$user=$array["user"];
  //           $total_price=$array["precio_peddido"];   

  //           $sql = 'SELECT id_pedido FROM pedidos WHERE user="'.$user.'" and order_date="'.$order_date.'" and total_price="'.$precio_peddido.'"';    
  //        // 	$sql = " SELECT id_pedido FROM pedidos WHERE user='".$user."' and order_date='".$date."'  and total_price='".$precio_peddido."' "
  //       	// $sql = " INSERT INTO pedidos (user, order_date, total_price)"." VALUES ('$user', '$date', '$precio_peddido')";
  //       	$conexion = connect::conPedidos();
  //       	$res = mysqli_query($conexion, $sql);
  //       	connect::close($conexion);
  //       	// if ($res) {
  //       	// 	return "fgsdfgdfg";
  //       	// }else{
  //       	// 	return "63565654";
  //       	// }
			            
  //           return $res;
		// }

    }
?>