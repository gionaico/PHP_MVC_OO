<?php
// echo "connect usuarios2";
// exit;
	class connect{
		
		public static function con(){
			$host = 'localhost';  
    		$user = "root";                     
    		$pass = "";                             
    		$db = "practica_1.0";                      
    		$port = 3306;                           
    		$tabla="usuario2";
    		
    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
			return $conexion;
			

		}
		public static function close($conexion){
			
			mysqli_close($conexion);
			
		}
	}