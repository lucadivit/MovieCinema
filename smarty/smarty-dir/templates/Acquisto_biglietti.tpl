<div id="boxext"><h1><div id="{$Titolo}">{$Titolo}</div></h1><br>
<input type='text' id="sala" class="hidden" value={$sala}>
<input type='text' id="codice" class="hidden" value={$codice}>

<h4>Film in proiezione alla sala <b id="{$sala}">{$sala} </b></h4><br>
Seleziona Spettacolo: <select name="spettacolo" id="spettac"> <optgroup label="Seleziona"></optgroup>
    <option value="{$spettacolo1}" id='spet1' onclick="subpostidisponibili(getpostidisponibili('spet1'));">{$spettacolo1}</option>
    <option value="{$spettacolo2}" id='spet2' onclick="subpostidisponibili(getpostidisponibili('spet2'));">{$spettacolo2}</option>
    <option value="{$spettacolo3}" id='spet3' onclick="subpostidisponibili(getpostidisponibili('spet3'));">{$spettacolo3}</option></select><br><br>
    
    <div id="postonascosto">posti disponibili: <b id="successivo">{$numposti} </b></div><br>


    <br>Quanti biglietti vuoi acquistare?<br>
Adulti: <input type="number" min="0" max="{$numposti}" id="adulto" size="2" value="0" onchange="subpostidisponibili(getpostidisponibili(prendiid()));" onclick="subdatiacquisto(getdatiacquisto({$sala}), 'acquisto', 'preventivo', 'totale');">
Bambini: <input type="number" min="0" max="{$numposti}" id="ridotto" size="2" value="0" onchange="subpostidisponibili(getpostidisponibili(prendiid()));" onclick="subdatiacquisto(getdatiacquisto({$sala}), 'acquisto', 'preventivo', 'totale');">

<div id="ERRORE"></div>

Hai a disposizione {$omaggi} biglietti omaggio. <br>
{if $omaggi!=0}
    Vuoi utilizzarli? Quanti biglietti omaggio vuoi utilizzare? <input type="number" min="0" max="{$omaggi}" id="omaggio" size="2" value="0" onclick="subdatiacquisto(getdatiacquisto({$sala}), 'acquisto', 'preventivo', 'totale');">
{/if}
<br>
Totale <input type="text" id="totale" value='0' size='6' readonly> €

<div class="hidden" id="loading"> <br><br></div><input type="submit" id="inviacquisto" value="invia" onclick="acquisto(getdatiacquisto({$sala}), 'acquisto', 'inviacquisto', 'ajaxcontenitore');">

<br><br><br>

 <div id="finestra7" class='wind' title='Acquisto'>
        <p> Sei sicuro di voler procedere con l'acquisto?</p>
    </div>
    

</div>