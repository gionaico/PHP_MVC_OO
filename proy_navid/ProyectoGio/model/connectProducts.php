<?php
	class connect{
		
		public static function con(){
			$host = 'localhost';  
    		$user = "root";                     
    		$pass = "";        
    		// $db = "shop1";                      
    		$db = "practica_1.0";                      
    		$port = 3306;                           
    		$tabla="products";
    		
    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
			return $conexion;
			

		}
		public static function close($conexion){
			
			mysqli_close($conexion);
			
		}
	}