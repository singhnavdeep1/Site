<?php
session_start(); 
require_once 'database.php';
if(isset($_POST['valider'])){

if(!empty($_POST['titre']) AND !empty($_POST['marque']) AND !empty($_POST['peau']) AND !empty($_POST['imageUrl']) AND !empty($_POST['description'])){

	$titre=htmlspecialchars($_POST['titre']);
	$marque=htmlspecialchars($_POST['marque']);
    $description=htmlspecialchars($_POST['description']);
    $imageUrl=htmlspecialchars($_POST['imageUrl']);
	$peau=htmlspecialchars($_POST['peau']);


    $req = $bdd->prepare('INSERT INTO articles (titre, marque, description, imageUrl, peau, date) VALUES (?,?,?,?,?, NOW())');
    $req->execute(array($titre, $marque, $description, $imageUrl, $peau)); //???? comment ca fonctionne
    $req->closeCursor();

    header('Location:page_serums.php');

}

}

?>
