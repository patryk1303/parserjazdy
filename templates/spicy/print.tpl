{* początek szablonu *}
{include '../main/kierunki.tpl'}
{include '../main/legenda.tpl'}
{include '../main/przystanki.tpl'}
{include '../main/odjazdy.tpl'}
{include '../main/linia.tpl'}

<!doctype html>
<html lang="pl">
<head>
	<meta charset="windows-1250" />
	<title>Rozklad jazdy {$firma}</title>
	<link rel="stylesheet" href="templates/{#templateName#}/style_print.css" />
</head>
<body>
<div id="main">
	<table class="informacje" border="0" cellpadding="2" cellspacing="2">
		<tbody>
			<tr>
				<td class="linia" colspan="1" rowspan="2">{$wLinia}</td>
				<td class="przystanek">Przystanek:<br/>&bull; {$plik_przystanki[$wPrzystanek]}</td>
				<td class="logoimg" colspan="1" rowspan="2"><img id="logoimg" src="logo.png" alt="MZK" /></td>
			</tr>
			<tr>
				<td class="przystanek">Kierunek:<br/>» {$kierunki[$wKierunek-1]}</td>
			</tr>
		</tbody>
	</table>	
	<br>
	{if $wLinia}
		{if $wKierunek}

			{call wyswietlOdjazdy_druk}
			
			<table style="border-collapse: collapse;" width="95%">
				<tr>
					<td class="legenda">Legenda</td>
					<td class="trasa">Trasa przejazdu</td>
				</tr>
				<tr>
					<td style="vertical-align: top; border-right: 1px solid black; padding-right: 2px;">{call pokazLegende}</td>
					<td style="vertical-align: top; padding: 0 2px;">{call wyswietlPrzystanki_druk}</td>
				</tr>
			</table>

		{/if} {*zakończenie po wyborze kierunku*}
	{/if} {*zakończenie po wyborze linii*}
	
	
	<footer id="footer">
		{include '../main/footer.tpl'}
	</footer>
	
</div>
</body>
</html>