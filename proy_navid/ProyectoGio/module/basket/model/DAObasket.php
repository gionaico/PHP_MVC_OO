<?php
$path_validaphp = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';    
    include ($path_validaphp . "model/connectCompras.php");
    class DAObasket{

    	function insertarPedido($array, $date){
    		$user=$array["user"];
            $precio_peddido=$array["precio_peddido"];

			$sql = " INSERT INTO pedidos (user, order_date, total_price)"." VALUES ('$user', '$date', '$precio_peddido')";
            
			
			$conexion = connect::conPedidos();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}

    }
?>