<nav class="menu">
			<ul>
				<li class="btn">
				<h2>
				<a class="btn" href="index.php">High-Care&nbsp</a></h2></li>
				<?php 
            if(isset($_SESSION['user'])) 
            {
              ?>
        
			<li class="btn">
              <a class="btn" href="page_profil.php">&nbsp&nbspMon profil</a>
           </li>
           <li class="btn">
					<a href="typeDePeau.php">
						&nbsp&nbspType de peau
					</a>
				</li>
		   <li class="btn">
              <a class="btn" href="page_serums.php">&nbsp&nbspLes sérums</a>
           </li>
           <li class="btn">
              <a class="btn" href="deconnexion.php">&nbsp&nbspSe déconnecter</a>
           </li>
           <?php 
            }
            
            ?>
				
			</ul>
		</nav>