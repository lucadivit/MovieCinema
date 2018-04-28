<div id="boxext">    <fieldset>
        <div id="dati_film">

            <input type="text" id="titolo" size="40" maxlength="40" placeholder="Titolo" value="{$datifilm.titolo}" onchange="validazionefilm('titolo')"><div id="risultatofilm1"></div><br>
            <input type="text" id="autore" size="40" maxlength="30" placeholder="Autore" value="{$datifilm.autore}" onchange="validazionefilm('autore')"><div id="risultatofilm2"></div><br>
            <input type="text" id="durata" size="40" maxlength="4" placeholder="Durata in minuti" value="{$datifilm.durata}" onchange="validazionefilm('durata')"><div id="risultatofilm3"></div><br>
            <textarea id="trama" rows="6" cols="45" placeholder="Inserisci trama:" maxlength="2048" onchange="validazionefilm('trama')">{$datifilm.trama}</textarea><div id="risultatofilm4"></div><br>
            <input type="text" id="genere" size="40" maxlength="40" placeholder="Genere:" value="{$datifilm.genere}" onchange="validazionefilm('genere')"><div id="risultatofilm5"></div><br>
            <input type="text" id="codice" size="40" maxlength="40" placeholder="Codice Film:" value="{$datifilm.codice_film}" readonly><div id="risultatofilm7"></div><br>


<a>Sfoglia</a>

    <input type="file" name="upl" id="upl"> Immagine attuale: {$datifilm.locandina}

    <span id="stato"></span>

    <div class="elemento">
    <div class="hidden" id="loading"> <br><br></div><input type="submit" id="caricalocandina" value="Carica" onclick="rotella('caricalocandina'),upload('registrazione', 'modificafilm');">
    </div>

                  </div>
    </fieldset>


</div>