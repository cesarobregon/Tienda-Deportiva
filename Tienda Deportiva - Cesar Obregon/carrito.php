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
    

    <?php
    session_start();
    //Vaciar el carrito si se ha enviado el formulario
    if (isset($_POST['vaciar_carrito'])) {
        unset($_SESSION['carrito']);
    }

    // Verifica si el carrito existe
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        ?>
        <div class="container-carrito">
            <div class="tabla1">
                <table>
                    <tbody>
                    <tr ><th>Nombre del Producto</th><th>Talle</th><th>Precio</th></tr>
                    <?php
                    $cantidad = 0;
                    $total = 0;
                    foreach ($_SESSION['carrito'] as $producto) {
                        echo '<tr>';
                        echo '<td>' . $producto['descripcion'] . '</td>';
                        echo '<td>' . $producto['talle'] . '</td>';
                        echo '<td>$' . number_format($producto['precio'], 2, ",", ".") . '</td>';
                        echo '</tr>';
                        $total = $total + $producto['precio'];
                        $cantidad = $cantidad + 1;
                    }?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
            <div class="resumen">
                <h2>Resumen de compra</h2>
                <hr><br>
                <table class="tabla2">
                    <tr>
                        <td><b>Producto(s)</b></td>
                        <td><b><?php echo $cantidad; ?></b></td>
                    </tr>
                    <tr>
                        <td><b>TOTAL</b></td>
                        <td><b>$<?php echo number_format($total, 2, ",", ".");?></b></td>
                    </tr>
                </table><br>
                <form class="botones" method="post" action="carrito.php">
                    <button class="btn-vaciar" type="submit" name="vaciar_carrito">Vaciar Carrito</button>
                </form>
                <form class="botones" action="https://link.mercadopago.com.ar/tiendadeportiva39" target="_blank">
                    <button class="btn-comprar"><b>Comprar</b></button><br>
                </form>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="container-carrito">
            <div class="tabla1">
                <table>
                    <tbody>
                    <tr><th>Nombre del Producto</th><th>Talle</th><th>Precio</th></tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
            <div class="resumen">
                <h2>Resumen de compra</h2>
                <hr><br>
                <table class="tabla2">
                    <tr>
                        <td><b>Producto(s)</b></td>
                        <td><b>0</b></td>
                    </tr>
                    <tr>
                        <td><b>TOTAL</b></td>
                        <td><b>$0</b></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php
    }
    ?>

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