<?php

define('DB_HOST_STRING', 'mysql:host=127.0.0.1');
define('DB_NAME', 'dbname=site_artiste');
define('DB_USER', 'artiste');
define('DB_USER_PASSWORD', 'artiste');


class Connexion {
    
    private static $connexionString = DB_HOST_STRING . ';' . DB_NAME . ';charset=utf8';
    private static $user            = DB_USER;
    private static $password        = DB_USER_PASSWORD;

    private static $instance = NULL;

    public static function getInstance() {

        if ( !isset( self::$instance ) ) {

            try {
                self::$instance = new PDO( self::$connexionString, self::$user, self::$password );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } 
            catch (PDOException $e) {
                die( 'Error: ' . e.getMessage() );
            }

        } 

        return self::$instance; 

    }

}

?>