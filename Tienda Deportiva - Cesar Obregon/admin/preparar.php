<?php
require 'Conexion/Conexion.php';
require '../Modelo/Camiseta.php';
require '../Controlador/Camisetas.php';

require '../Modelo/Usuario.php';
require '../Controlador/Usuarios.php';

//Preparar datos para INGRESAR
if (isset($_POST["ingresar"])) {

    $objetoCam = new Camisetas();

    if ($objetoCam->abrirConexion()) {

        $ob = new Camiseta();
        $ob->setDescripcion($_POST['descripcion']);
        $ob->setPrecio($_POST['precio']);
        $ob->setId_categoria($_POST['categoria']);
        $ob->setEstado($_POST['estado']);

        if (isset($_FILES['foto'])) {
            //Validamos si cargo una imagen
            $rutaTemporal = $_FILES['foto']['tmp_name']; //obtengo la ruta donde temporalmente se encuentra guardado el archivo
            $nombreArchivo = $_FILES['foto']['name']; //obtengo el nombre.extension del archivo
            $rutaCompleta = "../img/camisetas/" . $nombreArchivo;

            move_uploaded_file($rutaTemporal, $rutaCompleta); //muevo, desde la ruta temporal al servidor

            $ob->setFoto($nombreArchivo);
        }else{
            $ob->setFoto("no_photo.jpg");
        }

        if ($objetoCam->ingresar($ob)) {
            echo "<p>La Camiseta se guardó con exito. <a href='inicio.php'>Ir al listado</a><p>";
        } else {
            echo "<p>No se pudo guardar la Camiseta. <a href='inicio.php'>Ir al listado</a><p>";
        }

        $objetoCam->cerrarConexion();
    } else {
        echo "Error al intentar conectar a la base de datos";
    }
}

//Preparar datos para EDITAR
if (isset($_POST["editar"])) {

    $objetoCam = new Camisetas();

    if ($objetoCam->abrirConexion()) {

        $ob = new Camiseta();
        $ob->setId($_POST['id']);
        $ob->setDescripcion($_POST['descripcion']);
        $ob->setPrecio($_POST['precio']);
        $ob->setId_categoria($_POST['categoria']);
        $ob->setEstado($_POST['estado']);

        
        if ($objetoCam->editar($ob)) {
            echo "<p>La Camiseta se guardó con exito. <a href='inicio.php'>Ir al listado</a><p>";
        } else {
            echo "<p>No se pudo guardar la Camiseta. <a href='inicio.php'>Ir al listado</a><p>";
        }

        $objetoCam->cerrarConexion();
    } else {
        echo "Error al intentar conectar a la base de datos";
    }
}

//Preparar Datos para ELIMINAR
if (isset($_GET["id"])) {

    $objetoCam = new Camisetas();

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


//Preparar datos para INGRESAR usuario
if (isset($_POST["ingresarUsuario"])) {

    $objetoUs = new Usuarios();

    if ($objetoUs->abrirConexion()) {

        $ob = new Usuario();
        $ob->setUsuario($_POST['usuario']);
        $ob->setClave($_POST['clave']);

        

        if ($objetoUs->ingresar($ob)) {
            echo "<p>La Camiseta se guardó con exito. <a href='inicioUsuarios.php'>Ir al listado</a><p>";
        } else {
            echo "<p>No se pudo guardar la Camiseta. <a href='inicioUsuarios.php'>Ir al listado</a><p>";
        }

        $objetoUs->cerrarConexion();
    } else {
        echo "Error al intentar conectar a la base de datos";
    }
}


//Preparar datos para EDITAR usuario
if (isset($_POST["editarUsuario"])) {

    $objetoUs = new Usuarios();

    if ($objetoUs->abrirConexion()) {

        $ob = new Usuario();
        $ob->setUsuario($_POST['usuario']);
        $ob->setClave($_POST['clave']);

        
        if ($objetoUs->editar($ob)) {
            echo "<p>La Camiseta se guardó con exito. <a href='inicioUsuarios.php'>Ir al listado</a><p>";
        } else {
            echo "<p>No se pudo guardar la Camiseta. <a href='inicioUsuarios.php'>Ir al listado</a><p>";
        }

        $objetoUs->cerrarConexion();
    } else {
        echo "Error al intentar conectar a la base de datos";
    }
}

?>