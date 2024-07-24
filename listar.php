<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Starlight Tienda de Video Juegos</title>
</head>
<body>
    <h1>Tienda de Video Juegos</h1>
    <button type="submit"><a href="index.php">Inicio</a></button>
    <button type="submit"><a href="listar.php">Listar video juegos</a></button>
    <button type="submit"><a href="agregar.html">Agregar video juegos</a></button>
    <h2>Lista de Video Juegos</h2>
    <p>La siguiente lista muestra los datos de video juegos actualmente en stock.</p>


    <table border="1">
    <tr>
        <th>ID</th>
        <th>FORMATO</th>
        <th>MARCA</th>
        <th>PLATAFORMA</th>
        <th>JUEGO</th>
        <th>DESCRIPCION</th>
        <th>GENERO</th>
        <th>PRECIO</th>
        <th>IMAGEN</th>
        <th>EDITAR</th>
        <th>BORRAR</th>
    </tr>
    <?php
    // 1) Conexion
    $conexion=mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($conexion,"starlight_tiendadevideojuegos");

    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta= "SELECT*FROM videojuegos";

    // 3) Ejecutar la orden y obtenemos los registros

     $datos= mysqli_query ($conexion, $consulta);
    // 4) Mostrar los datos del registro

    while ( $reg =mysqli_fetch_array($datos) ) { //  para ahorrar una linea de codigo, creo la matriz dentro del while?>
        <tr>
        <td><?php echo $reg['id']; ?></td>
        <td><?php echo $reg['Formato']; ?></td>
        <td><?php echo $reg['Marca']; ?></td>
        <td><?php echo $reg['Plataforma']; ?></td>
        <td><?php echo $reg['Juego']; ?></td>
        <td><?php echo $reg['Descripcion']; ?></td>
        <td><?php echo $reg['Genero']; ?></td>
        <td><?php echo $reg['Precio']; ?></td>
        <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="100px" height="100px"></td>
        <td><a href="modificar.php?id=<?php echo $reg['id'];?>">Editar</a></td>
        <td><a href="borrar.php?id=<?php echo $reg['id'];?>">Borrar</a></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>