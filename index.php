<?php
  require_once('core.php');
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="windows-1250" />
	<title>Rozklad jazdy <?php echo $firma; ?></title>
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="nav_bar.css" />
</head>
<body>
<div id="main">
	<header id="header">
		<h1>
			<a href="index.php">
				<?php
				if ($wLinia)
					echo 'Rozkład jazdy linii nr '. $wLinia;
				else 
					echo 'Rozklad jazdy';
				?>
			</a>
		</h1>
		<h2>Internetowy rozklad jazdy <?php echo $firma; ?></h2>
	</header>
	
	<nav id="navigation_bar">
		<?php pokazLinie($linie); ?>
	</nav>
	
	<section id="main_section">
		<h2><?php wybranaLinia(); ?></h2>
		<?php
			if ($wLinia != NULL)
			{
				wyswietlKierunki($wLinia, $kierunki);
				//wybór dni
				if ($wKierunek)
				{
					wyswietlOdjazdy($plik_przystanki, $plik_dnia, $wKierunek, $typy_dni, $kierunki, $typy_dni_ilosc);
					pokazLegende($plik_legenda_sciezka, $wKierunek);
					echo '<br><br><a href="print.php?linia='.$wLinia.'&kierunek='.$wKierunek.'&przystanek='.$wPrzystanek.'">Drukuj</a>';
					echo ' | <a href="print_calosc.php?linia='.$wLinia.'&kierunek='.$wKierunek.'">Drukuj cały kierunek</a>';
				} //zakończenie po wyborze kierunku
			} //zakończenie po wyborze linii
		?>
	</section>
	
	
		<?php
			if ($wLinia != NULL and $wKierunek) {
		?>
	<aside id="sidebar">
		<h2>Przystanki</h2>
		<?php
			wyswietlPrzystanki($wLinia, $wKierunek, $plik_przystanki);	
		?>
	</aside>
	<?php } ?>
	
	
	<footer id="footer">
		<?php footer(); ?>
		<?php
			if ($wLinia and $wKierunek and ($wPrzystanek or $wPrzystanek==0))
				echo '<a href="print.php?linia='.$wLinia.'&kierunek='.$wKierunek.'&przystanek='.$wPrzystanek.'">Drukuj</a>';			
		?>
	</footer>
	
</div>
</body>
</html>