
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>STARLIGHT</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href=" " />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">
            </a>
                    <a href="playstation4.php" class="btn btn-outline-light ms-3">
                        Playstation 4
                    </a>
                    <a href="xboxone.php" class="btn btn-outline-light ms-3">
                        Xbox One
                    </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    
                </ul>
                <form class="d-flex">
                    <a href="login.html" class="btn btn-outline-light">
                        <i class="bi bi-person"></i> Vendedores
                    </a>

                    <a href="https://youtu.be/-MJAkb8Ci-Y" class="btn btn-outline-light ms-3">
                    <i class="bi bi-youtube"> Trailer Play 4</i>
                    </a>
                    <a href="https://youtu.be/JrwMAHVDbuU" class="btn btn-outline-light ms-3">
                    <i class="bi bi-youtube"> Trailer Xbox One</i>  
                    </a>
                </form>
            </div>
        </div>
    </nav>

   <!-- Header-->
   <header class="bg-danger py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                <i class="bi bi-stars"></i>
                <h1 class="display-4 fw-bolder">STARLIGHT</h1>
                    <p class="lead fw-normal text-white">La tienda mas Gamer de Argentina</p>
                </div>
            </div>
        </header>
        </div>
        <div class="carrouselHeader">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="imagenes/g.webp" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/p.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="imagenes/x.jfif" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </header>

        <!-- Section-->
        <section class="bg-dark py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                  <?php
                  // 1) Conexion
                  $conexion = mysqli_connect("127.0.0.1", "root", "");
                  mysqli_select_db($conexion, "starlight_tiendadevideojuegos");

                  // 2) Preparar la orden SQL
                  // Sintaxis SQL SELECT
                  // SELECT * FROM nombre_tabla
                  // => Selecciona todos los campos de la siguiente tabla
                  // SELECT campos_tabla FROM nombre_tabla
                  // => Selecciona los siguientes campos de la siguiente tabla
                  $consulta='SELECT * FROM videojuegos';

                  // 3) Ejecutar la orden y obtenemos los registros
                  $datos= mysqli_query($conexion, $consulta);

                  //  recorro todos los registros y genero una CARD PARA CADA UNA
                  while ($reg = mysqli_fetch_array($datos)) {?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo ucwords($reg['Marca']) ?></h5>
                                    <!-- Product price-->
                                  <h2>$<?php echo $reg['Precio']; ?></h2>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-5 border-top-0 bg-transparent">

                            <!--boton con link de pago que hay que cargar primero en la base de datos
                                <div class="text-center"> <?php// echo $reg['link']; ?></div>-->
                               <br>
                                <!--boton que me lleva a la pagina del producto-->
                                <div class="text-center">
                                  <a href="productos.php?id=<?php echo $reg['id'];?>"> <button type="button" name="button">Ver producto</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                  <?php } ?>

                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="py-5 bg-danger">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Peter Valladares</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</html>
