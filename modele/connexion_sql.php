<?php
function connexionBD($dbname){
	// param�tres de la base de donn�e
	$sgbdname='mysql';
	$host='127.0.0.1';
	$charset='utf8';
		
	// dsn : data source name
	$dsn = $sgbdname.':host='.$host.';dbname='.$dbname.';charset='.$charset;

	// utilisateur connect� � la base de donn�e
	$username = 'root';
	$password = '+413BKE78-';

	// pour avoir des erreurs SQL plus claires 
	$erreur = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try {
	    $bdd = new PDO($dsn, $username, $password, $erreur);
	} catch (PDOException $e) {
	    die ('Connexion �chou�e : ' . $e->getMessage() );
	}
	return $bdd;
}