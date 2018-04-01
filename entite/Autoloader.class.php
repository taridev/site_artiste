<?php

class Autoloader {

    static function register() {

        spl_autoload_register( array(__CLASS__, 'autoload') );

    }

    static function autoload( $classname ) {

        // Si le nom de la classe se termine par DAO
        if( preg_match('/DAO$/', $classname) ) require_once ( 'modele/' . $classname . '.php' );
        
        else require_once ( 'entite/' .$classname . '.class.php' );

    }

}

?>