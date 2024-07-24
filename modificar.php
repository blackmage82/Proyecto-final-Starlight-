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
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Starlight Tienda de Video Juegos</title>
    </head>
    <body>
        <?php
        // 6) asignamos a diferentes variables los respectivos valores del array $datos.
        $formato=$datos["Formato"];
        $marca=$datos["Marca"];
        $plataforma=$datos["Plataforma"];
        $genero=$datos["Genero"];
        $precio=$datos["Precio"];
        $imagen=$datos['imagen'];
        
        <h2>Modificar</h2>
        <p>Ingrese los nuevos datos del video juego.</p>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Formato</label>
            <input type="text" name="formato" placeholder="Formato" value="<?php echo "$formato"; ?>">
<br><br>
            <label>Marca</label>
            <input type="text" name="marca" placeholder="Marca" value="<?php echo "$marca"; ?>">
<br><br>
            <label>Plataforma</label>
            <input type="text" name="plataforma" placeholder="Plataforma" value="<?php echo "$plataforma"; ?>">
<br><br>
            <label>Genero</label>
            <input type="text" name="genero" placeholder="Genero" value="<?php echo "$genero"; ?>">
<br><br>
            <label>Precio</label>
            <input type="text" name="precio" placeholder="Precio" value="<?php echo "$precio"; ?>">
<br><br>
            <label>Imagen</label>
            <input type="file" name="imagen" placeholder="imagen">
<br><br>
            <input type="submit" name="guardar_cambios" value="Guardar Cambios">
            <button type="submit" name="Cancelar" formaction="listar.php">Cancelar</button>
        </form>
        <?php
        // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if(array_key_exists('guardar_cambios',$_POST)){
            // 2') Almacenamos los datos actualizados del envío POST
            // a) generar variables para cada dato a almacenar en la bbdd
            // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
            // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
            $formato=$_POST['Formato'];
            $marca=$_POST['Marca'];
            $plataforma=$_POST['Plataforma'];
            $genero=$_POST['Genero'];
            $precio=$_POST['Precio'];
            $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            // 3') Preparar la orden SQL
            // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
            // a) generar la consulta a realizar
             $consulta = "UPDATE videojuegos SET formato='$formato', marca='$marca', plataformna='$plataforma', genero='$genero' , precio='$precio', imagen='$imagen' WHERE id=$id";
            // 4') Ejecutar la orden y actualizamos los datos
            // a) ejecutar la consulta
            mysqli_query($conexion,$consulta);
            // a) rederigir a index
            header('location: index.php');
          } ?>

    </body>
</html>
