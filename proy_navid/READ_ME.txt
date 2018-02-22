
-La aplicacion tiene dos formularios grandes, por un lado el de registro como cliente para poder acceder a los servicios que se ofrece, y por otro lado el formulario de agregar productos para poderlos vender (es decir un cliente puede subir productos y comercializarlos).

- Esta enlazado el "añadir productos" para venderlos con el login, es decir, una persona que quiere vender un producto a travez de la plataforma que ofrece la aplicacion antes tiene que hacer login y en caso de no estar registrado le obliga a registrarse y posteriormente hacer el login y subir los datos de su producto.
	* Esto consigue que los productos esten identificados con un id en BD y que cada producto este ligado a su vez a un usuario que ya esta en la BD.

- DROPZONE
	- Para añadir una foto de los productos que se quiere vender a travez de la plataforma (formulario de agregar productos).

- PRODUCT DETAILS
	* Tiene dos vistas, una rapida que mustra las rese;as basicas de un producto a travez de un modal y la otra nos envia a una vista mucho mas detallada donde tambien esta presente la api de ebay.

- LOGIN con Javascript en LocalStorage.
	* Lo que logra es mostrar o en su caso ocultar informacion en funcion del tipo de usuario que se esta loguenado.
	* Admin puede ver el crud de todos los usuarios registrados en la aplicacion. Normal User no tiene acceso al crud anteriormete mencionado.
	* Ambos pueden subir productos para venderlos.

- Mensaje de bienvenida al usuario con javascript que ha iniciado sesion, este mesaje es personalizado y estara presente hasta que se cierre la sesion.

- VALIDACIONES PHP-JS
	* Estan presentes en login, recover password y registro de un nuevo usuario.
	
- RECOVER-PASSWORD 
	* Tiene varios pasos el primero consiste en introducir el "user name" con el que se registro, este hace una comprobacion para validar si existe en DB un usuario con ese nombre.
	* Paso dos: La aplicacion al realizar el paso 1 genera un codigo random (digitos y letras en mayuscula o misnuscula indistintamente). Este codigo se envia via email ?A que email? esta directamente relacionado con el primer paso ya que el email donde se enviara el codigo es el que pertenece al usuario que tenga el "user name" que se introdujo en el paso 1. Con ello se consigue que si algun tercero esta intentando cambiar el password esta sea una barrera mas ya que no podra acceder al codigo si no puede acceder a su vez a la cuenta de mail.
	* Paso tres: Se pide que se indroduzca el cogigo y la aplicacion verifica si es exactamente el mismo que el que se envio por email. En caso de ser correcto el codigo permitira el acceso al ultimo paso.
	* paso cuatro: Hay dos input password y la aplicacion se asegura que son iguales y los introduce en DB haciendo un UPDATE en bases.

- FILTROS
	* Los filtros estan en la vista "Search Results" conta de 6 apartados. Tres select, un slider, grupo de botones y un select que odena.
	* Para que pueda ser dinamico y que los cambios se acerque al maximo a lo que se ve en una web, he tenido que almacenar los datos en Localstorage y de esta forma cuando se realiza un cambio edite los datos en LocalStorage y que en php se trabaje con un string.

-PERFIL
	* Hay una vista llamada "My Account" a la cual acceden unicamente los usuarios logueados, en esta hay dos opciones. 
		1-Accede a un listado de todas las compras que ha realizado el usuario. Esta vista depende directamente de bases de datos y de las tablas productos, productos_vendidos y pedidos siendo necesario un INNER JOIN en DAO. Al pintarla tiene que comprobar que pedido tiene que productos e imprimir exactamente los que se compro junto con la fecha de compra.
		2-Accede a un apartado donde puede editar diferente de su propio perfil tales como email, name, password y movil.
	


- API EBAY
	* Se activa en el carrito de la compra cuando el usuario va a pagar los productos que a agregado al carrito, en este caso la aplicacion corre con la api de Ebay y dependiendo de el tipo de producto que esta buscado selecciona de la api productos relacionados para ofrecerlos al cliente.
	* Tambien esta presente en la vista de detalles de un producto.

- API MAILGUN
	-Se usa en "recover password" y enviando detalles del "pedido comprado".

- BASKET
	* Antes de realizar la compra te pide que inicies sesion y si no estas registrado tendras que registrarte ya que de lo contrario no podras comprar.
	* Guarda los productos en LocalStorage y con eso consigue que se mantengan los datos aunque el navegador se cierre, reinicie o hagas login si fuese necesario. Unicamente se borran los datos cuando el usuario ha relaizado ya el pago de los productos.
	*El carrito tiene una mejora adicional que consiste en que envia un email al usuario que esta comprando (utiliza el email que dio cuando se registro) con los detalles del pedido es decir productos comprados, cantidad de cada producto, precio/producto y precio total del pedido. El mensaje es personalizado para cada usuario utilizando sus datos de DB.
	* Sincronizacion total con vista basket y el icono del carrito que aparece en la barra de menu junto a la cantidad de productos seleccionados.
	* En la vista de basket se tiene la posibilidad de incrementar, reducir la cantidad de un producto e incliso el eliminarlo de la cesta de compra.





