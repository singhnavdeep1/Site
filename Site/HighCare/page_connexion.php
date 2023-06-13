<?php
session_start();
if(isset($_SESSION['user'])) {
	header('Location:page_profil.php');
}
?>

<!DOCTYPE html>
	<html>
	<?php include 'include/head.php';?>
	<body>
    <header>
	<?php include'include/navbar1.php';?>

        
    </header>

	<div class="btn">
      <div>
        <h1 class="display-4">Bonjour !</h1>
        <h3>Veuillez vous connecter pour acceder au site</h3>
      </div>
    </div>

		<div class="login-form">
			<?php if(isset($_GET['login_err'])) {
				$err = htmlspecialchars($_GET['login_err'])
				?>
				<div class="alert alert-danger" role="alert">
				Le nom d'utilisateur ou le mot de passe est incorrect
				</div>
				<?php
			}
			?>
		</div>

		<form action="connexion.php" method="POST" class="login-form">
				<h2 class="text-center">Connexion</h2>
				<div class="form-group">
					<input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
				</div>
				<div class="form-group">
					<input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
				</div>
				<div class="form-group">
					<button type="submit" name="valider" class="btn btn-primary btn-block">Connexion</button>
				</div>
				<p class="text-center"><a href="page_inscription.php">Pas de compte ? S'inscrire</a></p>
			</form>
			

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