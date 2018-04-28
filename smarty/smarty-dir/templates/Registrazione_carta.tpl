Controlla la tua e-mail, riceverai la password per il primo accesso!
Registra anche la tua carta di credito, altrimenti non potrai fare acquisti! Puoi registrare la carta anche successivamente, dopo aver effettuato il login!
<div id="carta">

    <fieldset>
        

        <div id="dati">Dati Carta di Credito:<br></div>
        <input type="text" id="username" value="{$user}" class="hidden"><div id="risultato1"></div><br>

        <img src="./immagini/popcorn22.gif" id="asterisco"><label>Numero carta di credito:</label><input type="text" id="numero_carta" size="16" maxlength="16" placeholder="carta di credito" onchange="validazione('numero_carta');"><div id="risultato11"></div><br>

        <img src="./immagini/popcorn22.gif" id="asterisco"><label>Data di scadenza:</label> <input type="text" value="09" id="data_scadenza_m" size="2" maxlength="2" placeholder="mm"> / <input type="text" id="data_scadenza_a" size="4" maxlength="4"  value="2018" placeholder="aaaa"><br>

        <img src="./immagini/popcorn22.gif" id="asterisco"><label>CVV: </label><input type="text" id="credit_validation_value" value="1234" size="4" maxlength="4" onchange="validazione('credit_validation_value');"><div id="risultato12"></div><br><br>
    </fieldset>

    <br>
    <br> 

    <div id="bottone"> 
        <input type="submit" id="submit" value="Invia" onclick="sendformcarta(getdaticarta(), 'registrazione', 'registracarta');"> 
        <input type="submit" id="submitnocarta" value="Salta" onclick="ajaxmenucontrtask('registrazione', 'saltaproceduracarta');"> 
    </div>
</div>