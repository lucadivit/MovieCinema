<div id="boxext"><div id="elenco">
    <h2>MODIFICA FILM</h2>
    <h4>Scegli il film che vuoi modificare</h4><br><br>
    <ul>
{if $Titolo}
  {for $i=0 to $contatore-1}
    
     
      <li> <a href="#" onclick="sendcodice('', {$elenco[$i]['codice_film']}, 'registrazione', 'modificafilmtpl');"> <div id={$Titolo[$i]}>{$Titolo[$i]}</div> </a></li><br>
        <div id="{$elenco[$i]['codice_film']}" class="hidden">{$elenco[$i]['codice_film']}</div>
     {/for}

{else}
     Non sono presenti film sul database!
    
     
 {/if}
 
 
   </ul>

</div></div>