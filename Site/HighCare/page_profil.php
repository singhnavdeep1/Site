<?php
require_once('functions.php');
session_start();

  if(!isset($_SESSION['user'])) {
	 header('Location:page_connexion.php');
  }
  if($_SESSION['user']['admin'] ==  1) {
	 header('Location:page_admin.php');
  }else{
	$avisUtilisateur = getReviewsByUser($_SESSION['user']['id']); 
  }
?>



<!DOCTYPE html>
<html>
  <head>
    
   
    <?php include 'include/head.php';?>
  </head>
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
      <h1>Votre profil</h1>
      <p>Nom d'utilisateur : @<?php echo $_SESSION['user']['pseudo']; ?></p>
      <hr/>
      <p>Les derniers avis de votre compte : </p>
    </div>

	<div>
	<h2>L'historique de vos avis:</h2>
	</br>
	<?php foreach($avisUtilisateur as $avi):?> 
        <h4>Pseudo: <?= $avi->pseudo ?></h4>
        <time>Date: <?= $avi->date ?></time>
        <br><br>
        <time>Article: <?= $avi->titre ?></time>
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


