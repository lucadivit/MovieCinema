<script type="text/javascript" src="./JS/Menu_tendina.js"></script>



{*<div id="menudefault">
<ul id="menu">
<li class="first" id="formfilm"><a href="#" onclick="ajaxcontrtask('autenticazione', 'tplhomeadmin');">Ricerca</a></li>
<li class="first" id="formfilm"><a href="#" onclick="ajaxcontrtask('registrazione', 'filmtpl');">Inserisci Film</a></li>
<li class="first" id="tarif"><a href="#" onclick="ajaxcontrtask('registrazione', 'tariffetpl');">Modifica Tariffe</a></li>
<li class="first" id="formsala"><a href="#" onclick="ajaxcontrtask('gestione', 'salatpl');">Modifica Proiezioni</a></li>
<li class="first" id="elencofilm"><a href="#" onclick="ajaxcontrtask('gestione', 'mostratitoli');">Elenco Film</a></li>
<li class="first" id="modfilm"><a href="#" onclick="ajaxcontrtask('gestione', 'mostratitolidamodificare');">Modifica Film</a></li>
<li class="first" id="elencofilm"><a href="#" onclick="ajaxcontrtask('gestione', 'elencocancellafilm');">Elimina Film</a></li>
<li class="first" id="prova"><a href="#" onclick="ajaxcontrtask('registrazione', 'recuperadatiadmin');">Modifica Profilo</a></li>
<li class="first" id="prova"><a href="#" onclick="ajaxcontrtask('gestione', 'tplmessadmin');">Email Broadcast</a></li>
<li class="first" id="logout"><a href="#" onclick="ajaxmenucontrtask('autenticazione', 'logout');">Logout</a></li>



</ul>
</div>*}


<nav id="menu-wrap">    
    <ul id="menu" class="egmenu">
        <li class="first" id="formfilm">
            <a>Utenti</a>
            <ul>
                <li>
                    <a href="#" onclick="ajaxcontrtask('autenticazione', 'tplhomeadmin');">Ricerca</a>
                </li>
                <li>
                    <a href="#" onclick="ajaxcontrtask('autenticazione', 'listautenti');">Lista utenti</a>

                </li>
            </ul>
        </li>
        <li>
            <a>Modifica</a>
            <ul>
                <li><a href="#" onclick="ajaxcontrtask('registrazione', 'tariffetpl');">Tariffe</a></li>
                <li><a href="#" onclick="ajaxcontrtask('gestione', 'salatpl');">Proiezioni</a></li>
                <li>
                    <a href="">Film</a>
                    <ul>
                        <li><a href="#" onclick="ajaxcontrtask('gestione', 'mostratitolidamodificare');">Modifica Film</a></li>
                        <li><a href="#" onclick="ajaxcontrtask('gestione', 'elencocancellafilm');">Elimina Film</a></li>
                        <li><a href="#" onclick="ajaxcontrtask('registrazione', 'filmtpl');">Inserisci Film</a></li>


                    </ul>				
                </li>
                <li>
                    <a href="#" onclick="ajaxcontrtask('registrazione', 'recuperadatiadmin');">Profilo</a>

                </li>
                <li>
                    <a href="#" onclick="ajaxcontrtask('registrazione', 'aggiungiadmin');">Aggiungi Admin</a>

                </li>

            </ul>
        </li>
        <li>

        <li><a href="#" onclick="ajaxcontrtask('gestione', 'mostratitoli');">Elenco Film</a></li>
        <li><a href="#" onclick="ajaxcontrtask('gestione', 'tplmessadmin');">Email</a></li>

        <li><a href="#" onclick="ajaxmenucontrtask('autenticazione', 'logout');">Logout</a></li>
        <a id="user">BENTORNATO, {$nome}</a>
    </ul>
</nav>