<?php
	require_once('config.php');
	require_once('core.php');
	require_once('core_smarty.php');
	if ($wLinia != NULL)
		if ($wKierunek)
			$ilosc_przystankow = count($plik_przystanki);
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="windows-1250" />
	<title>Rozklad jazdy {$firma}</title>
	<link rel="stylesheet" href="templates/first_template/style_print.css" />
</head>
<body>
<div id="main">

<?php
	for ($i=0;$i<$ilosc_przystankow;$i++)
	{
		$wPrzystanek = $i;
		$smarty->assign('wPrzystanek',$wPrzystanek);
		$smarty->display('templates/first_template/print_calosc.tpl');
	}
?>
</div>
</body>
</html>