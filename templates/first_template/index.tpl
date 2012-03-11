{* początek szablonu *}
{include 'first_template/kierunki.tpl'}
{include 'first_template/legenda.tpl'}
{include 'first_template/przystanki.tpl'}
{include 'first_template/odjazdy.tpl'}
<!doctype html>
<html lang="pl">
<head>
	<meta charset="windows-1250" />
	<title>Rozklad jazdy {$firma}</title>
	<link rel="stylesheet" href="templates/first_template/style.css" />
	<link rel="stylesheet" href="templates/first_template/nav_bar.css" />
</head>
<body>
<div id="main">
	<header id="header">
		<h1>
			<a href="index.php">
				{if $wLinia}
					Rozkład jazdy linii {$wLinia}
				{else}
					Rozkład jazdy
				{/if}
			</a>
		</h1>
		<h2>Internetowy rozkład jazdy {$firma}</h2>
	</header>
	
	<nav id="navigation_bar">
		{* pokazanie linii *}
		<ul>
		{foreach $linie as $linia}
			<li><a href="?linia={$linia}">{$linia}</a></li>
		{/foreach}
		</ul>
	</nav>
	
	<section id="main_section">
		<h2>
			{* pokaże wybraną linię *}
			{if $wLinia}
				Wybrana linia: {$wLinia}
			{else}
				Proszę wybrać linię
			{/if}
		</h2>
		{if $wLinia}
				{call wyswietlKierunki}
				{if $wKierunek}
				
					{call wyswietlOdjazdy}
					{call pokazLegende}
					
					<br><br><a href="print.php?linia={$wLinia}&kierunek={$wKierunek}&przystanek={$wPrzystanek}">Drukuj</a> |
					<a href="print_calosc.php?linia={$wLinia}&kierunek={$wKierunek}">Drukuj cały kierunek</a>				
				{/if} {*zakończenie po wyborze kierunku*}
		{/if} {*zakończenie po wyborze linii*}
	</section>
	
	
	{if $wLinia and $wKierunek}
		<aside id="sidebar">
			<h2>Przystanki</h2>
				{call wyswietlPrzystanki}
		</aside>
	{/if}
	
	
	<footer id="footer">
		{include 'first_template/footer.tpl'}
	</footer>
	
</div>
</body>
</html>