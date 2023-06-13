<?php
session_start(); 
require_once 'database.php';
echo("salut");
if(isset($_POST['valider'])){

if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
	$pseudo=htmlspecialchars($_POST['pseudo']);
	$password=htmlspecialchars($_POST['mdp']);
	$mdp=hash('sha256',$password);

        // SELECT * FROM Utilisateurs WHERE pseudo = :pseudo
        $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo=? AND password=?');
        $check->execute(array($pseudo,$mdp));
        $data=$check->fetch();
        $row=$check->rowCount();

		echo $row;

        if ($row == 1) {
        	$_SESSION['user']=$data;
			if($data['admin'] == 1) {
				// Redirection page spécifique admin si admin
				header('Location:page_admin.php');
			}
			else {     
				// Redirection page utilisateur si pas admin
			    header('Location:page_profil.php');
			}

        }
		else header('Location:page_connexion.php?login_err=already');


}


}


?>
