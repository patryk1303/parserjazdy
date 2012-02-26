<?php
  require_once('core.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Rozkład jazdy <?php echo $firma; ?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
    <meta http-equiv="content-language" content="" />
	<meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=yes;" name="viewport" />
    <link href="style-mobile.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
	<a href="mobile.php">
		<img id="logoimg" src="logo.png" alt="<?php echo $firma; ?>" />
		<div style="margin-top: 10px;">
			<?php
				if ($wLinia)
					echo 'Rozkład jazdy linii nr '. $wLinia;
				else 
					echo 'Rozklad jazdy';
			?>
		</div>
	</a>
	<p class="subtitle">Internetowy rozkład jazdy <?php echo $firma; ?></p>
	<?php 
		pokazLinie($linie,1,$wLamanie);
	?>
	<br>
	<?php
		wybranaLinia();
	?>
	<br>
	<?php
		if ($wLinia != NULL)
		{
			wyswietlKierunki($wLinia, $kierunki, "");
			if ($wKierunek)
			{
				wyswietlOdjazdy($plik_przystanki, $plik_dnia, $wKierunek, $typy_dni, $kierunki, $typy_dni_ilosc, 1, 2);
				pokazLegende($plik_legenda_sciezka, $wKierunek);
				echo '<h2>Przystanki</h2>';
				echo '<div id="przystanki">';
				wyswietlPrzystanki($wLinia, $wKierunek, $plik_przystanki, 3);	
				echo '</div>';
				echo '<br><br><a href="print.php?linia='.$wLinia.'&kierunek='.$wKierunek.'&przystanek='.$wPrzystanek.'">Drukuj</a>';
			} //zakończenie po wyborze kierunku
		} //zakończenie po wyborze linii
	?>
		<br>
		<?php footer(); ?>			
</div>
</body>
</html>