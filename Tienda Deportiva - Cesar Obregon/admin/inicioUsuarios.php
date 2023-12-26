<?php
require_once 'Conexion/database.php';
$db = new Database();
$con = $db->Conectar();
$sql = $con->prepare("SELECT id, usuario, clave FROM usuarios");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1 class="titulo">Panel de Control</h1>
    </header>
    <div>
        <br><h1>Listado de Usuarios</h1><br>
        <form class="boton" action="inicio.php"><button class="btn">Atras</button></form>
        <form class="boton" action="nuevoUsuario.php"><button class="btn">Nuevo Usuario</button></form>
    </div>
    <table class="tabla-inicio">
        <thead>
            <tr>
                <th>Acción</th>
                <th>Id</th>
                <th>Usuario</th>
                <th>Clave</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resultado as $row){
                $id = $row["id"];
                $usuario = $row["usuario"];
                $clave = $row["clave"];
                
                echo "<tr>";
                    echo "<td>";
                    echo "<a href='editarUsuario.php?id=$id&usuario=$usuario&clave=$clave'><img src='img/icon-editalt.png' width='24px' title='Editar'></a>";
                    echo "<a href='eliminarUsuario.php?id=$id'><img src='img/icon-deletefile.png' width='24px' title='Eliminar'></a>";
                    echo "</td>";
                    
                    echo "<td>$id</td>";
                    echo "<td>$usuario</td>";
                    echo "<td>$clave</td>";
                echo "</tr>";
            }?>
        </tbody>
    </table>
</body>

</html>