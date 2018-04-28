<div id="carta">
    <fieldset>
        <div id="dati">Dati Carta di Credito:<br></div>
        <input type="text" id="username" class="hidden" value="{$user}"><br>

        <img src="./immagini/popcorn22.gif" id="asterisco"><label>Numero carta di credito:</label><input type="text" id="numero_carta" size="16" maxlength="16" placeholder="carta di credito" onchange="validazione('numero_carta');"><div id="risultato11">{if $dati_errati.numero_carta == "TRUE"} {$error_msg.numero_carta} {/if}</div><br>

        <img src="./immagini/popcorn22.gif" id="asterisco"><label>Data di scadenza:</label> <input type="text" id="data_scadenza_m" size="2" maxlength="2" placeholder="mm"> / <input type="text" id="data_scadenza_a" size="4" maxlength="4" placeholder="aaaa"><div id="risultato13">{if $dati_errati.data_scadenza == "TRUE"} {$error_msg.data_scadenza} {/if}</div><br>

        <img src="./immagini/popcorn22.gif" id="asterisco"><label>CVV: </label><input type="text" id="credit_validation_value" size="4" maxlength="4"><div id="risultato12">{if $dati_errati.credit_validation_value == "TRUE"} {$error_msg.credit_validation_value} {/if}</div><br><br>

    </fieldset>

    <br>
    <br> 

    <div id="bottone"> 
        <input type="submit" id="submit" value="Invia" onclick="sendformcarta(getdaticarta(), 'registrazione', 'registracarta');"> 
    <input type="submit" id="submitnocarta" value="Salta" onclick="ajaxmenucontrtask('registrazione', 'saltaproceduracarta');"> 
    </div>
</div>