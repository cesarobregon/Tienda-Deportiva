<?php
session_start();
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "tienda_deportiva";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Recuperar datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
// Consulta SQL para verificar el usuario y contraseña
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$contrasena'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Usuario y contraseña válidos
    $_SESSION['usuario'] = $usuario; // Guardar el nombre de usuario en la sesión
    header("Location: inicio.php"); // Redireccionar a la página de bienvenida
} else {
    // Usuario o contraseña incorrectos
    echo "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
}
$conn->close();
?>