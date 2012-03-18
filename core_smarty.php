<?php
	require_once('smarty/SmartyBC.class.php');
	
	$smarty = new SmartyBC();

	$smarty->assign('template_name',$template_name);

	$smarty->assign('firma',$firma);
	$smarty->assign('rok',$rok);
	$smarty->assign('adres',$adres);

	$smarty->assign('wLinia',$wLinia);
	$smarty->assign('wKierunek',$wKierunek);
	$smarty->assign('wPrzystanek',$wPrzystanek);
	$smarty->assign('wLamanie',$wLamanie);
	$smarty->assign('linie',$linie);
	$smarty->assign('ilLinie',count($linie));

	$smarty->assign('typy_dnia',$typy_dni);
	$smarty->assign('typy_dnia_ilosc',$typy_dni_ilosc);
  
	$smarty->configLoad('templates/'.$template_name.'/temp.conf');

	if ($wLinia != NULL)
	{
		$smarty->assign('kierunki',$kierunki);
		if ($wKierunek)
		{
			$plik_przystanki= file($rozklady.'/'.$wLinia.'/przystanki_'.$wKierunek);
			$smarty->assign('plik_przystanki',$plik_przystanki);
			for ($i=0; $i<$typy_dni_ilosc; $i++)
			{
				$plik_dnia[$i] = file($rozklady.'/'.$wLinia.'/'.$wKierunek.'_'.($i+1));
			}
			$smarty->assign('plik_dnia',$plik_dnia);
			if ($wPrzystanek or $wPrzystanek == 0)
			{
				$plik_legenda = file($plik_legenda_sciezka.'_'.$wKierunek);
				$smarty->assign('plik_legenda',$plik_legenda);
			}
		}
	}
?>