{function pokazObecnaLinie}
  <a href="index.php">
  	{if $wLinia}
  		Rozk�ad jazdy linii {$wLinia}
  	{else}
  		Rozk�ad jazdy
  	{/if}
  </a>
{/function}
{function pokazObecnaLinie_mobile}
  <a href="mobile.php">
  	{if $wLinia}
  		Rozk�ad jazdy linii {$wLinia}
  	{else}
  		Rozk�ad jazdy
  	{/if}
  </a>
{/function}


{function wybranaLinia}
  {if $wLinia}
  	Wybrana linia: {$wLinia}
  {else}
  	Prosz� wybra� lini�
  {/if}
{/function}