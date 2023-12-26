<?php
require '../Modelo/Usuario.php';
require '../Controlador/Usuarios.php';

//Preparar Datos para ELIMINAR
if (isset($_GET["id"])) {

    $objetoUs = new Camisetas();

    if ($objetoCam->abrirConexion()) {

        $ob = new Camiseta();
        $ob->setId($_GET['id']);

        if ($objetoCam->eliminar($ob)) {
            echo "<p>La Camiseta se eliminó con exito. <a href='inicio.php'>Ir al listado</a><p>";
        } else {
            echo "<p>Problemas al intentar eliminar la Camiseta. <a href='inicio.php'>Ir al listado</a><p>";
        }

        $objetoCam->cerrarConexion();
    } else {
        echo "Error al intentar conectar a la base de datos";
    }
}