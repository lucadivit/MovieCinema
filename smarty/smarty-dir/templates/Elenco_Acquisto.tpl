<div id="boxext"><div id="elenco">
      <h2>ACQUISTA UN BIGLIETTO!</h2>
    <h4>Scegli uno dei seguenti film! Ti ricordiamo che ogni 4 biglietti
        acquistati ne riceverai subito uno in omaggio da utilizzare per la prossima 
        volta che verrai a trovarci per uno qualsiasi dei film in programmazione!</h4><br><br><ul>
{if $Titolo}
  {for $i=0 to $contatore-1}
    
     
      <li> <a href="#" onclick="sendtitolo2('{$elenco[$i]['codice_film']}','{$Titolo[$i]}', 'acquisto', 'sendacquisto');"> <div id={$Titolo[$i]}>{$Titolo[$i]}</div> </a></li><br>
        <div id="{$elenco[$i]['codice_film']}" class="hidden">{$elenco[$i]['codice_film']}</div>
     {/for}

{else}
     Non sono presenti film sul database!
    
     
 {/if}
 
 
   </ul>

</div>
</div>