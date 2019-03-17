<?php

require 'conexion.php';

class Usuario
{

    public function __construct()
    {

    }

    public static function verUsuarios()
    {
        $consulta = "SELECT * FROM usuarios";
        try
        {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC); // fetch y fetchAll   
        } catch (PDOException $e) {
            return "Error database . " . $e;
        }
    }

    public static function verUsuario($id)
    {
        $consulta = "SELECT * FROM usuarios WHERE id_usuario = ?";
        try
        {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id));

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error database . " . $e;
        }
    }

    public static function registrar($nombre)
    {
        $comando = "INSERT INTO usuarios (nombre) VALUES (?)";

        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        $resultado = $sentencia->execute(array($nombre));

        if ($resultado) {
            return $resultado;
        } else {
            return -1;
        }
    }

    public static function actualizar($id, $nombre)
    {
        $consulta = "UPDATE usuarios SET nombre = ? WHERE id_usuario=?";

        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        $cmd->execute(array($id, $nombre));

        return $cmd;
    }

    public static function eliminar($id)
    {
        $comando   = "DELETE FROM usuarios WHERE id_usuario = ?";
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id));
    }   

}
