frases = {
  'en' : {
		'home' : 'Home',
		'about' : 'About Us',
		'servicies' : 'Servicies',
		'add_product' : 'Add Product',
		'contact' : 'Contact',
		'sing_in' : 'Sing in',
		'login' : 'Login',
		'lenguage' : 'Lenguage',
		'spanish' : 'Spanish',
		'catalan' : 'Catalan',
		'english' : 'English',
		'cars' : 'CARS ',
		'motorbikes' : 'MOTORBIKES ',
		'trucks' : 'TRUCKS ',
		'carsinfo':'for any ocassion',
		'motoinfo':'for all styles',
		'truckinfo':'of all kinds'
	},
	'es' : {
		'home' : 'Inicio',
		'about' : "Quienes Somos",
		'servicies' : 'Servicios',
		'add_product' : 'Añadir Producto',
		'contact' : 'Contacto',
		'sing_in' : "Registrate",
		'login' : 'Entrar',
		'lenguage' : 'Idioma',
		'spanish' : 'Español',
		'catalan' : 'Catalan',
		'english' : 'Ingles',
		'cars' : 'COCHES ',
		'motorbikes' : 'MOTOS ',
		'trucks' : 'CAMIONES ',
		'carsinfo':'para cualquier ocasión',
		'motoinfo':'para todos los estilos',
		'truckinfo':'de todas las clases'
	},
	'ca' : {
		'home' : 'Inici',
		'about' : "Contacta'ns",
		'servicies' : 'Serveis',
		'add_product' : 'Afegir Producte',
		'contact' : 'Contacte',
		'sing_in' : "Registra't",
		'login' : 'Entrar',
		'lenguage' : 'Llengua',
		'spanish' : 'Castella',
		'catalan' : 'Catalan',
		'english' : 'Angles',
		'cars' : 'COTXE ',
		'motorbikes' : 'MOTOS ',
		'trucks' : 'CAMIONS ',
		'carsinfo':'per a qualsevol ocasió',
		'motoinfo':'per a tots els estils',
		'truckinfo':'de totes les classes'
	}
};

/**
 * Función que cambia todos los elementos al nuevo idioma.
 *
 * @param {string} lang
 */
function cambiarIdioma(lang) {
  // Habilita las 2 siguientes para guardar la preferencia.
  lang = lang || sessionStorage.getItem('app-lang') || 'en';
  sessionStorage.setItem('app-lang', lang);
  console.log(lang);
  var elems = document.querySelectorAll('[data-tr]');
  for (var x = 0; x < elems.length; x++) {
    elems[x].innerHTML = frases.hasOwnProperty(lang)
      ? frases[lang][elems[x].dataset.tr]
      : elems[x].dataset.tr;
  }
}

window.onload = function(){
  cambiarIdioma();
  
  document
  .getElementById('s_es').addEventListener('click', cambiarIdioma.bind(null, 'es'));

  document
    .getElementById('s_en').addEventListener('click', cambiarIdioma.bind(null, 'en'));

  document
    .getElementById('s_ca').addEventListener('click', cambiarIdioma.bind(null, 'ca'));
}