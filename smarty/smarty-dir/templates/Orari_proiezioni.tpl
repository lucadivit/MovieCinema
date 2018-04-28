<div id="boxext"><div id="filmaggiunto">
    {foreach from=$datiFilm item=elencoFilm}
        <table border="1">
            <tr>
                <td rowspan="7"><img id="locandina" src="./upload/{$locandina[$elencoFilm.codice_film]}">
                </td>
                <td><b>Titolo:</b> {$elencoFilm.titolo_film}</td>
            </tr>
            <tr>
                <td><b>Sala:</b> {$elencoFilm.id_sala}</td>
            </tr>
            <tr>
                <td><b>Posti Disponibili:</b> {$elencoFilm.numero_posti}</td>
            </tr>
            <tr>
                <td><b>Spettacoli:</b> <br>{$elencoFilm.orario1} 
                    <br>{$elencoFilm.orario2} 
                    <br>{$elencoFilm.orario3}</td>
            </tr>
        </table>
    {/foreach}
</div></div>