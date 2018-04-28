
<h1>PASSO DUE - AMMINISTRATORE PRINCIPALE</h1>
<div>Completare i campi sottostanti. I campi contrassegnati da <img src="./immagini/popcorn22.gif" id="asterisco"> sono obbligatori.<br>
</div>

<div id='sx'>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Username:</label> <br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Password:</label> <br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Conferma Password:</label><br> 
    <label><img src="./immagini/popcorn22.gif" id="asterisco">E-Mail:</label><br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Nome:</label><br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Cognome:</label><br>
    <label>Data di nascita:</label><br>
</div>
<div id='dx'>
    <input type="text" id="username" placeholder="Username" size="20" maxlength="40" value="{if isset($dati_registrazione.username)}{$dati_registrazione.username}{/if}" onchange="validazione('username');"><div id="risultato1">{if isset($dati_errati.username)} {if $dati_errati.username}{$error_msg.username} {/if}{/if}</div>
    <input type="password" id="password" placeholder="Password" size="20" maxlength="40" value="{if isset($dati_registrazione.password)}{$dati_registrazione.password}{/if}" onchange="validazione('password');"><div id="risultato2">{if isset($dati_errati.password)} {if $dati_errati.password}{$error_msg.password} {/if} {/if}</div>
    <input type="password" id="password_1" placeholder="Conferma Password" size="20" maxlength="40" onchange="validazione('password_1');"><div id="risultato3">{if isset($dati_errati.password)} {if $dati_errati.password}{$error_msg.password} {/if} {/if}</div>
    <input type="text" id="email" size="40" maxlength="40" placeholder="Inserisci indirizzo e-mail" value="{if isset($dati_registrazione.email)}{$dati_registrazione.email}{/if}" onchange="validazione('email');"><div id="risultato4">{if isset($dati_errati.email)} {if $dati_errati.email}{$error_msg.email} {/if} {/if}</div>
    <input type="text" placeholder="Nome" size="20" maxlength="40" id="nome" value="{if isset($dati_registrazione.nome)}{$dati_registrazione.nome}{/if}"  onchange="validazione('nome');"><div id="risultato5">{if isset($dati_errati.nome)} {if $dati_errati.nome}{$error_msg.nome} {/if} {/if}</div>
    <input type="text" id="cognome" size="20" maxlength="40" placeholder="Cognome" value="{if isset($dati_registrazione.cognome)}{$dati_registrazione.cognome}{/if}" onchange="validazione('cognome');"><div id="risultato6">{if isset($dati_errati.cognome)} {if $dati_errati.cognome}{$error_msg.cognome} {/if} {/if}</div>
    <script type="text/javascript" src="./JS/dtpk.js"></script>
    <div id="anim"><input type="text" id="data_nascita" size="20" maxlength="20" placeholder="aaaa-mm-gg" value="{if isset($dati_registrazione.data_nascita)}{$dati_registrazione.data_nascita}{/if}"></div><div id="risultato7"></div>  
</div>
<div id='tasto'>
<div class="hidden" id="loading"> <br><br></div><input type="submit" id="submit" value="AVANTI >" onclick="registra_admin();"> 
</div>