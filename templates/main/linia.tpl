{function pokazObecnaLinie}
  <a href="index.php">
  	{if $wLinia}
  		Rozk³ad jazdy linii {$wLinia}
  	{else}
  		Rozk³ad jazdy
  	{/if}
  </a>
{/function}
{function pokazObecnaLinie_mobile}
  <a href="mobile.php">
  	{if $wLinia}
  		Rozk³ad jazdy linii {$wLinia}
  	{else}
  		Rozk³ad jazdy
  	{/if}
  </a>
{/function}


{function wybranaLinia}
  {if $wLinia}
  	Wybrana linia: {$wLinia}
  {else}
  	Proszê wybraæ liniê
  {/if}
{/function}