<?php



    $target_dir = "images/";
    $target_file = '';
    $uploadOk = 1;
    
    if( isset($_POST['titre']) && isset($_POST['technique']) && isset($_POST['support']) && isset($_POST['largeur']) && isset($_POST['hauteur']) && isset($_POST['prix']) ) {
        
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // On vérifie si le fichier est bien une image.
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check == false) {
            $errors [] = "Le fichier fourni n'est pas une image.";
            $uploadOk = 0;
        }
        // On vérifie que le fichier n'éxiste pas déjà
        if (file_exists($target_file)) {
            $errors [] = "Désolé, il existe déjà un fichier portant ce nom.";
            $uploadOk = 0;
        }
        // On vérifie la taille du fichier
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $errors [] = "Désolé, le fichier fourni est trop grand.";
            $uploadOk = 0;
        }
        // On vérifie le format de fichier
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $errors [] = "Désolé, seuls les fichiers de type JPG, JPEG, PNG & GIF sont acceptés.";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            $errors [] = "Désolé, le fichier n'a pu être uploadé.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $messages [] = "Le fichier ". basename( $_FILES["fileToUpload"]["name"]). " a été uploadé correctement.";
            } else {
                $errors [] = "Désolé, il y a eu une erreur lors de l'upload du fichier.";
            }
        }
        
        if( $uploadOk ) {
            $oeuvre = new Oeuvre();
            $oeuvre->init( NULL, $_POST['titre'], $_POST['annee'], $_POST['technique'], $_POST['support'], $_POST['largeur'], $_POST['hauteur'], $_POST['prix'], basename($target_file), basename($target_file) );
            if( $daoOeuvre->create( $oeuvre ) ) {
                $messages [] = 'Nouvelle Oeuvre insérée avec succès.';
            }
            else {
                $errors [] = 'Une erreur est survenue lors de l\'ajout d\'une nouvel oeuvre';
            }
        }
        else {
            $errors [] = 'La nouvelle oeuvre n\'a pu être créée.';
        }
    }


?>