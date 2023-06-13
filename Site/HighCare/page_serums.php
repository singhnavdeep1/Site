<?php
session_start();
require_once('functions.php');
require('database.php');
    $allSerums=getSerums();
    // Recherche en fonction de la marque seulement
    if(isset($_GET['sMarque']) AND !empty($_GET['sMarque'])) {
      $recherche = htmlspecialchars($_GET['sMarque']);
      $req = $bdd->query('SELECT * FROM articles WHERE 
      marque LIKE "%'.$recherche.'%" ORDER BY date DESC');
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_OBJ);
      $allSerums=$data;
    }
    // Recherche en fonction de type de peau seulement
     if(isset($_GET['sPeau']) AND !empty($_GET['sPeau'])) {
       $recherche = htmlspecialchars($_GET['sPeau']);
       $req = $bdd->query('SELECT * FROM articles WHERE 
       peau LIKE "%'.$recherche.'%" ORDER BY date DESC');
       $req->execute();
       $data = $req->fetchAll(PDO::FETCH_OBJ);
       $allSerums=$data;
    }

      // Recherche en fonction de la marque et type de peau
      if(isset($_GET['sPeau']) AND !empty($_GET['sPeau']) AND isset($_GET['sMarque']) AND !empty($_GET['sMarque'])) {
       $rechercheMarque = htmlspecialchars($_GET['sMarque']);
       $recherchePeau = htmlspecialchars($_GET['sPeau']);
       $req = $bdd->query('SELECT * FROM articles WHERE 
       peau LIKE "%'.$recherchePeau.'%" AND marque LIKE "%'.$rechercheMarque.'%" ORDER BY date DESC');
       $req->execute();
       $data = $req->fetchAll(PDO::FETCH_OBJ);
       $allSerums=$data;
    }
    
?>



<!DOCTYPE html>
    <html>
    <?php include 'include/head.php';?>
    <body>

    <header>
   
          <?php 
            if(isset($_SESSION['user'])){
              include'include/navbarCo.php';
            }else{
               include'include/navbarIndex.php';
            }
              ?>
            
          
    </header>

    <div>
      <h1>Sérums</h1>
      <hr/>
      <h3>Partage et lis les recommandations des autres !</h3>
    </div>

    <div style="margin:20px auto; width:600px;" >
    <h3>Recherche en fonction de la marque et/ou type de peau:</h3>
    <form method="GET">
        <input style="width:350px;" type="search" name="sMarque" placeholder="Recherche un sérum en fonction de la marque" autocomplete="off">
        <select name="sPeau">
          <option value="">Type de peau</option>
          <option value="tous">Tous</option>
          <option value="normal">Normal</option>
          <option value="grasse">Grasse</option>
          <option value="mixte">Mixte</option>
          <option value="seche">Seche</option>
        </select>
        <input type="submit" name="envoyer">
    </form>
    
    <h3>Critère de selection: </h3>

    
    <!-- Affichage critère de selection, si on recherche rien on cache les critères sinon on affiche -->
    <?php 
    if(isset($_GET['sPeau']) OR isset($_GET['sMarque']) )
    {
      ?>
    <p>Marque: <?= $_GET['sMarque'] ?></p>
    <p>Type de peau: <?= $_GET['sPeau'] ?></p>
    <?php
    }
    ?>


    </div>


    <div>
    <div>
    <?php 
    if(count($allSerums) > 0)
    {
      foreach($allSerums as $serum): ?>  <!-- ??? + comment rentre les lien opaque-->
        <div>
          <img src=<?= $serum->imageUrl ?> alt="Card image cap" style="height:350px; object-fit: contain;"> <!-- ???-->
          <div>
            <h5><?= $serum->titre ?></h5>
            <p>Marque: <?= $serum->marque ?></p>
            <p>Type de peau: <?= $serum->peau ?></p>
            <p style="height: 150px;">Description: <?= $serum->description ?></p>
            <a href="page_serum.php?id=<?= $serum->id?>">Voir les avis</a>
          </div><!--comment fonctionne le lien +id-->
        </div>
            <?php endforeach; ?> <!-- ??-->
    <?php
    }
    else
    {
      ?>
      <p>Aucun sérums trouvé avec ce nom de marque </p>
      <?php
    }
    ?>
    
    
    </div>
    </div>

        <footer class="footer">
              <p>Copyright &copy; Elisa Ranjalahy and Navdeep Singh - 2022</p>
        </footer>
        
        </body>
</html>