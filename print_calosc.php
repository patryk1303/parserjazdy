<?php
	require_once('config.php');
	require_once('core.php');
	require_once('core_smarty.php');
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="windows-1250" />
	<title>Rozklad jazdy <?php echo $firma; ?></title>
	<link rel="stylesheet" href="templates/<?php echo $template_name; ?>/style_print.css" />
</head>
<body>
<div id="main">
<?
	for ($i=0; $i<count($plik_przystanki); $i++)
	{
		$wPrzystanek = $i;
		$smarty->assign('wPrzystanek',$wPrzystanek);
		$smarty->display('templates/'.$template_name.'/print_calosc.tpl');
	}
?>
</div>
</body>
</html>