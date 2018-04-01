<?php
    if( isset($_POST['id']) && isset($_POST['titre']) && isset($_POST['annee']) &&
        isset($_POST['technique']) && isset($_POST['support']) && isset($_POST['largeur']) &&
        isset($_POST['largeur']) && isset($_POST['hauteur']) && isset($_POST['petiteImage']) && isset($_POST['grandeImage']) ) {
        
        $oeuvreToUpdate = new Oeuvre();
        $oeuvreToUpdate->init( $_POST['id'], $_POST['titre'], $_POST['annee'], $_POST['technique'], $_POST['support'], $_POST['largeur'], $_POST['hauteur'], $_POST['prix'], $_POST['petiteImage'], $_POST['grandeImage']);
        $count = $daoOeuvre->update( $oeuvreToUpdate );

        if( $count > 0 ) $messages [] = '<strong>L\'enregistrement #'. $_POST['id'] .' :</strong> a été correctement mis à jour.';
        else $errors [] = 'Une erreur est survenue lors de la mise à jour de <strong>l\'enregistrement #'. $_POST['id'] . '</strong>.';
    }

?>