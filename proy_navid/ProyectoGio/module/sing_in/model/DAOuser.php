<?php
$path_DAO = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';
    // include($path . "module/user/model/DAOUser.php");
    
    include ($path_DAO . "model/connect.php");
    // require_once ("model/connect.php");
    
    //session_start();
	class DAOUser{
		function insert_user($datos){


            $user=$datos["un"];
            $fn=$datos["fn"];
            $ln=$datos["ln"];
            $dni=$datos['dni'];
            $birth_date=$datos["birth_date"];
            $genere=$datos["genere"];
            $country=$datos["country"];
            $address=$datos["add1"];
            $zip=$datos["zip"];
            $phone=$datos["phone"];
            $email=$datos["email"];
            $password=$datos["password"];
                $password_cifrado=password_hash($password, PASSWORD_DEFAULT);
            $cmpny=$datos["cmpny"];
            $hobby="";

            foreach ($datos["interests"] as $indice) {
                $hobby=$hobby."$indice:";
            }
            // $interests=$datos["interests"];
            // $values="'$user', '$fn', '$ln', '$dni', '$birth_date', '$genere', '$country', '$address', '$zip', '$phone', '$email', '$password', '$cmpny', '$hobby'";
              
            // echo "<script>console.log( 'Debug Objects: " . $values . "' );</script>";
            // exit;
            
            $sql = " INSERT INTO usuario2 (user, first_name, last_name, dni, birthdate, genere, country, address, zip, phone, email, password, cmpy, hobbies)"." VALUES ('$user', '$fn', '$ln', '$dni', '$birth_date', '$genere', '$country', '$address', '$zip', '$phone', '$email', '$password_cifrado', '$cmpny', '$hobby')";
            
            // echo "<script>console.log( 'Debug Objects: " . $hobby . "' );</script>";
            // exit;
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		/*-----------------------------------------------------------------------------------------*/
        /*-----------------------------------------------------------------------------------------*/
		function select_all_user(){
			$sql = "SELECT * FROM usuario2 ORDER BY user ASC";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
		/*-----------------------------------------------------------------------------------------*/
        /*-----------------------------------------------------------------------------------------*/
		function select_user($user){

			$sql = "SELECT * FROM usuario2 WHERE user='$user'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
		}
		/*-----------------------------------------------------------------------------------------*/
        /*-----------------------------------------------------------------------------------------*/
		function update_user($datos){
			$user=$datos["un"];
            $fn=$datos["fn"];
            $ln=$datos["ln"];
            $dni=$datos['dni'];
            $birth_date=$datos["birth_date"];
            $genere=$datos["genere"];
            $country=$datos["country"];
            $address=$datos["add1"];
            $zip=$datos["zip"];
            $phone=$datos["phone"];
            $email=$datos["email"];
            $password=$datos["password"];
                $password_cifrado=password_hash($password, PASSWORD_DEFAULT);
            $cmpny=$datos["cmpny"];
            $hobby="";

            foreach ($datos["interests"] as $indice) {
                $hobby=$hobby."$indice:";
            }
			
        	$sql = " UPDATE usuario2 SET first_name='$fn', last_name='$ln', birthdate='$birth_date',  genere='$genere', country='$country', address='$address', zip='$zip', phone='$phone', email='$email', password='$password_cifrado', cmpy='$cmpny', hobbies='$hobby' WHERE user='$user'";
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		/*-----------------------------------------------------------------------------------------*/
        /*-----------------------------------------------------------------------------------------*/
		function delete_user($user){
			$sql = "DELETE FROM usuario2 WHERE user='$user'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
		/*-----------------------------------------------------------------------------------------*/
        /*-----------------------------------------------------------------------------------------*/
		


        
	}