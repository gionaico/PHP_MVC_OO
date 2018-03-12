<?php 
$path_validaphp = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';    
    include ($path_validaphp . "model/connect.php");

    class DAOmyAccount{
    	
    	function AllPedidos($user){
    		$sql = "SELECT pe.id_pedido, p.cod_pro, p.title, p.description, p.avatar, p.price, pe.total_price, pe.order_date, p.avatar FROM products p INNER JOIN megusta3 pc ON p.cod_pro=pc.cod_prod INNER JOIN pedidos pe ON pc.id_pedido=pe.id_pedido  WHERE pe.user='".$user."' ORDER BY pe.id_pedido";			
			$conexion = connect::conProductos();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
    	}

        function productsLikes($user){
            $sql = "SELECT * FROM products p INNER JOIN megusta3 pc ON p.cod_pro=pc.cod_prod and pc.user_name='$user'";          
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


        function ChangePass($user){
            $sql=("SELECT password FROM usuario2 WHERE user ='".$user['user']."'");
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);

            $current_pass=$res->fetch_assoc();
            
            if (password_verify($user['pass'], $current_pass['password'])) {
                $password_cifrado=password_hash($user['new_pass'], PASSWORD_DEFAULT);
                $sql2="UPDATE usuario2 SET password='".$password_cifrado."'  WHERE user='".$user['user']."'";
                $res2 = mysqli_query($conexion, $sql2);
                connect::close($conexion);
                return $res2;
            }else{
                connect::close($conexion);
                return false;
            }
        }


        function ChangePhone($user){
            $sql="UPDATE usuario2 SET phone='".$user['phone']."'  WHERE user='".$user['user']."'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

    }// end clase DAO
 ?>
