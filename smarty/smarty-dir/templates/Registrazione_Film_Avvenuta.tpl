<div id="boxext">
<div id="right"><p><b>MEDIA: {$media}</b></p>
    <a href="#" id="acquista" onclick="sendtitolo2('{$datiFilm.codice_film}', '{$datiFilm.titolo}', 'acquisto', 'sendacquisto');"><img src="./immagini/ticket_acq.jpg" id="bigliettoacq" title="Acquista biglietto"></a>
</div>

<div id="left">   <img id="locandina" src="./upload/{$datiFilm.locandina}">
</div>

<div id="middle">
    <div id="gettitolo" onchange="sendtitolo2({$datiFilm.titolo}, 'gestione', 'media');"><b>{$datiFilm.titolo}</b></div><br>
    <b>Genere:</b> {$datiFilm.genere}<br>
    <b>Durata:</b> {$datiFilm.durata}<br>
    <b>Autore:</b> {$datiFilm.autore}<br>
    <b>Trama:</b> {$datiFilm.trama}<br>
    <div id="getcodice" class="hidden">{$datiFilm.codice_film}</div>
</div>
<br><br>


<div id="centro">
    {$Commento}
</div>
<br>


</div>