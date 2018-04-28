{if $Utente}
<div id="evidenza">{$Utente.username}</div><br><br>
<input type="text" value="{$Utente.username}" class="hidden" id="ut_nascosto">
<a href="#" onclick="eraseuser(getusererase());"><img src="./immagini/cancella.jpg" alt="elimina" id="eliminautente" class='opzut'>Elimina </a><br>
<a href="#" onclick="scrivimail();"><img src="./immagini/email.jpg" alt="contatta" id="contattautente" class='opzut'>Scrivi un'e-mail </a> <br>
<a href="#" onclick="recuperainfoutenti(getusererase());"><img src="./immagini/index.jpg" alt="contatta" id="index" class='opzut'>Visualizza informazioni personali</a><br>
{else}
     La Sua ricerca non ha prodotto risultati! Provi ad affettuare una nuova ricerca!
    
     
 {/if}

 <div id="finestra" class='wind' title="ATTENZIONE!">
        <p>Sei sicuro di voler eliminare definitivamente {$Utente.username} ? Dopo l'eliminazione non sarà più possibile recuperare l'account!</p>
    </div>
    
    <div id="numbiglietti" class='wind' title='Numero Biglietti'>
        <p> Il numero di biglietti acquistati da {$Utente.username} è {$biglietti}</p>
    </div>
    
    