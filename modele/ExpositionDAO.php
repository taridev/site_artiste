<?php

require_once ( 'entite/Autoloader.class.php' );

Autoloader::register();

class ExpositionDAO {

    public function findAll () {

        $connexion = Connexion::getInstance();
        $statement = $connexion->query( 'SELECT * FROM EXPOSITION' );
        
        return $statement->fetchAll( PDO::FETCH_CLASS, 'Exposition');
    }

    public function findById ( $id ) {
        
        $connexion = Connexion::getInstance();
        $statement = $connexion->prepare( 'SELECT * FROM EXPOSITION WHERE id = :id' );
        $statement->bindParam( ':id', $id, PDO::PARAM_INT );
        $statement->execute();
        $statement->setFetchMode( PDO::FETCH_CLASS, 'Exposition');
        
        return $statement->fetch();
    }

}

?>