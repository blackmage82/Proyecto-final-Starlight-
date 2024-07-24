<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"starlight_tiendadevideojuegos");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM videojuegos WHERE id=$id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($repuesta);


$plataforma=$datos["Plataforma"];
$juego=$datos["Juego"];
$precio=$datos["Precio"];

// Si quiero para simplificar y luego trabajar con una sola variable, guardo los datos de la compra en una sola variable
$compra =  $plataforma . ' ' . $juego . ' ' . $precio;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Starlight</title>
</head>
<body>
    <h1>Datos del Cliente</h1>

    <p>Ingrese los datos</p>


    <form method="POST" action="" >
        <label>NOMBRE</label>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <label>APELLIDO</label>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <label>MAIL</label>
        <input type="text" name="mail" placeholder="Mail" required>
        <label>TELEFONO</label>
        <input type="text" name="telefono" placeholder="Telefono" required>
        <input type="submit" name="guardar_cliente" value="Aceptar">

    </form>

<?php
  if(array_key_exists('guardar_cliente',$_POST)){

  $nombre = $_POST ['nombre'];
  $apellido = $_POST['apellido'];
  $mail = $_POST['telefono'];
  $telefono = $_POST['mail'];




  //3) Preparar la orden SQL
  // INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_a_ingresar)
  // => Ingresa dentro de la siguiente tabla los siguientes valores
  // a) generar la consulta a realizar
  $consulta = "INSERT INTO clientes (id,nombre,apellido,mail,telefono,compra)
  VALUES ('','$nombre','$apellido','$mail','$telefono','$compra' )";

// a) ejecutar la consulta
mysqli_query($conexion,$consulta);
// a) rederigir a index
header('Location: ' . $datos["Pago"]);
}?>

</body>
</html>
