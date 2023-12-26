<?php
require_once 'Conexion/database.php';
$db = new Database();
$con = $db->Conectar();

$id = isset($_GET["id"]) ? $_GET["id"] : '';

$sql = $con->prepare("SELECT descripcion,precio, foto FROM camisetas WHERE id=? AND activo=1 LIMIT 1");
$sql->execute([$id]);
$row = $sql->fetch(PDO::FETCH_ASSOC);
$descripcion = $row["descripcion"];
$precio = $row["precio"];

$imagen = $row["foto"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cesar Lautaro Obregon">
    <meta name="description" content="Venta de Camisetas de Futbol, Envios a todo el pais.">

    <meta name="keywords" content="palabra clave 1, palabra clave 2, palabra clave 3">
    <meta name="robots" content="index,noindex,follow,nofollow">

    <title>Tienda Deportiva</title>
    <link rel="shortcut icon" href="img/diegoblanco.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/1c6e8b5b7a.js" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <img class="logo" src="img/diegoblanco.png">
        <h1 class="titulo">Tienda Deportiva</h1>
        <nav>
            <ul class="menu-horizontal">
                <li><a href="index.html">Menu principal</a></li>
                <li>
                    <a href="camisetas.php">Productos</a>
                </li>
                <li>
                    <a href="carrito.php">Carrito</a>
                </li>
            </ul>
        </nav>
    </header>
    <nav>
        <p class="mensaje-inferior">Envios a todo el pais a partir de $40.000</p>
    </nav>

    <div class="container-camiseta">
        <div class="camiseta">
            <?php echo"<img src='img/camisetas/$imagen' alt='producto'>";?>
        </div>
        <div class="detalle-compra">
            
            <form method="post" action="agregar_al_carrito.php">
                <input type="hidden" name="producto_id" value="<?php echo $id;?>">
                <input type="hidden" name="producto_descripcion" value="<?php echo $descripcion;?>">
                <h1><?php echo $descripcion;?></h2>
                <input type="hidden" name="producto_precio" value="<?php echo $precio;?>">
                <h2>$<?php echo number_format($precio, 2, ".", ",");?></h2>
                <p>Seleccione el Talle</p>
                <select name="producto_talle" id="talle">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select><br>
                <br><input class="btn-carrito" type="submit" value="Agregar al carrito" >
            </form>
        </div>
    </div>

    <nav class="pago">
        <img src="img/pagos.jpg" alt="">
    </nav>
</body>

<footer class="pie">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="">
                    <img class="logo" src="img/diegoblanco.png" alt="logo">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p><b>Tienda Deportiva</b> es una empresa líder en la venta de productos deportivos. Con más de 30 años de
                experiencia en el mercado, contamos con operaciones en 20 sucursales físicas y en nuestra Tienda Online.
            </p>
        </div>
        <div class="box">
            <h2>SIGUENOS</h2>
            <div class="redsocial">
                <a href="https://www.facebook.com/"><img src="img/fac.png" alt="facebook"></a>
                <a href="https://www.instagram.com/"><img src="img/inst.png" alt="instagram"></a>
                <a href="https://twitter.com/?lang=es"><img src="img/x2.png" alt="twitter"></a>
                <a href="https://www.youtube.com/"><img src="img/you.webp" alt="youtube"></a>
            </div>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy; 2023 <b>Tienda Deportiva</b> - Todos los Derechos Reservados</small>
    </div>
</footer>

</html>