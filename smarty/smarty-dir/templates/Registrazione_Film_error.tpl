<div id="boxext">    <fieldset>
        <div id="dati_film">

            <input type="text" id="titolo" size="40" maxlength="40" placeholder="Titolo" onchange="validazionefilm('titolo')"><div id="risultatofilm1">{if isset($dati_errati.titolo)}{if $dati_errati.titolo == "TRUE"} {$error_msg.titolo} {/if}{/if}</div><br>
            <input type="text" id="autore" size="40" maxlength="30" placeholder="Autore" onchange="validazionefilm('autore')"><div id="risultatofilm2">{if isset($dati_errati.autore)}{if $dati_errati.autore == "TRUE"} {$error_msg.autore} {/if}{/if}</div><br>
            <input type="text" id="durata" size="40" maxlength="4" placeholder="Durata in minuti" onchange="validazionefilm('durata')"><div id="risultatofilm3">{if isset($dati_errati.durata)}{if $dati_errati.durata == "TRUE"} {$error_msg.durata} {/if}{/if}</div><br>
            <textarea id="trama" rows="6" cols="45" placeholder="Inserisci trama:" maxlength="2048" onchange="validazionefilm('trama')"></textarea><div id="risultatofilm4">{if isset($dati_errati.trama)}{if $dati_errati.trama == "TRUE"} {$error_msg.trama} {/if}{/if}</div><br>
            <input type="text" id="genere" size="40" maxlength="40" placeholder="Genere:" onchange="validazionefilm('genere')"><div id="risultatofilm5">{if isset($dati_errati.genere)}{if $dati_errati.genere == "TRUE"} {$error_msg.genere} {/if}{/if}</div><br>
            <input type="text" id="codice" size="40" maxlength="40" placeholder="Codice Film:" onchange="validazionefilm('codice')"><div id="risultatofilm7">{if isset($dati_errati.codice_film)}{if $dati_errati.codice_film == "TRUE"} {$error_msg.codice_film} {/if}{/if}</div><br>


<a>Sfoglia</a>

    <input type="file" name="upl" id="upl">

    <span id="stato"></span>

    <div class="elemento">
    <div class="hidden" id="loading"> <br><br></div><input type="submit" id="caricalocandina" value="Carica" onclick="upload('registrazione', 'creafilm');">
    </div>

                  </div>
    </fieldset>

</div>
