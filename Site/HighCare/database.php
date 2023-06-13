<?php

try { //essaie de se connecter à BDD
	
	
	$bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8','root',''); //PDO permet de faire des requetes sql
}catch (Exception $e) { // si il n'y arrive pas genere un mess d'erreur
	die('une erreur a été detectée : '. $e->getMessage() );
}
?>