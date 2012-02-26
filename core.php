<?php
	$firma = "MZK Koszalin";	//nazwa firmy	
	$adres = "http://mzk.koszalin.pl";
	$rok = "1997 - 2012";
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
	
	function pokazLinie($linie,$mobile=false,$lamanie=4) //pokazuje linie w formie listy
	{
		if (!$mobile)
		{
			echo '<ul>';
			foreach ($linie as &$linia)
			{
				echo '<li><a href="?linia='.$linia.'">'.$linia.'</a></li>';
			}
			echo '</ul>';
		}
		else
		{
			$i = 1;
			echo '<table class="linie">';
				echo '<tr>';
					foreach($linie as &$linia)
					{
							echo '<td><a href="?linia='.$linia.'">'.$linia.'</a></td>';
							if ($i%$lamanie!=0 && $i!=count($linie))
								echo '';
							else
								echo '<tr>';
							$i++;
					}
				echo '</tr>';
			echo '</table>';
		}
	}
	
	function wybranaLinia() //pokazuje nr wybranej linii, jeœli linia niewybrana - pokazuje napis dot. wyboru linii
	{
		global $wLinia;
		if ($wLinia)
			echo "Wybrana linia: <span class=\"linia\">".$wLinia."</span>";
		else
			{
				echo "Proszê wybraæ liniê";
			}
	}

	function wyswietlKierunki($wybrana_linia, $kierunki, $separator = '&nbsp;| ') //pokazuje kierunki
	{
		echo '<div class="kierunki">';
			echo 'Kierunki: ';
			for ($i=0;$i<count($kierunki);$i++)
			{
				echo '<a href="?linia='.$wybrana_linia.'&kierunek='.($i+1).'#rozklad">'.$kierunki[$i].'</a>';
				if ($i!=count($kierunki)-1)
					echo $separator;
			}
			
		echo '</div>';
		echo '<br>';
    
	}
	
	function wyswietlPrzystanki($wybrana_linia, $wybrany_kierunek, $plik_przystanki, $styl=1) //wyœwietla przystanki wybranego kierunku
	{
		global $wPrzystanek;
		if ($styl == 1)	// wersja normalna
		{
			echo '<ul>';
			for ($i=0; $i<count($plik_przystanki); $i++)
				echo '<li><a href="?linia='.$wybrana_linia.'&kierunek='.$wybrany_kierunek.'&przystanek='.$i.'#rozklad">'.$plik_przystanki[$i].'</a></li>';
			echo '</ul>';
		}
		elseif ($styl == 2)	// wersja do druku
		{
			echo '<div id="przystanki">';
			for ($i=$wPrzystanek; $i<count($plik_przystanki); $i++)
			{
				if ($i==$wPrzystanek)
					echo '<b>> ';
				echo '<span class="przystanek"><a href="?linia='.$wybrana_linia.'&kierunek='.$wybrany_kierunek.'&przystanek='.$i.'#rozklad">'.$plik_przystanki[$i].'</a></span>';
				if ($i==$wPrzystanek)
					echo ' <</b>';
				if ($i!=count($plik_przystanki)-1)
					echo ' - ';
			}
			echo '</div>';
		}
		elseif ($styl == 3)	// wersja mobilna
		{
			for ($i=0; $i<count($plik_przystanki); $i++)
			{
				echo '<span class="przystanek"><a href="?linia='.$wybrana_linia.'&kierunek='.$wybrany_kierunek.'&przystanek='.$i.'#rozklad">'.$plik_przystanki[$i].'</a></span>';
				/*if ($i != count($plik_przystanki)-1)
					echo '<br>';*/
			}
		}
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
	
	function pokazLegende($plik_legenda_sciezka, $kierunek, $separator = "<br>", $napis=1)
	{
		global $wPrzystanek;
		if ($wPrzystanek or $wPrzystanek == 0)
		{
			$plik_legenda = file($plik_legenda_sciezka.'_'.$kierunek);
			echo '<div class="legenda">';
			if ($napis)
				echo '<span class="odjazdyHeader">Legenda:</span><br>';
				for ($i=0; $i<count($plik_legenda); $i++)
				{
					echo $plik_legenda[$i];
					if ($i<count($plik_legenda)-1)
						echo $separator;
				}
			echo '</div>';
		}
	}
  
  function footer()
  {
    global $firma;
    global $adres;
	global $rok;
    
    echo "&copy; $firma $rok<br>";
		echo "Dane rozk³adów pochoz¹ ze strony <a href=\"$adres\">$firma</a>";
    
  }
?>
