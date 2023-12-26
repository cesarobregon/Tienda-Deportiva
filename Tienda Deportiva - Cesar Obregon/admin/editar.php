<?php
if (isset($_GET['id']) && isset($_GET['descripcion']) && isset($_GET['precio'])) {
    $id = $_GET['id'];
    $descripcion = $_GET['descripcion'];
    $precio = $_GET['precio'];

} else {
    echo "Faltan parámetros en la URL.";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1 class="titulo">Panel de Control</h1>
    </header>
    <div>
        <br><h1>Formulario de Edicion: Camisetas</h1><br>
        <form class="boton" action="inicio.php"><button>Atras</button></form>
    </div>
    <form class="form" method="post" name="frmEditar" action="preparar.php" enctype="multipart/form-data">
        <h1>Modificar Datos</h1><br>
        <br><label for="id">ID</label><br>
        <input type="text" name="id" value="<?php echo $id; ?>" readonly><br>
        <br><label for="descripcion">DESCRIPCION</label><br>
        <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" required><br>
        <br><label for="precio">PRECIO(sin decimales)</label><br>
        <input type="number" name="precio" min="1" value="<?php echo $precio; ?>" required><br>

        <br><label for="categoria">CATEGORIA</label>
        <select name="categoria" required>
            <option value="0">Camisetas</option>
            <option value="1">Pantalones</option>
            <option value="2">Medias</option>
            <option value="3">Botines</option>
            <option value="4">Gorras</option>
            <option value="5">Camperas</option>
            <option value="6">Zapatillas</option>
        </select><br>
        <br><label for="estado">ESTADO</label>
        <select name="estado" required>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select><br>
        <br><input type="submit" value="Guardar" name="editar">
    </form>
</body>

</html>