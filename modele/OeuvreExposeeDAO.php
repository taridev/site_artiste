<?php

require_once ( 'entite/Autoloader.class.php' );

Autoloader::register();

class OeuvreExposeeDAO {
    
    function findByExposition( $id_expo ) {

        // Récupération de la connexion
        $connection = Connexion::getInstance();
        // Préparation de la requête
        $statement = $connection->prepare( 'SELECT *  FROM OEUVRE_EXPOSEE oe
                                            JOIN OEUVRE o ON oe.id_oeuvre = o.id
                                            JOIN EXPOSITION e ON oe.id_exposition = e.id
                                            WHERE oe.id_exposition = :id_expo');
        // Passage de paramêtres
        $statement->bindParam( ':id_expo', $id_expo, PDO::PARAM_INT );
        // Execution de la requête
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

    public function findAll() {

        $connexion = Connexion::getInstance();
        // Préparation de la requête
        $statement = $connexion->query( 'SELECT *  FROM OEUVRE_EXPOSEE oe
                                        JOIN OEUVRE o ON oe.id_oeuvre = o.id
                                        JOIN EXPOSITION e ON oe.id_exposition = e.id' );
        
        $statement->execute();

        $oeuvresExposees = [];
        $expo = NULL; 
        $oeuvresExpos = $statement->fetchAll(PDO::FETCH_NAMED);

        foreach($oeuvresExpos as $ligne) {

            if( !isset($oeuvresExposees[$ligne['id_exposition']]) ) {

                $oeuvresExposees[ $ligne['id_exposition'] ] = new OeuvreExposee();
                $exposition = new Exposition();
                $exposition->init( $ligne['id_exposition'], $ligne['nom'], $ligne['lieu'], $ligne['adresse'], $ligne['dateDebut'], $ligne['dateFin'], $ligne['dateVernissage'] );
                $oeuvresExposees[ $ligne['id_exposition'] ]->setExposition( $exposition );
            }

            $oeuvre = new Oeuvre();
            $oeuvre->init( $ligne['id_oeuvre'], $ligne['titre'], $ligne['annee'], $ligne['technique'], $ligne['support'], $ligne['largeur'], $ligne['hauteur'], $ligne['prix'][0], $ligne['petiteImage'], $ligne['grandeImage'] );
                
            $oeuvresExposees[ $ligne['id_exposition'] ]->addOeuvre( $oeuvre );
        }

        return $oeuvresExposees;
    }

}

?>