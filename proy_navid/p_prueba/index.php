<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>jQuery-multilang Example</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../ProyectoGio/view/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../ProyectoGio/view/css/my_styles.css">


    
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	

	
	<!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="jquery.js"></script>

	<script type="text/javascript">
		var arrLang = {
			'en' : {
				'home' : 'HOME',
				'about' : 'about us',
				'contact' : 'contact us'
			},
			'es' : {
				'home' : 'inicio',
				'about' : 'acerca',
				'contact' : 'contacto'
			}
		};

		$(function(){
			$('.traslate').click(function(){
				var lang =$(this).attr('id');
				$('.lang').each(function(index, element){
					$(this).text(arrLang[lang][$(this).attr('key')]);
				});
			});
		});
	</script>

</head>
<body>
	<button class="traslate" id="en">English</button>
	<button class="traslate" id="es">Spanish</button>
	<a href="#" title=""><img src="../ProyectoGio/view/img/multilenguage/catalonia.png" alt=""></a>
	<a href="#" title=""><img src="../ProyectoGio/view/img/multilenguage/spain.png" alt="" class="traslate" id="es"></a>
	<a href="#" title=""><img src="../ProyectoGio/view/img/multilenguage/uk.png" alt="" class="traslate" id="en"></a>
	<div>
		<ul>
			<li class="lang" key="home">home</li>
			<li class="lang" key="about">about us</li>
			<li class="lang" key="contact">contact us</li>
			<!-- <li class="traslate" key=""></li>
			<li class="traslate" key=""></li> -->
		</ul>
	</div>





	
</body>
</html>