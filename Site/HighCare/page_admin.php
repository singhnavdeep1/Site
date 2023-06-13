<?php
require_once('functions.php');
session_start();
if($_SESSION['user']['admin'] != 1) {
  header('Location:index.php');
}
else
{

	$utilisateurs = getAllUsers();
  $avisUtilisateur = getReviewsByUser($_SESSION['user']['id']);
}
?>



<!DOCTYPE html>
<html>
  <?php include 'include/head.php';?>
  <body>
    <header>
      <?php include'include/navbarCo.php';?>
    </header>

    <div>
      <h1 class="display-4">Coin administrateur</h1>
      <p>Nom de l'admin : @<?php echo $_SESSION['user']['pseudo']; ?></p>
      <hr/>
      <p>Gérer le site</p>
    </div>


	<center> <h2>Bannir un utilisateur :</h2> </center>
        </br>

      <ul style="width: 340px; margin:0 auto;">
        <?php foreach($utilisateurs as $utilisateur): ?>
        <li style="display:flex; justify-content:space-between">@<?= $utilisateur->pseudo ?> <a href="bannir.php?id=<?= $utilisateur->id?>">Bannir</a></li>
        <?php endforeach; ?>
      </ul>
  
  <center> <h2>Ajouter un nouveau sérum :</h2> </center>



  <form action="ajouterArticle.php" method="POST" class="login-form"> 
                <div class="form-group">
                    <input type="text" name="titre" class="form-control" placeholder="Titre" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="marque" class="form-control" placeholder="Marque" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                <label>Type de peau: </label>
                <select name="peau"  class="form-control">
                 <option value="tous">Tous</option>
                 <option value="normal">Normal</option>
                 <option value="grasse">Grasse</option>
                 <option value="mixte">Mixte</option>
                 <option value="seche">Seche</option>
                </select>
                </div>
       
                <div class="form-group">
                    <input type="text" name="imageUrl" class="form-control" placeholder="Coller l'url de l'image" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                <textarea id="description" name="description" rows="4" cols="45" placeholder="Entrer une description" required="required"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="valider" class="btn btn-primary btn-block">Ajouter</button>
                </div>   
  </form>

            
  <h2>L'historique de vos avis: </h2>
    </br>
	<?php foreach($avisUtilisateur as $avi):   ?> 
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
            
        <style>
			.login-form {
				width: 340px;
				margin: 50px auto;
			}
      .form-group input {
        width: 340px;
      }
			.login-form form {
				margin-bottom: 15px;
				background: #91b2ae;
				box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				padding: 30px;
			}
			.login-form h2 {
				margin: 0 0 15px;
			}
			.form-control, .btn {
				min-height: 38px;
				border-radius: 2px;
			}
			.btn {
				font-size: 15px;
				font-weight: bold;
			}
		</style>

    <footer class="footer">
        <p>Copyright &copy; Elisa Ranjalahy and Navdeep Singh - 2022</p>
    </footer>

</body>
    
</html>


