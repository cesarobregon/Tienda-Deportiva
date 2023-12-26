<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1 class="titulo">Panel de Control</h1>
    </header>
    <div>
        <br><h1>Formulario de carga: Usuarios</h1><br>
        <form class="boton" action="inicio.php"><button>Atras</button></form>
    </div>
    <form class="form" method="post" name="frmNuevo" action="preparar.php" enctype="multipart/form-data">
        <h1>Ingresar Datos</h1><br>

        <label for="usuario">USUARIO</label><br>
        <input type="text" name="usuario" required><br>

        <br><label for="clave">CONTRASEÑA</label><br>
        <input type="password" name="clave" required><br>

        <br><input type="submit" value="Guardar" name="ingresarUsuario">
    </form>
</body>

</html>