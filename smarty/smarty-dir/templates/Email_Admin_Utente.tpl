<div id="boxext"><input type="text" id="destinatario" class="hidden" value={$indirizzo}><br>
A: {$username}<br>

<input type="text" id="oggetto" size="40" maxlength="40" placeholder="Oggetto"><br>
<textarea id="bodymess" rows="6" cols="45" placeholder="Inserisci il messaggio qui..." maxlength="2048"></textarea>

<br><br><div class="hidden" id="loading"> <br><br></div><input type="submit" id='inviaemail' onclick="subdatiemail(getdatiemailsingolo())" value='invia'></div>