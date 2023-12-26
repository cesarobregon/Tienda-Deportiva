<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cesar Lautaro Obregon">
    <meta name="robots" content="noindex,nofollow">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1 class="titulo">Panel de Control</h1>
    </header>
    <div class="container-login">
        <form class="form" action="login.php" method="post">
            <h2 class="form-titulo">Iniciar Sesion</h2>
            <div class="form-container">
                <div class="form-grupo">
                    <input type="text" id="usuario" class="form-input" placeholder=" " name="usuario" required>
                    <label for="usuario" class="form-label">Usuario</label>
                    <span class=""></span>
                </div>
            </div>
            <div class="form-container">
                <div class="form-grupo">
                    <input type="password" id="password" class="form-input" placeholder=" " name="contrasena" required>
                    <label for="password" class="form-label">Contraseña</label>
                    <span class=""></span>
                </div>
                <input type="submit" class="form-submit" value="Ingresar">
            </div>
        </form>
    </div>
</body>
</html>