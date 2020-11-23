# PruebaDiagnostico

API application programming interface

estructurar un backend con un conjunto de funciones, los cuales van a servir para interactuar con el cliente.
el cliente lo que va hacer es consumir el API, o servicios web, el API se encarga todo la lógica de negocio y la interacción de la base de datos y datos así estaría bien segmentado, el cliente y el servidor, en donde se harán algunas peticiones entre cliente y servidor deben ser lo más limpias posibles para el intercambio de información simple y estructurado, en este caso en el formato json 
la arquitectura que se va a utilizar va ser Rest-API la cual es una transferencia de estado representacional, el cual está dirigido en un protocolo cliente-servidor. Este es un conjunto de operaciones bien definidas en donde tiene sintaxis universal para identificar recursos. 
las operaciones bien definidas Rest-API son las operaciones para crear, leer, actualizar, y eliminar, o bien conocidas como CRUD, las cuales  están relacionadas a métodos de http. Se creó un Rest-API para usuarios, se creó una clase de usuarios, donde se hace un registro de usuarios .
El rest API, se de forma escalable y estén bien segmentado.
En los API se colocan todas las peticiones del cliente, y se generó un archivo llamado usuarios.php en donde se van a recibir todas las peticiones del usuario.
Se genera el localhost, el puerto, es decir la ruta del proyecto, y se gestiona toda la parte de las peticiones de los usuarios
En class-usuarios.php se hizo las operaciones básicas de API, en donde se generó algunas funciones como de ;
•	guardar usuario
•	obtener usuario
•	actualizar usuario
•	eliminar usuario
en usurios.php se va a usar para recibir las peticiones del usuario. es decir. Recibir peticiones del usuario como:
•	crear
•	obtener un usuario
•	obtener todos los usuarios
•	actualizar un usuario
•	eliminar un usuario
Primero se debe conocer el método HTTP de la petición que hace el usuario para tomar decisiones y saber que acción tomar
•	GET
•	POST
•	PUT
•	DELETE

para saber se coloca un echo "metodo HTTP:".$_SERVER['REQUEST_METHOD']; el cual es un arreglo asociativo, en el cual podemos obtener mucha información con respecto a la petición 
nos retorna algún método de HTTP, normalmente la petición que se hace es el GET. 
Para probar otros métodos HTTP, personalmente realizo pruebas con POSTMAN.
el cual consiste en ejecutar las peticiones, el código del lado del servidor, en donde retorna una respuesta, en algún formato en particular y desde ahí se pueda visualizar, y cambiar el método de envío de información, y solo se coloca el método HTTP para visualizar.
Luego se colocó un Switch para evaluar los diferentes métodos a utilizar, para luego enviar información al servidor y recibirla.
para recibir peticiones de forma síncrona $_(Metodo HTTP).
.file_get_content('php://input'); el cual es para leer el contenido de un flujo de php, y con eso recibimos todo lo que se envia el cliente en donde si se envía un Json, se retornaría a un json en formato de texto. y eso es lo que se va a ver en  la impresión.
Retomo POSTMAN y allí por medio del parámetro "body" utilizo el metodo "raw", y aparece un apartado para escribir un texto, en ese apartado escribimos el json que se va a enviar, lo que hara es prepara el json.
luego se crea un arreglo asociativo.
y todas las pruebas de método HTTP se realizan a través de POSTMAN.
La estructura de un Rest-API es que se envié la información en un formato estructurado y que la información retorne también en un formato estructurado para que se puedan tomar decisiones, por lo tanto se envía en formato en Json y nos retorna desde el servidor un formato texto pero necesitamos que nos devuelva un formato json.
Para que nos devuelva un json se realiza de la siguiente forma.
header ("Content-Type: application/json"); --> de esta forma se indica al cliente que enviamos un json, y la herramienta de POSTMAN el encabezado nos dice que el content-type  es un json. y eso sería lo que es la arquitectura, para recibir y tomar decisiones.
Hasta aquí se definió la estructura básica del API con todas las operaciones básicas del CRUD, se segmento dependiendo del método de HTTP.



en class usuarios.php se hará el llamado de cada caso, en donde se va a leer un archivo json.
Por lo tanto se crea una carpeta llamada data, con un archivo llamado usuarios.json, colocando atributos tipo json. con el fin que desde php anexa el nuevo elemento y luego sobrescribir.
para leer se usó file_get_contents("../data/usuarios.json") y se guarda en una variable la cual sería una cadena con toda la información, por lo tanto, quedaría de la forma 
$contenidoArchivo = file_get_contents("../data/usuarios.json")
luego convertimos esa cadena que está en formato json, en un arreglo asociativo
$usuarios=json_decode($contenidoArchivo, true);
luego se reescribe todo lo del contenidoArchivo, por lo tanto
$archivo = open("data/usuarios.json","w"); en donde "w", va a sustituir todo lo anterior.
fwrite($archivo,json_encode($usuarios));
fclose($archivo);

nos dirigimos al Rest-API en el case 'metodo HTTP' se crea una instancia de tipo usuario y se estaría enviando en el parámetro de constructor, de esa forma tendríamos un objeto de tipo usuario con toda la información que el cliente envió, y después de crear la instancia y se asignaría los valores correspondientes a los atributos internos, y se podría llamar el método usuario.
para importar el archivo de una sola vez para todos los casos del CRUD include_once("../pruebadiagnostico/class-usuario.php");

para filtrar un usuario se realiza a través de $indice y poder usar la función de obtener un usuario se coloca de forma estática
y luego se realiza el frond-end

