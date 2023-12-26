<?php
session_start();
if (isset($_POST['producto_id'])) {
    $producto = array(
        'id' => $_POST['producto_id'],
        'descripcion' => $_POST['producto_descripcion'],
        'precio' => $_POST['producto_precio'],
        'talle' => $_POST['producto_talle']
    );
    // Se crea el carrito en caso de que no exista
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    // Agrego el producto al carrito
    $_SESSION['carrito'][] = $producto;
}
header('Location: camisetas.php');
exit();
?>