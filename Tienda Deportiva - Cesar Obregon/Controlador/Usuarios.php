<?php

class Usuarios extends Conexion
{

    public function ingresar(Usuario $par)
    {
        $ok = false;
        try {
            $consulta = $this->prepare('INSERT INTO usuarios '
                . ' (id, usuario,clave) '
                . 'VALUES(NULL,:USUARIO,:CLAVE)');

            $usuario = $par->getUsuario();
            $clave = $par->getClave();

            $consulta->bindParam(":USUARIO", $usuario, PDO::PARAM_STR);
            $consulta->bindParam(":CLAVE", $clave, PDO::PARAM_STR);

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

    public function editar(Usuario $par)
    {
        $ok = false;
        try {
            $id = $par->getId();
            $consulta = $this->prepare('UPDATE `usuarios` SET `usuario` = :USUARIO, `clave` = :CLAVE WHERE `usuarios`.`id` = '.$id.';');

            $usuario = $par->getUsuario();
            $clave = $par->getClave();

            $consulta->bindParam(":USUARIO", $usuario, PDO::PARAM_STR);
            $consulta->bindParam(":CLAVE", $clave, PDO::PARAM_STR);

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

    public function eliminar(Usuario $par)
    {
        $ok = false;
        try {
            $this->exec('DELETE FROM usuarios WHERE ID=' . $par->getId());
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