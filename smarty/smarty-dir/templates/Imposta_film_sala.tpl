<div id="boxext"><fieldset>
    <div id="dati_sala">
        <div id="reg_sala">Imposta Proiezione:<br></div>
        <p>ATTENZIONE: per impostare una proiezione il film deve necessariamente essere presente nel database</p>
        <label>Seleziona Film: </label><select name="Film" id="titolo_film"> <optgroup label="Titoli: "></optgroup>{foreach from=$elenco_titoli item=titolo}<option value="{$titolo}">{$titolo}</option>{/foreach}</select><br>
        <label>Seleziona Sala: </label><select name="Sala" id="sala"> <optgroup label="Sala: "></optgroup>{for $i=1 to $numeroSale}<option value="{$i}">{$i}</option>{/for}</select><br>
        <tr><label>Primo Spettacolo: </label><select name="Orario" id="orario1_h"> <optgroup label="HH"></optgroup>{for $i=1 to 24}<option value="{$i}">{$i}</option>{/for}</select><select name="Orario" id="orario1_m"> <optgroup label="MM"></optgroup>{for $i=0 to 59}<option value="{$i}">{$i}</option>{/for}</select><br></tr>
        <tr><label>Secondo Spettacolo: </label><select name="Orario" id="orario2_h"> <optgroup label="HH"></optgroup>{for $i=1 to 24}<option value="{$i}">{$i}</option>{/for}</select><select name="Orario" id="orario2_m"> <optgroup label="MM"></optgroup>{for $i=0 to 59}<option value="{$i}">{$i}</option>{/for}</select><br></tr>
        <tr><label>Terzo Spettacolo: </label><select name="Orario" id="orario3_h"> <optgroup label="HH"></optgroup>{for $i=1 to 24}<option value="{$i}">{$i}</option>{/for}</select><select name="Orario" id="orario3_m"> <optgroup label="MM"></optgroup>{for $i=0 to 59}<option value="{$i}">{$i}</option>{/for}</select><br></tr>
        <div id="bottone"> 
            <input type="submit" id="submitfilm" value="Imposta" onclick="subdatisala(getdatisala());"> 
        </div>
    </div>
</fieldset>

        {if $datiFilm}
<fieldset>
    
    <div id="dati_sala">
        <div id="del_sala">Elimina Proiezione:<br></div>
        <p>I Film sottostanti sono quelli attualmente in proiezione, per eliminare un film dalla sala scegliere la sala corrispondente</p>
        {foreach from=$datiFilm item=proiezione }        
            <table border="2">
                <tr>
                   <td rowspan="7"><img id="locandina" src="./upload/{$locandine[$proiezione.titolo_film]}"></td>

                    <td>Titolo: {$proiezione.titolo_film}</td>
                </tr>
                <tr>
                    <td>Sala: {$proiezione.id_sala}</td>
                </tr>
            </table>
        {/foreach}
        <label>Seleziona sala da liberare: </label><select name="Sala" id="d_sala"> <optgroup label="Sala: "></optgroup>{foreach from=$datiFilm item=proiezione }<option value="{$proiezione.id_sala}">{$proiezione.id_sala}</option>{/foreach}</select><br>
        <div id="bottone"> 
            <input type="submit" id="deletefilm" value="Elimina" onclick="deldatisala(getdatidelsala());"> 
        </div>
    </div>
</fieldset>
        {else}
Non ci sono proiezioni in programma!
        {/if}
        </div>