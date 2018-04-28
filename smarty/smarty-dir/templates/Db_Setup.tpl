
<h1>PASSO UNO - DATI DI ACCESSO AL DATABASE</h1>
<div id='sx'>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Host:</label> <br>
    <label>&nbsp; &nbsp; &nbsp; Password db:</label> <br>
    <label>&nbsp; &nbsp; &nbsp; Conferma Password db: </label><br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Userid db:</label><br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Nome DataBase:</label><br>
</div>
<div id='dx'>
    <input type="text" id="host" size="20" value="{if isset($dati_registrazione.host)}{$dati_registrazione.host}{/if}" onchange="validazione('host');"><div id="risultato8">{if isset($dati_errati.host)} {if $dati_errati.host}{$error_msg.host} {/if}{/if}</div>
    <input type="text" id="password" size="20" value="{*if isset($dati_registrazione.password)}{$dati_registrazione.password}{/if*}" onchange="validazione('password');"><div id="risultato2">{*if isset($dati_errati.password)} {if $dati_errati.password}{$error_msg.password} {/if}{/if*}</div>
    <input type="text" id="password_1" size="20" value="{*if isset($dati_registrazione.password)}{$dati_registrazione.password}{/if*}" onchange="validazione('password_1');"><div id="risultato3">{*if isset($dati_errati.password)} {if $dati_errati.password}{$error_msg.password} {/if}{/if*}</div>
    <input type="text" id="userid" size="20" value="{*if isset($dati_registrazione.host)}{$dati_registrazione.host}{/if*}"><div id="risultato8"></div>
    <input type="text" id="nomedb" size="20" value="{*if isset($dati_registrazione.host)}{$dati_registrazione.host}{/if*}"><div id="risultato8"></div>
    <br>
</div>
<div>
    Non compilare i campi sottostanti se si utilizza altervista.org<br>
    Configurazione server smtp:<br><br>
</div>
<div id='sx'>
    <label>&nbsp; &nbsp; &nbsp; Server SMTP: </label> <br>
    <label>&nbsp; &nbsp; &nbsp; Indirizzo E-mail:</label> <br>
    <label>&nbsp; &nbsp; &nbsp; Password Mail: </label><br>
</div>
<div id='dx'>
    <input type='text' id='hostmail' size="20"><br>
    <input type='usernamemail' id='usermail'><br>
    <input type='passwordmail' id='passmail'><br>   
</div>


<div class="hidden" id="loading"> <br><br></div><input type="submit" id="creadb" value="Avanti>" onclick="registra_db();">


