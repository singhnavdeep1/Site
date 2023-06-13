<?php
session_start();
	try{
	$bdd = new PDO('mysql:host=localhost;dbname=site;','root','');
	}catch(Exception $e){
		die('Erreur'.$e->getMessage());
	}
if(isset($_GET['id']) AND !empty($_GET['id'])){
	$getid = $_GET['id'];
	$recupUser = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?'); //verifier dans bdd si l'id correspond a l'id d'un user
	$recupUser->execute(array($getid)); //recupere dans la table l'utilisateur avec l'id
	if($recupUser->rowCount() > 0){
		$bannirUser =$bdd->prepare('DELETE FROM utilisateurs WHERE id = ?');
		$bannirUser->execute(array($getid));
		header('Location: page_admin.php');
	}else{
		echo "Aucun membre n'a ete trouve";
	}
}else{
	echo "L'identifiant n'a pas ete recuperé";
}
?>