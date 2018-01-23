<?php 
	ob_start();
	session_start();
    require_once("view/inc/header.php"); 
	require_once("view/inc/menu.php");
	require_once("module/login/view/login.php");
	//echo ($_SESSION["user_log"]);
	if (!isset($_GET['page'])) {		
		require_once("module/homepage/controller/controller_homepage.php");
	}else  if  ((isset($_GET['page']))&&(!isset($_GET['view'])))   { //&& (!isset($_GET['view']))
			// 	$cuenta=$_GET['page'];
			// echo '<script language="javascript">alert("'.$cuenta.'");</script>';
        require_once("module/".$_GET['page']."/controller/controller_".$_GET['page'].".php");        
	}else if ((isset($_GET['page']))&&(isset($_GET['view']))) {
		// echo '<script language="javascript">alert("65965656");</script>';
		require_once("module/".$_GET['page']."/view/create_".$_GET['view'].".php");
	}        
	require_once("view/inc/footer.html");
	 ob_end_flush();
