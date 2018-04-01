<?php

    if( isset($_SESSION['login']) && $_SESSION['login'] == 'admin' ) {

        if( isset($_POST['update']) ) include( 'controleur/private/updateOeuvre.script.php' );
        elseif( isset($_POST['delete']) OR isset($_POST['delete-multiple']) ) 
            include( 'controleur/private/deleteOeuvre.script.php' );
        elseif( isset($_POST['create']) ) include( 'controleur/private/createOeuvre.script.php' );
        
        $lesOeuvres = $daoOeuvre->findAll();
        include('vue/public/vueIndexOeuvresAdministration.php');
    }

    else {

        include( 'vue/public/vueIndexAdministration403.php' );
    }
?>