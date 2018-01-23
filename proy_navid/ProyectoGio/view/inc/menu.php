











		<header>		
		<!-- navbar-fixed-top ayuda a siempre se quede pegado arriba 
			navbar-fixed-bottom ayuda a siempre se quede pegado bajo
			navbar-static-top se queda fijo arriba-->
		<nav class="navbar  navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navi_gio">
						
						<span class="sr-only">Desplegar/Ocultar Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php?page=homepage" class="navbar-brand">
                   		<img src="view/img/barra_navegador/logo.png" class="logo ">

					</a>
				</div>
				<!-- MENU -->
				<div class="collapse navbar-collapse" id="navi_gio">
					<ul class="nav navbar-nav navbar-right">
						<li href="#"><a href="index.php?page=homepage" data-tr="home" ></a></li>
						<li href="#"><a href="index.php?page=about_us"  data-tr="about"></a></li>
						<li href="#"><a href="index.php?page=services"  data-tr="servicies"></a></li>
						<li href="#"><a href="index.php?page=products&view=products" data-tr="add_product"></a></li>
						<li href="#"><a href="index.php?page=contact"  data-tr="contact"></a></li>
						<li><a href="index.php?page=sing_in&op=list" style="display: none;" id="crud">CRUD</a></li>
						<li class="dropdown">
				          	<a href="#"   class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Lenguage<span class="caret"></span></a>
				         	<ul class="dropdown-menu">
					            <li><a href="#" title=""   id="s_es"><img class="lenguage_b" src="view/img/multilenguage/spain.png" ></a></li>
					            	<!-- <li role="separator" class="divider"></li> -->
					            <li><a href="#" title=""  id="s_ca"><img class="lenguage_b" src="view/img/multilenguage/catalonia.png" alt="" ></a></li>
					            	<!-- <li role="separator" class="divider"></li> -->
					            <li><a href="#" title=""   id="s_en"><img class="lenguage_b" src="view/img/multilenguage/uk.png" alt="" ></a></li>
					            <!-- <li role="separator" class="divider"></li> -->
				          	</ul>
				        </li>
				        
						<li id="li_singIn"><a href="index.php?page=sing_in&op=create"   ><span class="glyphicon glyphicon-user"></span > Sign In</a></li>
					    
					    <li id="li_login"><a href="#"   data-toggle="modal" data-target="#modal_login"><span class="glyphicon glyphicon-log-in"></span > Login</a></li>

					    <li style="display: none;" id="li_logOut"><a href="#"    ><span class="glyphicon glyphicon-log-out"></span >Log-out</a></li>
					</ul>
					<!-- 
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php?page=sing_in&op=create" class="lang" key="sing_in"><span class="glyphicon glyphicon-user"></span > Sign In</a></li>
					      <li><a href="#" class="lang" key="login" data-toggle="modal" data-target="#modal_login"><span class="glyphicon glyphicon-log-in"></span > Login</a></li>
					</ul> -->
					
				     	 
				</div>
			</div>			
		<!-- <div class="container">
			<div class="row pull-right">
				<a href="#" title=""><img src="view/img/multilenguage/catalonia.png" alt="" class="traslate lenguage_b" id="ca"></a>
				<a href="#" title=""><img src="view/img/multilenguage/spain.png" alt="" class="traslate lenguage_b" id="es"></a>
				<a href="#" title=""><img src="view/img/multilenguage/uk.png" alt="" class="traslate lenguage_b" id="en"></a>
			</div>
		</div> -->
		</nav>

	</header>
	<body>
		
		