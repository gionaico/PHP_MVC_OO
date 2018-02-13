<?php
$path_DAO = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';
    // include($path . "module/user/model/DAOUser.php");
    
    include ($path_DAO . "model/connect.php");
    // require_once ("model/connect.php");
    
    // session_start();
	class DAOProducts{
		
		/*-----------------------------------------------------------------------------------------*/
        /*-----------------------------------------------------------------------------------------*/
		function select_all_products(){
			$sql = "SELECT * FROM products ORDER BY date_today DESC";
			
			$conexion = connect::conProductos();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
		/*-----------------------------------------------------------------------------------------*/
        /*-----------------------------------------------------------------------------------------*/
		function all_productsLimit8(){
			$sql = "SELECT * FROM products ORDER BY date_today DESC LIMIT 9";
			
			$conexion = connect::conProductos();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
		/*-----------------------------------------------------------------------------------------*/
        /*-----------------------------------------------------------------------------------------*/
		function Search($data){
			$province=$data['province'];
			$city=$data['city'];
			$word_wrotten=$data['word_wrotten'];

			if (($province=="") && ($city=="")&& ($word_wrotten!="")) {
				// echo "1";
				// exit;
				$sql = 'SELECT * FROM products WHERE title LIKE"%'.$word_wrotten.'%"';
			}elseif (($province!="")&&($city=="")&&($word_wrotten!="")) {
				// echo "2";
				// exit;
				$sql = 'SELECT * FROM products WHERE province="'.$province.'" and title LIKE"%'.$word_wrotten.'%"';
			}elseif (($province!="")&&($city!="")&&($word_wrotten!="")) {
				// echo "3";
				// exit;
				$sql = 'SELECT * FROM products WHERE province="'.$province.'" and city="'.$city.'"and title LIKE"%'.$word_wrotten.'%"';
				// $sql = "SELECT * FROM products WHERE city='$city' and province='$province'";
			}elseif (($province!="")&&($city=="")&&($word_wrotten=="")) {
				// echo "4";
				// exit;
				$sql = 'SELECT * FROM products WHERE province="'.$province.'"';
			}else{
				// echo "else";
				// exit;
				$sql = 'SELECT * FROM products WHERE province="'.$province.'" and city="'.$city.'"';
			}

			$conexion = connect::conProductos();
            $res = mysqli_query($conexion, $sql);
            // $cant_filas=mysqli_num_rows($res);
            

            // echo ($cant_filas);
            // exit;
            // if ($res) {
            // 	echo "exito";
            // 	exit;
            // }else{
            // 	echo "Ddddddddddd";
            // 	exit;
            // }
            

			// print_r($user[0]['product']);
			// exit;


            connect::close($conexion);
            return $res;
		}
		/*-----------------------------------------------------------------------------------------*/
        /*-----------------------------------------------------------------------------------------*/
		function product_details($id){
			$sql = 'SELECT * FROM products WHERE cod_pro="'.$id.'"';
			
			$conexion = connect::conProductos();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
}