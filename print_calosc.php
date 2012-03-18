<?php
	require_once('config.php');
	require_once('core.php');
	require_once('core_smarty.php');
	if ($wLinia != NULL and $wKierunek)
			$ilosc_przystankow = count($plik_przystanki);
			
	$smarty->assign('ilosc_przystankow',$ilosc_przystankow);

	$smarty->display('templates/'.$template_name.'/print_calosc.tpl');
?>