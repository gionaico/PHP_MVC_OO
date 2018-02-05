<?php
	class connect{
		
		public static function conPedidos(){
			$host = 'localhost';  
    		$user = "root";                     
    		$pass = "";                             
    		$db = "practica_1.0";                      
    		$port = 3306;                           
    		$tabla="pedidos";
    		
    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
			return $conexion;
			

		}
		public static function conProd_comprados(){
			$host = 'localhost';  
    		$user = "root";                     
    		$pass = "";                             
    		$db = "practica_1.0";                      
    		$port = 3306;                           
    		$tabla="prod_comprados";
    		
    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
			return $conexion;
			

		}
		public static function close($conexion){
			
			mysqli_close($conexion);
			
		}
	}