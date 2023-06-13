<?php 


// Fonction qui récupère les utilisateurs inscrit sur le site
function getAllUsers()
{
    require('database.php');
    $req = $bdd->prepare('SELECT * FROM utilisateurs');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data; 
    $req->closeCursor();
}


// Fonction qui récupère tous les sérums
function getSerums()
{
    require('database.php');
    $req = $bdd->prepare('SELECT * FROM articles ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}


// Fonction qui récupère un sérum en fonction de l'id
function getSerum($id)
{
    require('database.php');
    $req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount() == 1)
    {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }else {
        header('Location:page_serums.php');
    }
    $req->closeCursor();
}

// Fonction qui récupère les avis d'un sérum
function getReviewsBySerum($id)
{
    require('database.php');
    $req = $bdd->prepare('SELECT * FROM avis INNER JOIN utilisateurs ON utilisateurs.id = avis.utilisateurId WHERE articleId = ? ORDER BY date DESC '); 
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

// Fonction qui récupère les avis d'un utilisateur
function getReviewsByUser($id)
{
    require('database.php');
    $req = $bdd->prepare('SELECT * FROM avis INNER JOIN utilisateurs ON utilisateurs.id = avis.utilisateurId INNER JOIN articles ON articles.id = avis.articleId WHERE utilisateurId = ? ORDER BY avis.date DESC'); 
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}


// Fonction qui ajoute un avis à un sérum
function addReview($articleId, $utilisateurId, $comment, $note)
{
    require('database.php');
    if($note == 0) $note = null;
    $req = $bdd->prepare('INSERT INTO avis (articleId, utilisateurId, comment, note, date) VALUES
    (?,?,?,?, NOW())');
    $req->execute(array($articleId, $utilisateurId, $comment, $note)); 
    $req->closeCursor();
}

