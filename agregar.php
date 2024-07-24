<?php
  // 1) Conexion
  // a) realizar la conexion con la bbdd
  // b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1","root","");

  // 2) Almacenamos los datos del envío POST
  // a) generar variables para cada dato a almacenar en la bbdd
  $formato = $_POST ['formato'];
  $marca = $_POST['marca'];
  $plataforma = $_POST['plataforma'];
  $juego = $_POST['juego'];
  $descripcion = $_POST['descripcion'];
  $genero = $_POST['genero'];
  $precio = $_POST['precio'];
 // Si se desea almacenar una imagen en la base de datos usar lo siguiente: addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
  $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

  // 3) Preparar la orden SQL
  // INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_a_ingresar)
  // => Ingresa dentro de la siguiente tabla los siguientes valores
  // a) generar la consulta a realizar
$consulta = "INSERT INTO videojuegos (id,formato,marca,plataforma,juego,descripcion,genero,precio,imagen)
VALUES ('','$formato','$marca','$plataforma','$juego','$descripcion','$genero','$precio','$imagen')";
  // 4) Ejecutar la orden y ingresamos datos
  mysqli_select_db($conexion,"starlight_tiendadevideojuegos");
  // a) ejecutar la consulta
  mysqli_query($conexion,$consulta);
  // a) rederigir a index
  header('location: index.php');
?>