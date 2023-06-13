<?php
session_start();
if(!isset($_SESSION['user'])) {
	header('Location:page_connexion.php');
}
if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
  header('Location: page_serums.php');
else
{
  extract($_GET);
  $id = htmlspecialchars($id);

  require_once('functions.php');

  if(!empty($_POST))
   {
    extract($_POST); 

    $comment=htmlspecialchars($_POST['comment']);
    $note=htmlspecialchars($_POST['note']);

    $comment= addReview($id, $_SESSION['user']['id'], $comment, $note);
    $success = 'Votre commentaire à été publié';


   }

  $serum = getSerum($id);
  $avis = getReviewsBySerum($id);
}



?>



<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>High-Care</title>
        <?php include 'include/head.php';?>
    </head>
    <body>

    <header>
    
          <?php 
            if(isset($_SESSION['user'])){
              include'include/navbarCo.php';
            }else{
               include'include/navbar1.php';
            }
              ?>
    </header>

    <div>
      <h1><?= $serum->titre ?></h1>
      <p><?= $serum->marque ?></p>
      <hr/>
      <p><?= $serum->description ?></p>
    </div>

    
    <a href="page_serums.php"> <- Retour à la liste des sérums</a>
    </br>
    </br>
    
    <div>
    <img src="<?= $serum->imageUrl ?>" style="width:350px;object-fix:contain;" alt="Responsive image">
    </div>

          </br>
          </br>


  
    <form action="page_serum.php?id=<?= $serum->id ?>" method="POST" >
				<h2>Laisser un avis et/ou une note</h2>
        <div style="display:flex;align-items:center;">
				<div>
					<input type="text" name="comment"  placeholder="Commentaire" autocomplete="off">
				</div>
        <div>
				<select name="note">
          <option value="0">Note</option>
          <option value="1">1 ★</option>
          <option value="2">2 ★★</option>
          <option value="3">3 ★★★</option>
          <option value="4">4 ★★★★</option>
         <option value="5">5 ★★★★★</option>
        </select>
				</div>
        </div>
				<div>
					<button type="submit" name="valider">Publier</button>
				</div>
			</form>



        
      <h2>Les avis : </h2>
      </br>
      <?php foreach($avis as $avi): ?>
        <h4>Pseudo: <?= $avi->pseudo ?></h4>
        <time>Date: <?= $avi->date ?></time>
        <p>Commentaire: <?= $avi->comment ?></p>

  
        <?php if($avi->note == null) {
          ?> <p></p> <?php
        }
        else if($avi->note == 1) {
             ?> <p>Note: 1 ★</p> <?php
        }
        else if($avi->note == 2) {
             ?> <p>Note: 2 ★★</p> <?php
        }
        else if($avi->note == 3) {
             ?> <p>Note: 3 ★★★</p> <?php
        }
        else if($avi->note == 4) {
             ?> <p>Note: 4 ★★★★</p> <?php
        }
       else if($avi->note == 5) {
             ?> <p>Note: ★★★★★</p> <?php
        }
        
        ?>
      
 
        <?php endforeach; ?>
      </div>
        <footer class="footer">
              <p>Copyright &copy; Elisa Ranjalahy and Navdeep Singh - 2022</p>
        </footer>
        
        </body>
</html>