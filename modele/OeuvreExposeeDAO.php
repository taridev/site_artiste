<?php

require_once ( 'entite/Autoloader.class.php' );

Autoloader::register();

class OeuvreExposeeDAO {
    
    function findByExposition( $id_expo ) {

        $connection = Connexion::getInstance();
        $statement = $connection->prepare( 'SELECT *  FROM OEUVRE_EXPOSEE oe
                                            JOIN OEUVRE o ON oe.id_oeuvre = o.id
                                            JOIN EXPOSITION e ON oe.id_exposition = e.id
                                            WHERE oe.id_exposition = :id_expo');
        $statement->bindParam( ':id_expo', $id_expo, PDO::PARAM_INT );
        $statement->execute();
        $oeuvres = [];
        $expo = NULL; 
        while ( $assoc = $statement->fetch(PDO::FETCH_NAMED) ) {
            if( $expo == NULL ) {
                $expo = new Exposition();
                $expo->init( $assoc['id_exposition'], $assoc['nom'], $assoc['lieu'], $assoc['adresse'], $assoc['dateDebut'], $assoc['dateFin'], $assoc['dateVernissage']);
            }
            $oeuvre = new Oeuvre();
            $oeuvre->init( $assoc['id_oeuvre'], $assoc['titre'], $assoc['annee'], $assoc['technique'], $assoc['support'], $assoc['largeur'], $assoc['hauteur'], $assoc['prix'][0], $assoc['petiteImage'], $assoc['grandeImage'] );
            $oeuvres [] = $oeuvre;
        }
        
        $result = new OeuvreExposee();
        $result->setExposition( $expo );
        $result->setOeuvres( $oeuvres );

        return $result;

    }

}

?>