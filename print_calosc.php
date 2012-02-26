<?php
	require_once('core.php');
	if ($wLinia != NULL)
		if ($wKierunek)
			$ilosc_przystankow = count($plik_przystanki);
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
    <link href="style_print.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
for ($i=0;$i<$ilosc_przystankow;$i++)
{
$wPrzystanek = $i;
?>
	<table class="informacje" border="0" cellpadding="2" cellspacing="2">
			<tbody>
				<tr>
					<td class="linia" colspan="1" rowspan="2"><?php echo $wLinia ?></td>
					<td class="przystanek">Przystanek:<br/>&bull; <?php echo $plik_przystanki[$i] ?></td>
					<td class="logoimg" colspan="1" rowspan="2"><img id="logoimg" src="logo.png" alt="MZK" /></td>
				</tr>
				<tr>
					<td class="przystanek">Kierunek:<br/>» <?php echo $kierunki[$wKierunek-1] ?></td>
				</tr>
			</tbody>
		</table>	
	
	<br><br>
		<?php
			wyswietlOdjazdy($plik_przystanki, $plik_dnia, $wKierunek, $typy_dni, $kierunki, $typy_dni_ilosc, 0, 1);
		?>
	<table style="border-collapse: collapse;" width="95%">
		<tr>
			<td class="legenda">Legenda</td>
			<td class="trasa">Trasa przejazdu</td>
		</tr>
		<tr>
			<td style="vertical-align: top; border-right: 1px solid black; padding-right: 2px;"><?php pokazLegende($plik_legenda_sciezka, $wKierunek, "<br>", 0); ?></td>
			<td style="vertical-align: top; padding: 0 2px;"><?php wyswietlPrzystanki($wLinia, $wKierunek, $plik_przystanki, 2);?></td>
		</tr>
	</table>

	<div id="footer">
		<?php footer(); ?>
	</div>
	
	<?php
	if ($i!=$ilosc_przystankow-1)
	{
	?>
		<hr style="border: none; margin-top: 10px 0; page-break-before: always">
	<?php
	}
	?>
<?php
}
?>
</body>
</html>
