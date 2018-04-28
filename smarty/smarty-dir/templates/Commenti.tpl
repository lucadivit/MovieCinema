    {foreach $elenco_comm as $elenco}
        <div id="commentinseriti">
        {$elenco} <br></div>
    {/foreach}




    <form id="inscommento">
voto: <div id="STAR_RATING" onmouseout="star_accendi(' + QT + ');">
        <ul>
            <li id="star_1" onclick="star_vota(1);
                    valorevoto(1);" onmouseover="star_accendi(0);
                            star_accendi(1);"></li>
            <li id="star_2" onclick="star_vota(2);
                    valorevoto(2);" onmouseover="star_accendi(0);
                            star_accendi(2);"></li>
            <li id="star_3" onclick="star_vota(3);
                    valorevoto(3);" onmouseover="star_accendi(0);
                            star_accendi(3);"></li>
            <li id="star_4" onclick="star_vota(4);
                    valorevoto(4);" onmouseover="star_accendi(0);
                            star_accendi(4);"></li>
            <li id="star_5" onclick="star_vota(5);
                    valorevoto(5);" onmouseover="star_accendi(0);
                            star_accendi(5);"></li>
        </ul>

    </div>
<input type="text" id="usercomm" value="{$username}" readonly><br>
<textarea id="commento" rows="6" cols="45" placeholder="Inserisci commento:" maxlength="2048"></textarea><br>
    
    <br>
    <input type="reset" value="Cancella Testo">
    <div class="hidden" id="loading"> <br><br></div><input type="button" id='submit' value="Invia Commento" onclick="subcommento(getcommento());">

</form>
