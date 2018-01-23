<?php
	switch($_GET['page']){
			
		case "homepage";
			include("module/homepage/controller/controller_homepage.php");
			break;
			
		// case "controller_login";
		// 	include("module/login/controller/".$_GET['page'].".php");
		// 	break;
			
		case "controller_user";
			include("module/user/controller/".$_GET['page'].".php");
			break;

		case "services";
			include("module/services/controller/controller_".$_GET['page'].".php");
			break;
			
		case "aboutus";
			include("module/aboutus/controller/controller_".$_GET['page'].".php");
			break;
			
		case "contact";
			include("module/contact/controller/controller_".$_GET['page'].".php");
			break;

		case "sing_in";
			include("module/sing_in/controller/controller_".$_GET['page'].".php");
			break;

		
			
		// case "404";
		// 	include("view/inc/error".$_GET['page'].".php");
		// 	break;
			
		// case "503";
		// 	include("view/inc/error".$_GET['page'].".php");
		// 	break;
			
		// case "sin_resultados";
		// 	include("view/inc/error".$_GET['page'].".php");
		// 	break;	
			
		default;
			include("module/inicio/view/inicio.php");
			break;
	}
?>