{include '../main/kierunki.tpl'}
{include '../main/legenda.tpl'}
{include '../main/przystanki.tpl'}
{include '../main/odjazdy.tpl'}
{include '../main/linia.tpl'}
{include '../main/linie.tpl'}
{include '../main/druk.tpl'}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<title>Rozklad jazdy {$firma}</title>
<link href="templates/{#templateName#}/templatemo_style.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="templamteo_body_wrapper">
<div id="templatemo_wrapper">
	<div id="templatemo_main_top"></div>
    <div id="templatemo_main">
    
    	<div id="templatemo_sidebar">
            <div id="site_title">
				<h1>
					{call pokazObecnaLinie}
					<span>Internetowy rozkład jazdy {$firma}</span>
				</h1>
			</div>
            
            {if $wLinia and $wKierunek}
				<div id="templatemo_menu">
					<h3>Przystanki</h3>
					<ul>
						{call wyswietlPrzystanki}
					</ul>    	
				</div>
			{/if}
			
            <div class="cleaner"></div>
        </div> <!-- end of sidebar -->
        
        <div id="templatemo_content">
			<div class="content_box">
				<h2>Linie</h2>
				<ul class="linie">
					{call pokazLinie}
				</ul>
			</div>
            <div class="content_box">
            	<h2>{call wybranaLinia}</h2>
				{if $wLinia}
					{call wyswietlKierunki} <br><br>
					{if $wKierunek}
					
						{call wyswietlOdjazdy}
						{call pokazLegende}
						{call pokazDruk}
						
					{/if} {*zakończenie po wyborze kierunku*}
				{/if} {*zakończenie po wyborze linii*}
            </div>
        
        </div> <!-- end of content -->
    	<div class="cleaner"></div>
    </div> <!-- end of main -->
    <div id="templatemo_footer">
       {include '../main/footer.tpl'} 
    </div> <!-- end of templatemo_footer -->
</div> <!-- end of wrapper -->
</div>
</body>
</html>