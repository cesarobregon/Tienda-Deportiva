<?php
require_once 'Conexion/database.php';
$db = new Database();
$con = $db->Conectar();
$sql = $con->prepare("SELECT id, descripcion, precio, foto, id_categoria, activo FROM camisetas");
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
        <br><h1>Listado de Productos</h1><br>
        <form class="boton" action="index.php"><button class="btn">Salir</button></form>
        <form class="boton" action="nuevo.php"><button class="btn">Nuevo Producto</button></form>
        <form class="boton" action="inicioUsuarios.php"><button class="btn">Usuarios</button></form>
    </div>
    <table class="tabla-inicio">
        <thead>
            <tr>
                <th>Acción</th>
                <th>Imagen</th>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Id Categoria</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resultado as $row){
                $id = $row["id"];
                $descripcion = $row["descripcion"];
                $precio = $row["precio"];
                $imagen = $row["foto"];
                $id_categoria = $row["id_categoria"];
                if($row["activo"] == 1){
                    $estado = "activo";
                }else{
                    $estado = "inactivo";
                }
                
                echo "<tr>";
                    echo "<td>";
                    echo "<a href='editar.php?id=$id&descripcion=$descripcion&precio=$precio'><img src='img/icon-editalt.png' width='24px' title='Editar'></a>";
                    echo "<a href='preparar.php?id=$id'><img src='img/icon-deletefile.png' width='24px' title='Eliminar'></a>";
                    echo "</td>";
                    
                    echo "<td><img src='../img/camisetas/$imagen' alt='producto' width='80px' height='70px'></td>";
                    echo "<td>$id</td>";
                    echo "<td>$descripcion</td>";
                    echo "<td>$$precio</td>";
                    echo "<td>$id_categoria</td>";
                    echo "<td>$estado</td>";
                echo "</tr>";
            }?>
        </tbody>
    </table>
</body>

</html>