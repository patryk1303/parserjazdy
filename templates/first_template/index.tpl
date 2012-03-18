{* początek szablonu *}
{include '../main/kierunki.tpl'}
{include '../main/legenda.tpl'}
{include '../main/przystanki.tpl'}
{include '../main/odjazdy.tpl'}
{include '../main/linia.tpl'}
{include '../main/linie.tpl'}
{include '../main/druk.tpl'}
<!doctype html>
<html lang="pl">
<head>
	<meta charset="windows-1250" />
	<title>Rozklad jazdy {$firma}</title>
	<link rel="stylesheet" href="templates/{#templateName#}/style.css" />
	<link rel="stylesheet" href="templates/{#templateName#}/nav_bar.css" />
</head>
<body>
<div id="main">
	<header id="header">
		<h1>
			{call pokazObecnaLinie}
		</h1>
		<h2>Internetowy rozkład jazdy {$firma}</h2>
	</header>
	
	<nav id="navigation_bar">
		{* pokazanie linii *}
		<ul>
		{call pokazLinie}
		</ul>
	</nav>
	
	<section id="main_section">
		<h2>
			{* pokaże wybraną linię *}
			{call wybranaLinia}
		</h2>
		{if $wLinia}
				{call wyswietlKierunki} <br><br>
				{if $wKierunek}
				
					{call wyswietlOdjazdy}
					{call pokazLegende}
					{call pokazDruk}
          			
				{/if} {*zakończenie po wyborze kierunku*}
		{/if} {*zakończenie po wyborze linii*}
	</section>
	
	
	{if $wLinia and $wKierunek}
		<aside id="sidebar">
			<h2>Przystanki</h2>
				<ul>
					{call wyswietlPrzystanki}
				</ul>
		</aside>
	{/if}
	
	
	<footer id="footer">
		{include '../main/footer.tpl'}
	</footer>
	
</div>
</body>
</html>