<?php

require_once ( 'entite/Autoloader.class.php' );

Autoloader::register();

class OeuvreDAO {

    public function findById( $id ) {

        $connexion = Connexion::getInstance();
        $statement = $connexion->prepare( 'SELECT * FROM OEUVRE WHERE id = :id' );
        $statement->bindParam( ':id', $id, PDO::PARAM_INT );
        $statement->execute();
        $statement->setFetchMode( PDO::FETCH_CLASS, 'Oeuvre');
        
        return $statement->fetch();

    }
    
    public function findAll() {

        $connexion = Connexion::getInstance();
        $statement = $connexion->query( 'SELECT * FROM OEUVRE' );
        
        return $statement->fetchAll( PDO::FETCH_CLASS, 'Oeuvre' );

    }

    public function findByExposition( $expoId ) {

        $connexion = Connexion::getInstance();
        $statement = $connexion->prepare( 'SELECT id, titre, annee, technique, support, largeur, hauteur, prix, petiteImage, grandeImage FROM OEUVRE JOIN OEUVRE_EXPOSEE ON id = id_oeuvreu WHERE id_exposition = :expoId' );
        $statement->bindParam( ':expoId', $expoIdid, PDO::PARAM_INT );
        $statement->execute();

        return $statement->fetchAll( PDO::FETCH_CLASS, 'Oeuvre' );

    }

    public function delete( $id ) {

        $connexion = Connexion::getInstance();
        $statement = $connexion->prepare( 'DELETE FROM OEUVRE WHERE id = :id' );
        $statement->bindParam( ':id', $id, PDO::PARAM_INT );
        $statement->execute();

        return $statement->rowCount();
    }

    public function update( $oeuvre ) {

        if( $oeuvre != NULL ) {

            try {
                $connection = Connexion::getInstance();
                // Préparation de la requête
                $statement = $connection->prepare( 'UPDATE OEUVRE SET titre = :titre, technique = :technique, support = :support, largeur = :largeur, hauteur = :hauteur, annee = :annee, prix = :prix, petiteImage = :petiteImage, grandeImage = :grandeImage WHERE id = :id' );
                // Binding des paramêtres de la requête
                $statement->bindValue( ':titre', $oeuvre->getTitre(), PDO::PARAM_STR );
                $statement->bindValue( ':technique', $oeuvre->getTechnique(), PDO::PARAM_STR );
                $statement->bindValue( ':support', $oeuvre->getSupport(), PDO::PARAM_STR );
                $statement->bindValue( ':largeur', $oeuvre->getLargeur(), PDO::PARAM_INT );
                $statement->bindValue( ':hauteur', $oeuvre->getHauteur(), PDO::PARAM_INT );
                $statement->bindValue( ':annee', $oeuvre->getAnnee(), PDO::PARAM_INT );
                $statement->bindValue( ':prix', $oeuvre->getPrix(), PDO::PARAM_INT );
                $statement->bindValue( ':petiteImage', $oeuvre->getPetiteImage(), PDO::PARAM_STR );
                $statement->bindValue( ':grandeImage', $oeuvre->getGrandeImage(), PDO::PARAM_STR );
                $statement->bindValue( ':id', $oeuvre->getId(), PDO::PARAM_INT );
                // Execution de la requête
                $statement->execute();

                // Retourne le nombre de lignes affectées si succès, sinon 0
                return $statement->rowCount();
            }
            catch ( PDOException $e ) {
                die( "Error: " . $e->getMessage() );
            }
        }



    }

    public function create( $oeuvre ) {
        
        $connexion = Connexion::getInstance();
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $connexion->prepare( 'INSERT INTO `OEUVRE` (`id`, `titre`, `annee`, `technique`, `support`, `largeur`, `hauteur`, `prix`, `petiteImage`, `grandeImage`) VALUES (NULL, :titre, :annee, :technique, :support, :largeur, :hauteur, :prix, :petiteImage, :grandeImage)' );
        ;

        $statement->bindValue( ':titre', $oeuvre->getTitre(), PDO::PARAM_STR );
        $statement->bindValue( ':annee', $oeuvre->getAnnee(), PDO::PARAM_INT );
        $statement->bindValue( ':technique', $oeuvre->getTechnique(), PDO::PARAM_STR );
        $statement->bindValue( ':support', $oeuvre->getSupport(), PDO::PARAM_STR );
        $statement->bindValue( ':largeur', $oeuvre->getLargeur(), PDO::PARAM_INT );
        $statement->bindValue( ':hauteur', $oeuvre->getHauteur(), PDO::PARAM_INT );
        $statement->bindValue( ':prix', $oeuvre->getPrix(), PDO::PARAM_INT );
        $statement->bindValue( ':petiteImage', $oeuvre->getPetiteImage(), PDO::PARAM_STR );
        $statement->bindValue( ':grandeImage', $oeuvre->getGrandeImage(), PDO::PARAM_STR );

        $result = $statement->execute();

        return $result;


    }

}

?>