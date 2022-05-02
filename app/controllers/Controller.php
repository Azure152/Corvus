<?php 

/* <=== =====================================================
    Clase Modelo
===================================================== ===> */

class Controller {

    /* <=== ========= Metodo - Llamar Modelo =========  ===> */
    protected static function model($model) {
        if (file_exists("./app/models/{$model}.php")):
            return require_once "./app/models/{$model}.php";
        endif;
    }

    /* <=== ========= Metodo - Llamar Vista =========  ===> */
    protected static function view($view, $data = []) {
        if (file_exists("./app/views/{$view}-view.php")):
            return require_once "./app/views/{$view}-view.php";
        else:
            return require_once "./app/views/others/404-view.php";
        endif;
    }
    /* <=== ========= Metodo - Redireccionar =========  ===> */
    protected static function redirect($url) {
        return header("location: http://127.0.0.1/corvus{$url}");
    }
    
}