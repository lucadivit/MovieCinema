<div id="boxext"><div id="elenco">
    <h2>COMMENTA E VOTA</h2>
    <h4>Scegli il film che vuoi votare e commentare!</h4><br><br>
    <ul>
{if $Titolo}
  {for $i=0 to $contatore-1}
    
     
      <li> <a href="#" onclick="sendtitolo({$elenco[$i]['codice_film']});"> <div id={$Titolo[$i]}>{$Titolo[$i]}</div><br>
 </a><div id="{$elenco[$i]['codice_film']}" class='hidden'>{$elenco[$i]['codice_film']}</div>
</li>

     {/for}

{else}
     Non sono presenti film sul database!
    
     
 {/if}
 
 
   </ul>

</div>
</div>