        <script type="text/javascript" src="./JS/Menu_tendina.js"></script>

{*<div id="menudefault">
    <ul id="menu">
        <li class="first" id="logout"><a href="#" onclick="ajaxcontrtask('registrazione', 'modificautentetpl');">Modifica Profilo</a></li>
        <li class="first" id="logout"><a href="#" onclick="ajaxcontrtask('registrazione', 'modificacartatpl');">Modifica Carta</a></li>
        <li class="first" id="elencofilm"><a href="#" onclick="ajaxcontrtask('gestione', 'mostratitoli');">Elenco Film</a></li>
        <li class="first" id="elencofilm"><a href="#" onclick="ajaxcontrtask('acquisto', 'elencoacquisti');">Acquisto</a></li>
<li class="first"><a href="#" onclick="ajaxcontrtask('acquisto', 'visualizzatariffe');">Tariffe</a></li>
        <li class="first" id="account"><a href="#" onclick="disattivaaccount();">Disattiva Account</a></li>
        <li class="first" id="logout"><a href="#" onclick="ajaxmenucontrtask('autenticazione', 'logout');">Logout</a></li>

    </ul>
</div>*}



<div id="finestra4" class='wind' title="ATTENZIONE!">
        <p>Vuoi davvero eliminare definitivamente il tuo account? Dopo l'eliminazione non sar&agrave; pi&ugrave; possibile recuperare l'account in alcun modo!</p>
</div>

<nav id="menu-wrap">    
	<ul id="menu" class="egmenu">
		
		<li>
			<a>Film</a>
			<ul>
        <li><a href="#" onclick="ajaxcontrtask('gestione', 'mostratitoli');">Elenco Film</a></li>
        <li><a href="#" onclick="ajaxcontrtask('acquisto', 'elencoacquisti');">Acquisto</a></li>
        <li><a href="#" onclick="ajaxcontrtask('acquisto', 'visualizzatariffe');">Tariffe</a></li>

                                <li>
								
				</li>
								
			</ul>
		</li>
                <li>
			<a>Impostazioni Account</a>
			<ul>
        <li><a href="#" onclick="ajaxcontrtask('registrazione', 'modificautentetpl');">Profilo</a></li>
        <li><a href="#" onclick="ajaxcontrtask('registrazione', 'modificacartatpl');">Carta di Credito</a></li>
        <li><a href="#" onclick="disattivaaccount();">Disattiva Account</a></li>

                                <li>
								
				</li>
								
			</ul>
		</li>
                
        <li><a href="#" onclick="ajaxmenucontrtask('autenticazione', 'logout');">Logout</a></li>

      <a id="user2">BENTORNATO, {$nome}</a>

	</ul>
</nav>