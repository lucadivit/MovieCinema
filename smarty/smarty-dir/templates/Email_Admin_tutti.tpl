<div id="boxext">
    {if $elenco}
<input type="checkbox" id="selezionatutto" onclick="selectall();">Seleziona tutto<br><br>

{for $i=0 to $contatore-1}
<input type="checkbox" id="indirizzi" class="selezionabile" value={$elenco[$i]['email']}>{$elenco[$i]['email']}<br><br>
{/for}
<input type="text" id="oggetto" size="40" maxlength="40" placeholder="Oggetto"><br>
<textarea id="bodymess" rows="6" cols="45" placeholder="Inserisci il messaggio qui..." maxlength="2048"></textarea>

<div class="hidden" id="loading"> <br><br></div><input type="submit" id='inviaemail' onclick="subdatiemail(getdatiemail())" value='invia'>

{else}
    Non sono presenti utenti sul database!<br><br>
    
     
 {/if}

</div>