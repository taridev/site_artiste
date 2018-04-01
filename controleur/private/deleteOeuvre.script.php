<?php

if( isset($_POST['id']) ) {
    $count = $daoOeuvre->delete( $_POST['id'] );

    if( $count > 0 ) $messages [] = '<strong>L\'enregistrement #'. $_POST['id'] .' :</strong> a été supprimé avec succès.';
    else $errors [] = 'Une erreur est survenue lors de la suppression de <strong>l\'enregistrement #'. $_POST['id'] . '</strong>.';
}

elseif( isset($_POST['ids']) ) {
    foreach( $_POST['ids'] as $id ) {
        $count = $daoOeuvre->delete( $id );

        if( $count > 0 ) $messages [] = '<strong>L\'enregistrement #'. $id .' :</strong> a été supprimé avec succès.';
        else $errors [] = 'Une erreur est survenue lors de la suppression de <strong>l\'enregistrement #'. $id . '</strong>.';
    }
}

?>