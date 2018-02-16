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

        public static function conRecoverPass(){
            $host = 'localhost';  
            $user = "root";                     
            $pass = "";                             
            $db = "practica_1.0";                      
            $port = 3306;                           
            $tabla="recover_pass";
            
            $conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
            return $conexion;           
        }

		public static function conProductos(){
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