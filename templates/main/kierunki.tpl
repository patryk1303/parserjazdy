{function name=wyswietlKierunki}
	<div class="kierunki">
		Kierunki:
		{$i = 1}
		{foreach $kierunki as $kierunek}
			<a href="?linia={$wLinia}&kierunek={$i}#rozklad">{$kierunek}</a>&nbsp;
			{$i=$i+1}
		{/foreach}
{/function}