<div id="carta">

    <fieldset>
        <div id="dati">Dati Carta di Credito:<br></div>
        <input type="text" id="task" class="hidden" value="{$daticarta.task}" size="20" maxlength="40">
        <input type="text" class="hidden" id="username" value="{$daticarta.username}" size="20" maxlength="40"><div id="risultato1"></div><br>
        <label>Numero carta di credito:</label><input type="text" id="numero_carta" size="16" maxlength="16" placeholder="carta di credito" value="{if isset($daticarta.numero_carta)}{$daticarta.numero_carta}{/if}" onchange="validazione('numero_carta');" readonly><img src="./immagini/index.jpg" alt="contatta" id="index" class='opzut' onclick="modifica('numero_carta');"><div id="risultato11">{if isset($dati_errati)}{if $dati_errati.numero_carta == "TRUE"} {$error_msg.numero_carta} {/if}{/if}</div><br>
        {if isset($daticarta.data_scadenza)}{assign var="data_split" value="-"|explode:$daticarta.data_scadenza}{/if}
        
        <label>Data di scadenza:</label> <input type="text" value="{if isset($data_split[1])}{$data_split[1]}{/if}" id="data_scadenza_m" size="2" maxlength="2" placeholder="mm"> / <input type="text" id="data_scadenza_a" size="4" maxlength="4"  value="{if isset($data_split[0])}{$data_split[0]}{/if}" placeholder="aaaa"><div id="risultato13">{if isset($dati_errati)}{if $dati_errati.data_scadenza == "TRUE"} {$error_msg.data_scadenza} {/if}{/if}</div><br>
        <label>CVV: </label><input type="text" id="credit_validation_value" value="{if isset($daticarta.credit_validation_value)}{$daticarta.credit_validation_value}{/if}" size="4" maxlength="4" placeholder="CVV" onchange="validazione('credit_validation_value');" readonly><img src="./immagini/index.jpg" alt="contatta" id="index" class='opzut' onclick="modifica('credit_validation_value');"><div id="risultato12">{if isset($dati_errati)}{if $dati_errati.credit_validation_value == "TRUE"} {$error_msg.credit_validation_value} {/if}{/if}</div><br><br>
    </fieldset>

    <br>
    <br> 

    <div id="bottone"> 
        <input type="submit" id="submit" value="Invia" onclick="subdaticartanew(getdaticarta());"> 
    </div>
</div>
    
  