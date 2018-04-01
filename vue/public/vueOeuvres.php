<!DOCTYPE html>
<html lang="fr">
<head><?php include("include/head.php"); ?></head>

<body>
	<?php include("include/header.php"); ?>	

	<?php
	foreach($lesOeuvres as $ligne){
		print $ligne->exportHtml();
	} 
	?>
</body>	
</html>