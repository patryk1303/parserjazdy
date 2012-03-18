Parser Jazdy 180312
18.03.2012	Patryk Wychowaniec

Plik "czytaj mnie" internetowej aplikacji wyswietlaj¹cej rozk³ad jazdy formatu plików jazdy.net

1. Cel aplikacji
2. Licencja
3. U¿ytkowanie
4. Informacje dodakowe
5. Kontakt
6. Szablon HTML

--------
1. Cel aplikacji

Aplikacja korzysta z formatu danych rozk³adów jazdy pochodz¹cych z serwisu jazdy.net. 
Z powodu tego, ¿e ww. serwis przestanie nied³ugo istnieæ, postanowi³em stworzyæ aplikacjê PHP, której zadaniem jest zamiana plików tekstowych formatu danych na format HTML.

--------
2. Licencja

Aplikacja oparta jest na licencji BSD. W zwi¹tku z tym, trzeba pamiêtaæ, ¿e:
 - aplikcjê mo¿na stosowaæ w dowolnym celu, nawet komercyjnym
 - kod Ÿrod³owy aplikacji mo¿na dowolnie zmieniæ
 - mo¿na zimeniæ licencjê aplikacji
 - w przypadku u¿ycia kodu aplikacji w innej aplikacji, trzeba uwglêdniæ pierwotnego autora
 
---------
3. U¿ytkowanie

Aplikacja korzysta z formatu danych rozk³adów jazdy jazdy.net
	a) umieszczenie rozk³adów jazdy:
		foldery oraz pliki rozk³adów nale¿y umieœciæ w podfolderze "rozklad"
	b) lista wyœwietlanych wyœwietlanie linii:
		linie s¹ automatycznie wyczytywane po folderach w folderze "rozklad"
	c) iloœæ kierunków:
		skrypt automatycznie znajduje iloœæ kierunków. Niepotrzebna jest modyfikacja plików do obs³ugi wiêkszej iloœci
	d) typy dni:
		oskrypt automatycznie znajduje iloœæ typó dni. Niepotrzebna jest modyfikacja plików do obs³ugi wiêkszej iloœci
	e) legenda:
		w przeciwieñstwie do formatu jazdy.net, tutaj jest podzia³ legendy co do kierunku. W zale¿noœci od numeru kierunku, plik legendy przyjmuje nazwê "legenda_$kierunkek"
	f) szablon:
		nazwa szablonu jest w zmiennej $template_name w pliku config.php
	g) konfiguracja skryptu:
		wszystkie dane do konfiguracji znajduj¹ siê w pliku config.php

----------
4. Informacje dodakowe

Do projektu do³¹czam rozk³ad jazdy dla Koszalina na stan od dnia 16.01.2012

----------
5. Kontakt
	Patryk Wychowaniec
	email: patryk1303@gmail.com
	xpmm:  p98@jid.pl
	gg:    9534554

---------
6. Szablony HTML

	a) first-template
		Szablon jest w³asnej roboty, udostêpniony na licencji CC BY 3.0
		http://creativecommons.org/licenses/by/3.0/

		Wolno:

			kopiowaæ, rozpowszechniaæ, odtwarzaæ i wykonywaæ utwór
			tworzyæ utwory zale¿ne
			u¿ytkowaæ utwór w sposób komercyjny

		Na nastêpuj¹cych warunkach:

			Uznanie autorstwa — Utwór nale¿y oznaczyæ w sposób okreœlony przez Twórcê lub Licencjodawcê 
	b) Spicy
		http://www.templatemo.com/preview/templatemo_314_spicy
