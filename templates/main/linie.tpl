{function pokazLinie}
  {foreach $linie as $linia}
  	<li><a href="?linia={$linia}">{$linia}</a></li>
  {/foreach}
{/function}
{function pokazLinie_mobile}
	{$i=1}
	<table class="linie">
		<tr>
			{foreach $linie as $linia}
				<td><a href="?linia={$linia}">{$linia}</a></td>
				{if $i % $wLamanie != 0 && $i!=ilLinie}
					
				{else}
					<tr>
				{/if}
				{$i=$i+1}
			{/foreach}
		</tr>
	</table>
{/function}