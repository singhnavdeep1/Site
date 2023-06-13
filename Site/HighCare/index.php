
<?php 
    session_start(); // on démarre de la session
?>
    



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>High-Care</title>
    <link rel="stylesheet" type="text/css" href="css/styleindex.css">
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

    
      <h1 class="display-4">Bienvenue sur HighCare!</h1>
     
      <h3>Viens connaitre les avis des autres sur des serums avant ton prochain achat !</h3>
      
   <img src="https://cdn.create.vista.com/api/media/medium/441264552/stock-photo-cropped-view-woman-holding-bottle?token">

    <footer class="footer fixed-bottom bg-white">
      <center>
        <p>Copyright &copy; Elisa Ranjalahy and Navdeep Singh - 2022</p>
      </center>
    </footer>
  </body>
</html>
