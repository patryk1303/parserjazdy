<?php
	$sciezka = dirname(__FILE__); //œcie¿ka g³ówna do plików
	$rozklady = $sciezka.'/rozklad'; //œcie¿ka do foledu rozk³adów
	$rozklady_folder = '/rozklad'; //otwiera folder rozk³adów, nieu¿ywane
	$linie = getLinie($rozklady);
  
	if (!isset($_GET['linia']))      $_GET['linia']      = 0 ; //jeœli linia niewybrana - zmieñ wartoœæ na 0 (false)
	if (!isset($_GET['kierunek']))   $_GET['kierunek']   = 0 ; //jeœli kierunek niewybrany - zmieñ wartoœæ na 0 (false)
	if (!isset($_GET['przystanek'])) $_GET['przystanek'] = 0 ; //jeœli przystanek niewybrany - zmieñ wartoœæ na 0 (false)
	if (!isset($_GET['lamanie']))    $_GET['lamanie']    = 5; //jeœli ³amanie niezdefiniowane - zmieñ wartoœæ na 1
	
	$wLinia      = $_GET['linia'];
	$wKierunek   = $_GET['kierunek'];
	$wPrzystanek = $_GET['przystanek'];
	$wLamanie    = $_GET['lamanie'];
	
	$typy_dni_plik = $rozklady.'/typy_dni'; //otwiera plik typów dni - bêdzie to pokazane przy odjazdach
	$typy_dni = file($typy_dni_plik); // [0] - powszednie [1] - soboty [2] - niedziele
	$typy_dni_ilosc = count($typy_dni);
	
	if ($wLinia != NULL)
	{
		$kierunki = file($rozklady.'/'.$wLinia.'/kierunki');
		if ($wKierunek)
		{
			for ($i=0; $i<$typy_dni_ilosc; $i++)
			{
				$plik_dnia[$i] = file($rozklady.'/'.$wLinia.'/'.$wKierunek.'_'.($i+1));
			}
			$plik_przystanki= file($rozklady.'/'.$wLinia.'/przystanki_'.$wKierunek);
			$plik_legenda_sciezka = $rozklady.'/'.$wLinia.'/legenda';
		} //zakoñczenie po wyborze kierunku
	} //zakoñczenie po wyborze linii
	
	// deklaracja funkcji

	function getLinie($rozklady)
	{
		$linie = array();
		foreach (glob($rozklady.'/*',GLOB_ONLYDIR) as $folder)
		{
			$folder = explode('\\',$folder);
			$folder = explode('/',$folder[count($folder)-1]);
			$linie[] = $folder[count($folder)-1];
		}
		sort($linie,SORT_NUMERIC);
		return $linie;
	}
	
	function wyswietlOdjazdy($plik_przystanki, $plik_dnia, $kierunek, $typy_dni, $kierunek_plik, $typy_dni_ilosc, $wyswietlKierunekPrzystanek=1, $styl=1) //pokazuje odjazdy wybranego przystanku
	{
		global $wPrzystanek;
		if ($wPrzystanek or $wPrzystanek == 0)
		{
			echo '<a name="rozklad"></a>';
			
			if ($wyswietlKierunekPrzystanek==1)
			{
				echo '<span class="odjazdyHeader">Kierunek: <em>'.$kierunek_plik[$kierunek-1].'</em></span><br>';
				echo '<span class="odjazdyHeader">Przystanek: <em>'.$plik_przystanki[$wPrzystanek].'</em></span><br><br>';
			}
						
			for ($i=0; $i<$typy_dni_ilosc; $i++)
			{
				$odjazdy[$i] = preg_split("/ /",$plik_dnia[$i][$wPrzystanek]); //przekazuje osobne godziny odjazdów do macierzy
			}
			
			//ma byæ tak: $odjazdy[typ_dnia][godzina][minuta]
			for ($i=0; $i<$typy_dni_ilosc; $i++)
			{
				for ($j=0;$j<count($odjazdy[$i]);$j++)
					$odjazdy[$i][$j] = explode(":",$odjazdy[$i][$j]);
			}
			
			if ($styl==1)  // wersja normalna
			{
				for ($i=0; $i<$typy_dni_ilosc; $i++)
				{
					$godziny = array();
					
					for ($godzina=0;$godzina<24;$godzina++)
					{
						$minuty = array();	//przygotowanie minut
						for($j=0;$j<count($odjazdy[$i]);$j++)
						{
							if($odjazdy[$i][$j][0] == strval($godzina))
								$minuty[] = $odjazdy[$i][$j][1];
						}
						for($j=0;$j<count($minuty);$j++)
						{
							if(strlen($minuty[$j])!=0)
								$godziny[] = $godzina;
						}
					}
					$godziny = array_unique($godziny);
					if (count($godziny)!=0) echo '<table border="0" class="odjazdy">'; //start tabeli z odjazdami
						if (count($godziny)!=0) echo '<tr><th colspan="'.count($godziny).'"><span class="odjazdyHeader">'.$typy_dni[$i].':</span></th></tr>';	//wyœwietlenie typu dnia
					echo '<tr>';
					if (count($godziny)!=0)
						foreach($godziny as $godz)
							echo '<th width="'.(100/count($godziny)).'%">'.$godz.'</th>';
					echo '</tr>';
					echo '<tr>';
						if (count($godziny)!=0)
							foreach($godziny as $godz)
							{
								echo '<td width="'.(100/count($godziny)).'%">';
								$minuty = array();	//przygotowanie minut - reset macierzy
								for($j=0;$j<count($odjazdy[$i]);$j++)
								{
									if($odjazdy[$i][$j][0] == strval($godz))
										$minuty[] = $odjazdy[$i][$j][1];
									//ma byæ tak: $odjazdy[typ_dnia][godzina][minuta]
								}
								for($j=0;$j<count($minuty);$j++)
									echo $minuty[$j]."<br>";
									echo '</td>';
							}
					echo '</tr>';
					echo '</table>'; //koniec tabeli z odjazdami
				}
				//echo '</table>'; //koniec tabeli z odjazdami
			}
			elseif ($styl==2) // wersja mobilna
			{
				for ($i=0;$i<$typy_dni_ilosc;$i++)
				{
					$godziny = array();
					for ($godzina=0;$godzina<24;$godzina++) //przygotuj minuty 
					{
						$minuty = array();	//przygotowanie minut
						for($j=0;$j<count($odjazdy[$i]);$j++)
						{
							if($odjazdy[$i][$j][0] == strval($godzina))
							$minuty[] = $odjazdy[$i][$j][1];
						}
						for($j=0;$j<count($minuty);$j++)
						{
							if(strlen($minuty[$j])!=0)
							$godziny[] = $godzina;
						}
					}
					if (count($godziny)!=0)
					{
						echo '<table border="0" class="odjazdy">'; //start tabeli z odjazdami
							echo '<tr>'; //g³ówek typów dnia
								echo '<th colspan="2">'.$typy_dni[$i].'</th>';
							echo '</tr>';
							
								$godziny = array_unique($godziny);
								foreach($godziny as $godz)
								{
									echo '<tr>';
										echo '<td class="godzina">'.$godz.'</td>';
										$minuty = array();	//przygotowanie minut - reset macierzy
										for($j=0;$j<count($odjazdy[$i]);$j++)
										{
											if($odjazdy[$i][$j][0] == strval($godz))
												$minuty[] = $odjazdy[$i][$j][1];
											//ma byæ tak: $odjazdy[typ_dnia][godzina][minuta]
										}
										echo '<td>';
											for($j=0;$j<count($minuty);$j++)
												echo $minuty[$j].' ';
										echo '</td>';
									echo '</tr>';
								}
							
						echo '</table>';	//koniec tabeli z odjazdami
					}
				}
			}
		}
		else
			echo '';
	}
?>
