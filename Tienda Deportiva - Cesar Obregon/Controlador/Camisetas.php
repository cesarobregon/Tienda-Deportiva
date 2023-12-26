<?php

class Camisetas extends Conexion
{

    public function ingresar(Camiseta $par)
    {
        $ok = false;
        try {
            $consulta = $this->prepare('INSERT INTO camisetas '
                . ' (id, descripcion,precio,foto,id_categoria,activo) '
                . 'VALUES(NULL,:DESCRIPCION,:PRECIO,:FOTO,:ID_CATEGORIA,:ACTIVO)');

            $descripcion = $par->getDescripcion();
            $precio = $par->getPrecio();
            $foto = $par->getFoto();
            $id_categoria = $par->getId_categoria();
            $activo = $par->getEstado();

            $consulta->bindParam(":DESCRIPCION", $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(":PRECIO", $precio, PDO::PARAM_INT);
            $consulta->bindParam(":FOTO", $foto, PDO::PARAM_STR);
            $consulta->bindParam(":ID_CATEGORIA", $id_categoria, PDO::PARAM_INT);
            $consulta->bindParam(":ACTIVO", $activo, PDO::PARAM_INT);

            $consulta->execute();
            $ok = true;
        } catch (PDOException $pdoex) {
            echo 'Error:' . $pdoex->getMessage();
        } catch (Exception $ex) {
            echo 'Error:' . $ex->getMessage();
        } finally {
            return $ok;
        }
    }

    public function editar(Camiseta $par)
    {
        $ok = false;
        try {
            $id = $par->getId();
            $consulta = $this->prepare('UPDATE `camisetas` SET `descripcion` = :DESCRIPCION, `precio` = :PRECIO,
            `id_categoria` = :ID_CATEGORIA, `activo` = :ACTIVO WHERE `camisetas`.`id` = '.$id.';');

            $descripcion = $par->getDescripcion();
            $precio = $par->getPrecio();
            $id_categoria = $par->getId_categoria();
            $activo = $par->getEstado();

            $consulta->bindParam(":DESCRIPCION", $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(":PRECIO", $precio, PDO::PARAM_INT);
            $consulta->bindParam(":ID_CATEGORIA", $id_categoria, PDO::PARAM_INT);
            $consulta->bindParam(":ACTIVO", $activo, PDO::PARAM_INT);

            $consulta->execute();
            $ok = true;
        } catch (PDOException $pdoex) {
            echo 'Error:' . $pdoex->getMessage();
        } catch (Exception $ex) {
            echo 'Error:' . $ex->getMessage();
        } finally {
            return $ok;
        }
    }

    public function eliminar(Camiseta $par)
    {
        $ok = false;
        try {
            $this->exec('DELETE FROM camisetas WHERE ID=' . $par->getId());
            $ok = true;
        } catch (PDOException $pdoex) {
            echo 'Error:' . $pdoex->getMessage();
        } catch (Exception $ex) {
            echo 'Error:' . $ex->getMessage();
        } finally {
            return $ok;
        }
    }
}