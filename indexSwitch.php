<?php
// on est dans l'index du site : au démaragge. Rien n'existe à part les super globales

// On demarre les sessions
session_start();

// Système de debug simple
$debug=1; 
if($debug==1){ 
	echo'IndexSwitch.php - SESSION : '; print_r($_SESSION);echo'<br/>'; 
	echo'POST : ';print_r($_POST);echo'<br/>'; 
	echo'GET : ';print_r($_GET);echo'<br/>';
}

require_once ( 'entite/Autoloader.class.php' );

Autoloader::register();

// On se connecte à la BD à chaque nouvel page. 
// Il faudrait éviter une reconnexion : un pattern singleton fait ça très bien !
$connection = Connexion::getInstance();
$daoOeuvre = new OeuvreDAO();
$daoExpo = new ExpositionDAO();
$daoOeuvreExpo = new OeuvreExposeeDAO();

// grand SWITCH d'accès aux pages

// LE BLOG
if (isset($_GET['indexOeuvres']) OR isset($_POST['indexOeuvres']) ) {
	// echo 'coucou indexOeuvres';
	include('controleur/public/indexOeuvres.php');
}

elseif ( isset($_GET['indexExpositions']) OR isset($_POST['indexOeuvres']) ) {
	include('controleur/public/indexExpositions.php');
}

elseif ( isset($_GET['signin']) ) {
	include('controleur/public/login.script.php');
}

elseif ( isset($_GET['indexOeuvresAdministration']) OR isset($_POST['indexOeuvresAdministration']) ) {
	include('controleur/public/indexOeuvresAdministration.php');
}

elseif ( isset($_GET['indexExpositionsAdministration']) OR isset($_POST['indexExpositionsAdministration']) ) {
	include('controleur/public/indexExpositionsAdministration.php');
}

