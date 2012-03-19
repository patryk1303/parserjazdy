{function wyswietlOdjazdy}
	{php}
		global $plik_przystanki, $plik_dnia, $wKierunek, $typy_dni, $kierunki, $typy_dni_ilosc;
		wyswietlOdjazdy($plik_przystanki, $plik_dnia, $wKierunek, $typy_dni, $kierunki, $typy_dni_ilosc);
	{/php}
{/function}
{function wyswietlOdjazdy_druk}
	{php}
		global $plik_przystanki, $plik_dnia, $wKierunek, $typy_dni, $kierunki, $typy_dni_ilosc, $wPrzystanek;
		wyswietlOdjazdy($plik_przystanki, $plik_dnia, $wKierunek, $typy_dni, $kierunki, $typy_dni_ilosc,0,1);
	{/php}
{/function}
{function wyswietlOdjazdy_mobile}
	{php}
		global $plik_przystanki, $plik_dnia, $wKierunek, $typy_dni, $kierunki, $typy_dni_ilosc;
		wyswietlOdjazdy($plik_przystanki, $plik_dnia, $wKierunek, $typy_dni, $kierunki, $typy_dni_ilosc,1,2);
	{/php}
{/function}
