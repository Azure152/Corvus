<?php 

/* <=== =====================================================
    Clase Modelo
===================================================== ===> */

class Model {
    protected static $dbHost = 'localhost';
    protected static $dbUser = 'root';
    protected static $dbPass = '';
    protected static $dbName = 'corvus';

    /* <=== ========= Metodo - Abrir Conexion =========  ===> */
    protected static function openConnection() {
        $conn = new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, self::$dbName);
        $conn->set_charset('utf-8');
        return $conn;
    }

    /* <=== ========= Metodo - Cerrar Conexion =========  ===> */
    protected static function closeConnection($conn) {
        return $conn->close();
    }

    /* <=== ========= Metodo - Redireccionar =========  ===> */
    protected static function redirect($url) {
        return header("location: http://127.0.0.1/corvus{$url}");
    }
}