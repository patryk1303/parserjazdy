{function wyswietlPrzystanki}
	<ul>
		{$i = 0}
		{foreach $plik_przystanki as $przystanek}
			<li><a href="?linia={$wLinia}&kierunek={$wKierunek}&przystanek={$i}#rozklad">{$przystanek}</a></li>
			{$i = $i+1}
		{/foreach}
	</ul>
{/function}
{function wyswietlPrzystanki_druk}
	<div id="przystanki">
		{for $i=$wPrzystanek to {$plik_przystanki|@count}-1}
			{if $i==$wPrzystanek}
				<b>>
			{/if}
			<span class="przystanek"><a href="?linia={$wLinia}&kierunek={$wKierunek}&przystanek={$i}#rozklad">{$plik_przystanki[$i]}</a></span>
			{if $i==$wPrzystanek}
				<</b>
			{/if}
			{if $i!={$plik_przystanki|@count}-1}
				&rarr;
			{/if}
		{/for}
	</div>
{/function}