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

   
        <h1>Bonjour !</h1>
        <p>Inscris-toi et rejoins-nous pour lire de super avis!</p>
  

          
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div>
                                <strong>Succès</strong> l'inscription s'est déroulée avec succès !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div>
                                <strong>Erreur</strong> le mot de passe est différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div>
                                <strong>Erreur</strong> l'email n'est pas valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div>
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div>
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div>
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
        

        <form action="inscription.php" method="POST" class="login-form">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" name="Envoyer" class="btn btn-primary btn-block">Inscription</button>
                </div>   
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