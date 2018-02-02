<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>jQuery-multilang Example</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script>
		var arrLang = [
			 {
				'home' : '1',
				'about' : 'about us',
				'contact' : 'contact us'
			},
			 {
				'home' : '2',
				'about' : 'acerca',
				'contact' : 'contacto'
			}
		];

		$(document).ready(function () {




			$('#1').click(function(){
				console.log(arrLang);
			});






			$('#2').click(function(){
				var arrLang1 = {
						'home' : '3',
						'about' : 'about us',
						'contact' : 'contact us'
					
				}
				arrLang.push(arrLang1);
				// if (arrLang[0]['contact']=='contact 6us') {
				// 	alert("tri");
				// }else{
				// 	alert("false");
				// }
				var uno=JSON.stringify(arrLang);
				localStorage.setItem("uno", uno);
				var local=localStorage.getItem('uno');
				 var trans=JSON.parse(local);
				console.log(trans);//arrLang[0]['contact']);
			});



			$('#3').click(function(){
				var id=this.getAttribute('id');
				var local=localStorage.getItem('uno');
				var trans=JSON.parse(local);

				for (var i =0 ; i<trans.length; i++) {
					if (trans[i]['home']=='1') {
						alert("esta en b "+i);
						trans.splice(i,1);
					}
					if (trans[i]['home']=='2') {
						trans[i]['home']='99';
					}
				}

				// for (var i =0 ; i<trans.length; i++) {
				// 	if (trans[i]['home']=='2') {
				// 		 trans.slice(i);
				// 	}
				// }

				console.log(trans);
			});



		});

	</script>
</head>
<body>
	<button class="traslate" id="1">1</button>
	<button class="traslate" id="2">2</button>
	<button class="traslate" id="3">3</button>

</body>
</html>