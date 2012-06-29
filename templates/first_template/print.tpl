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
				<td class="przystanek">Przystanek:<br/>&bull; {$plik_przystanki[$wPrzystanek]|replace:"///":""}</td>
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
      <table style="border-collapse: collapse; width: 100%;" >
			<tr>
        <td>{*call wyswietlOdjazdy_druk*}</td>
        <td class="trasa">Trasa przejazdu</td>
			</tr>
  		<tr>
  			<td class="legenda">{call wyswietlOdjazdy_druk}Objaśnienia:<br>{call pokazLegende}<br>{include '../main/footer.tpl'}</td>
  			<td class="trasa"><ul class="trasa">{call wyswietlPrzystanki_druk1}</ul></td>
  		</tr>
			{*<tr>
				<td style="vertical-align: top; padding-right: 2px;" colspan="2">{call pokazLegende}</td>
			</tr>*}
      </table>

		{/if} {*zakończenie po wyborze kierunku*}
	{/if} {*zakończenie po wyborze linii*}
	
</div>
</body>
</html>