{function wyswietlPrzystanki}
		{$i = 0}
		{foreach $plik_przystanki as $przystanek}
			<li><a href="?linia={$wLinia}&kierunek={$wKierunek}&przystanek={$i}#rozklad">{$przystanek|replace:"///":"&nbsp;&nbsp;&nbsp;"}</a></li>
			{$i = $i+1}
		{/foreach}
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

{function wyswietlPrzystanki_druk1}
  {for $i=$wPrzystanek to {$plik_przystanki|@count}-1}
  	{if $i==$wPrzystanek}
  		<b>
  	{/if}
  	<li><a href="?linia={$wLinia}&kierunek={$wKierunek}&przystanek={$i}#rozklad">{$plik_przystanki[$i]|replace:"///":"&nbsp;&nbsp;&nbsp;"}</a></li>
  	{if $i==$wPrzystanek}
  		</b>
  	{/if}
  {/for}
{/function}