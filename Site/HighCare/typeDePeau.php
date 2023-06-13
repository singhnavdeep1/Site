<!DOCTYPE html>
<html>
<?php 
    session_start(); // on démarre de la session
?>
	
	<?php include'include/head.php'?>
<body class="swag">
	<header>
		<?php if(isset($_SESSION['user'])){
			include 'include/navbarCo.php';
		}else{
		include 'include/navbarIndex.php';
	}
	?> 
</header>
	<h1 align="center">Type De Peau</h1>
		<h3>Peau Normale</h3>
	<br>
		<p class="a">VOTRE PEAU EST NORMALE :</p><p> lisse et confortable, les niveaux d’eau et de gras sont en parfait équilibre. Son aspect est mat et son grain de peau régulier. <br>Alors que la peau ne présente pas de problème particulier, elle est tout de même susceptible aux agressions extérieures (pollution, soleil, vent) et doit faire face au vieillissement cutané. Vous avez besoin de soins capables de préserver l’équilibre et la jeunesse de votre peau.</p>
		
		<br><br>
		<h3>Peau Seche </h3>
		<p class="a">VOTRE PEAU EST SÈCHE :</p><p> son grain de peau est fin mais elle tiraille et manque d’éclat. Déficiente en sébum, mal protégée, votre peau tend à se déshydrater et se fragilise. A cause de cette « soif » permanente, vous ressentez de l’inconfort. Vous avez besoin de soins nourrissants pour rééquilibrer votre peau et réveiller votre teint.</p>
		<br><br>
		<h3>Peau Mixte</h3>
		<p class="a">VOTRE PEAU EST MIXTE :</p><p> l’excès de sébum sur la zone « T » (front, nez, menton) favorise un grain de peau irrégulier et des pores visibles et dilatés tandis que les joues présentent une peau normale avec un aspect mat et uniforme. Vous avez besoin de soins capables de stabiliser le niveau de sébum médian tout en préservant l’hydratation de vos joues.</p>
		<br><br>
		<h3>Peau Grasse</h3>
		<p class="a">VOTRE PEAU EST GRASSE : </p><p>son grain est irrégulier, les pores sont dilatés et visibles. C’est une peau à l’aspect luisant, sujette aux imperfections, difficile à vivre au quotidien. Toujours déséquilibrée, elle se déshydrate et s’irrite facilement. Le stress et les agressions extérieurs (pollution, soleil, vent) accentuent la sécrétion de sébum et rendent la peau brillante. Vous avez besoin d’harmoniser la peau tout en respectant son équilibre fragile, grâce à des produits de soin adaptés.</p>
		<br><br>

		<style> 
			.swag h3{
				color: darkseagreen;
				font-family: Times New Roman;
				font-size: 30px;
			}
			
			.swag h1{
				color :darkgreen;
				font-size: 50px;
			}

			body.swag p.a{
				font-weight: bold;
				font-size: 15px;
					}

		</style>

		<footer class="footer">
              <p>Copyright &copy; Elisa Ranjalahy and Navdeep Singh - 2022</p>
        </footer>

</body>
</html>