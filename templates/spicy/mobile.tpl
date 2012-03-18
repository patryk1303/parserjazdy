{* początek szablonu *}
{include '../main/kierunki.tpl'}
{include '../main/legenda.tpl'}
{include '../main/przystanki.tpl'}
{include '../main/odjazdy.tpl'}
{include '../main/linia.tpl'}
{include '../main/linie.tpl'}
{include '../main/druk.tpl'}
<!doctype html>
<head>
    <title>Rozklad jazdy {$firma}</title>
    <meta charset="windows-1250" />
	  <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=yes;" name="viewport" />
    <link rel="stylesheet" href="templates/{#templateName#}/style-mobile.css" />
</head>
<body>
<div id="main">
	<a href="mobile.php">
		<img id="logoimg" src="logo.png" alt="{$firma}" />
	</a>
		<div style="margin-top: 10px;">
			{call pokazObecnaLinie_mobile}
		</div>
	<p class="subtitle">Internetowy rozkład jazdy {$firma}</p>
	{call pokazLinie_mobile}
	<br>
	{call wybranaLinia}
	<br>
	{if $wLinia}
		{call wyswietlKierunki} <br><br>
		{if $wKierunek}
			{call wyswietlOdjazdy_mobile}
			{call pokazLegende}
			{call pokazDruk}
		{/if}
	{/if}
	<br>
	{include '../main/footer.tpl'}	
</div>
</body>
</html>