<!DOCTYPE html>
<html lang="fr">
<head><?php include("include/head.php"); ?></head>

<body>
	<?php 

	include("include/header.php");

	if( !isset($_GET['id']) ) {
		foreach($lesExpos as $ligne){
			print $ligne->exportHtml();
		} 
	}

	else {
		// Récupération de l'expo et des oeuvres correspondantes
		$expoOeuvres = $daoOeuvreExpo->findByExposition( $_GET['id'] );
		// 
		print $expoOeuvres->exportHtml();
	}
	?>
</body>	
</html>