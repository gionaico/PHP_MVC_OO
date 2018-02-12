<?php 
$path_validaphp = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';    
    include ($path_validaphp . "model/connect.php");

    class DAOmyAccount{
    	
    	function AllPedidos($user){
    		// $sql = "SELECT pe.id_pedido, p.cod_pro, p.title, p.avatar, p.price, pe.total_price, pe.order_date FROM products p INNER JOIN pedidos pe ON p.user_name=pe.user WHERE pe.user='".$user."' ORDER BY pe.id_pedido";

    		$sql = "SELECT pe.id_pedido, p.cod_pro, p.title, p.description, p.avatar, p.price, pe.total_price, pe.order_date, p.avatar FROM products p INNER JOIN prod_comprados pc ON p.cod_pro=pc.cod_pro INNER JOIN pedidos pe ON pc.id_pedido=pe.id_pedido  WHERE pe.user='".$user."' ORDER BY pe.id_pedido";
    		
			
			$conexion = connect::conProductos();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
    	}


        function UserDetails($user){
            $sql="SELECT * FROM usuario2 WHERE user='".$user."'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }


        function ChangeName($user){
            $sql="UPDATE usuario2 SET first_name='".$user['user_name']."', last_name='".$user['user_lastName']."'  WHERE user='".$user['user']."'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }


        function ChangeEmail($user){
            $sql="UPDATE usuario2 SET email='".$user['email']."'  WHERE user='".$user['user']."'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

    }// end clase DAO
 ?>
