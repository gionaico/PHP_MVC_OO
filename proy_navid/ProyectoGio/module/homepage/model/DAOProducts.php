<?php
$path_DAO = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';
    // include($path . "module/user/model/DAOUser.php");
    
    include ($path_DAO . "model/connect.php");
    // require_once ("model/connect.php");
    
    // session_start();
	class DAOProducts{

		function filtro($details){
			$array=[];
			$array[0]=$details[0]['province'];
			$array[1]=$details[0]['city'];
			$array[2]=$details[0]['product_type'];
			$f=$details[0]['price'];
            $t=substr($f, 0, -4);
            $array[3]=$t;
            $fecha = date('Y-m-j');
			$nuevafecha = strtotime ( '-'.$details[0]['publication_date'].' day' , strtotime ( $fecha ) ) ;
			$nuevafecha2 = date ( 'Y-m-j' , $nuevafecha );

            if ($details[0]['publication_date']=="0") {
            	$array[4]=("date_today='".$nuevafecha2."'");	
            }elseif ($details[0]['publication_date']=="") {
            	# code...
            	//no hace nada
            }else{
            	$array[4]=("date_today>'".$nuevafecha2."'");	
            }


			// $stringFecha=("publication_date>");
			// echo ("date_today>'".$nuevafecha."'");
			// exit;
			// $price=substr($details[0]['price'], 0, -2);
			
			
			$cad=" ";
			for ($i=0; $i <count($array) ; $i++) { 				
				if ($array[$i]!="") {
					$cad.=$array[$i]." and ";
				}				
			}

            	$order=$details[0]['order'];
            if ($cad==" ") {
            	$sql="SELECT * FROM products ".$order."";
            }else{
				$sql="SELECT * FROM products WHERE ".substr($cad, 0, -5)." ".$order."";
            }
			//$_SESSION["sql"]=$sql;
			// echo ($sql);
			// exit;
			$conexion = connect::conProductos();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
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

		function insertLikes($user_name, $cod_prod){
			$sql5 = "INSERT INTO megusta3 (user_name, cod_prod) VALUES ('$user_name', '$cod_prod')";
			
			$conexion = connect::conectarLike();
            $res = mysqli_query($conexion, $sql5);
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