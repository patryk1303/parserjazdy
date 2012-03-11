{* pocz¹tek szablonu *}
{include 'first_template/kierunki.tpl'}
{include 'first_template/legenda.tpl'}
{include 'first_template/przystanki.tpl'}
{include 'first_template/odjazdy.tpl'}

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

	{/if} {*zakoñczenie po wyborze kierunku*}
{/if} {*zakoñczenie po wyborze linii*}


<footer id="footer">
	{include 'first_template/footer.tpl'}
</footer>

<hr style="border: none; margin-top: 10px 0; page-break-before: always">