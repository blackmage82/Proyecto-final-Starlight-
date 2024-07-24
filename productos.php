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
  <title>Starlight</title>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>
<body>

  <header>
    <h1>Detalle del producto:</h1>
  </header>
  <br>
  <?php
  // 6) asignamos a diferentes variables los respectivos valores del array $datos.
  // este paso no es estrictamente necesario, pero es mas practico
  //para despues llamarlos solo con el nombre de la variable
  $formato=$datos["Formato"];
  $marca=$datos["Marca"];
  $plataforma=$datos["Plataforma"];
  $genero=$datos["Genero"];
  $precio=$datos["Precio"];
  $imagen=$datos['imagen'];
  $pago=$datos['Pago'];
  ?>

  <!-- mostramos los datos de ese único producto
  lo meto en una card, pero se puede mostrar como quieran-->

  <div class="container">
    <div class="row">
      <div class="card w-50">
        <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($imagen)?>" alt="..." />

        <div class="card-body">
          <h5 class="card-title">Marca: <?php echo $marca;?></h5>
          <p class="card-text">Plataforma: <?php echo $plataforma?></p>
          <p class="card-text">$<?php echo $precio;?></p>
          <br>
          <div class="">

            <a href="<?php   echo $pago; ?> " target="_blank"> Link de compra </a>
            <br>
            <br>
            <br>
<a href="agregarcliente.php?id=<?php echo $datos['id'];?>"> <button type="button" name="button">Registrate</a>
          </div>
          <!-- si quieren pueden agregar el link o un boton de pago de Mercadopago
          <a href="<?php// echo $reg['link']; ?>" class="btn btn-primary">Comprar</a> -->
        </div>
      </div>
    </div>
  </div>

<footer>
<br>
<h2>Aqui haces tu compra, Gamer!</h2>
<br>
</footer>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->

  <script src="js/scripts.js"></script>
</body>
</html>