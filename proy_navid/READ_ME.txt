
-La aplicacion tiene dos formularios grandes, por un lado el de registro como cliente para poder acceder a los servicios que se ofrece, y por otro lado el formulario de agregar productos para poderlos vender (es decir un cliente puede subir productos y comercializarlos).

- Esta enlazado el añadir productos para venderlos con el login, es decir, una persona que quiere vender un producto a travez de la plataforma que ofrece la aplicacion antes tiene que hacer login y en caso de no estar registrado le obliga a registrarse y posteriormente hacer el login y subir los datos de su producto.
	* Esto consigue que los productos esten identificados un un id en BD y que cada producto este ligado a su vez a un usuario que ya esta en la BD.

- Login con Javascript 
	* Lo que logra es mostrar o en su caso ocultar informacion en funcion del tipo de usuario que se esta loguenado.

	* Admin puede ver el crud de todos los usuarios registrados en la aplicacion. Normal User no tiene acceso al crud anteriormete mencionado.

- Mensaje de bienvenida al usuario con javascript.

- Dropzone para añadir una foto de los productos que se quiere vender a travez de la plataforma.

- Api Se activa en el carrito de la compra cuando el usuario va a pagar los productos que a agregado al carrito, en este caso la aplicacion corre con la api de Ebay y dependiendo de los productos que ha buscado selecciona de la api para ofrecerlos al cliente.

- Carrito guarda los productos en LocalStorage y con eso consigue que se mantengan los datos aunque el navegador se cierre o reinicie, unicamente se borran los datos cuando el usuario ha relaizado ya el pago de los productos.

- Vista de los pedidos que ha hecho un usuario. Esta vista depende directamente de bases de datos y de las tablas productos, productos_vendidos y pedidos. Al pintarla tiene que comprobar bien que pedido tiene que productos para imprimir exactamente los que se compro junto con la fecha de compra.


mejoras pendientes
	*vistas de myaccount
	*una recover password
