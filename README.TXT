Parser Jazdy 180312
18.03.2012	Patryk Wychowaniec

Plik "czytaj mnie" internetowej aplikacji wyswietlaj�cej rozk�ad jazdy formatu plik�w jazdy.net

1. Cel aplikacji
2. Licencja
3. U�ytkowanie
4. Informacje dodakowe
5. Kontakt
6. Szablon HTML

--------
1. Cel aplikacji

Aplikacja korzysta z formatu danych rozk�ad�w jazdy pochodz�cych z serwisu jazdy.net. 
Z powodu tego, �e ww. serwis przestanie nied�ugo istnie�, postanowi�em stworzy� aplikacj� PHP, kt�rej zadaniem jest zamiana plik�w tekstowych formatu danych na format HTML.

--------
2. Licencja

Aplikacja oparta jest na licencji BSD. W zwi�tku z tym, trzeba pami�ta�, �e:
 - aplikcj� mo�na stosowa� w dowolnym celu, nawet komercyjnym
 - kod �rod�owy aplikacji mo�na dowolnie zmieni�
 - mo�na zimeni� licencj� aplikacji
 - w przypadku u�ycia kodu aplikacji w innej aplikacji, trzeba uwgl�dni� pierwotnego autora
 
---------
3. U�ytkowanie

Aplikacja korzysta z formatu danych rozk�ad�w jazdy jazdy.net
	a) umieszczenie rozk�ad�w jazdy:
		foldery oraz pliki rozk�ad�w nale�y umie�ci� w podfolderze "rozklad"
	b) lista wy�wietlanych wy�wietlanie linii:
		linie s� automatycznie wyczytywane po folderach w folderze "rozklad"
	c) ilo�� kierunk�w:
		skrypt automatycznie znajduje ilo�� kierunk�w. Niepotrzebna jest modyfikacja plik�w do obs�ugi wi�kszej ilo�ci
	d) typy dni:
		oskrypt automatycznie znajduje ilo�� typ� dni. Niepotrzebna jest modyfikacja plik�w do obs�ugi wi�kszej ilo�ci
	e) legenda:
		w przeciwie�stwie do formatu jazdy.net, tutaj jest podzia� legendy co do kierunku. W zale�no�ci od numeru kierunku, plik legendy przyjmuje nazw� "legenda_$kierunkek"
	f) szablon:
		nazwa szablonu jest w zmiennej $template_name w pliku config.php
	g) konfiguracja skryptu:
		wszystkie dane do konfiguracji znajduj� si� w pliku config.php

----------
4. Informacje dodakowe

Do projektu do��czam rozk�ad jazdy dla Koszalina na stan od dnia 16.01.2012

----------
5. Kontakt
	Patryk Wychowaniec
	email: patryk1303@gmail.com
	xpmm:  p98@jid.pl
	gg:    9534554

---------
6. Szablony HTML

	a) first-template
		Szablon jest w�asnej roboty, udost�pniony na licencji CC BY 3.0
		http://creativecommons.org/licenses/by/3.0/

		Wolno:

			kopiowa�, rozpowszechnia�, odtwarza� i wykonywa� utw�r
			tworzy� utwory zale�ne
			u�ytkowa� utw�r w spos�b komercyjny

		Na nast�puj�cych warunkach:

			Uznanie autorstwa � Utw�r nale�y oznaczy� w spos�b okre�lony przez Tw�rc� lub Licencjodawc� 
	b) Spicy
		http://www.templatemo.com/preview/templatemo_314_spicy
