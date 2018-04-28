<div id="elenco">
    <div id="boxext"> <h2>ELIMINA FILM</h2>
    <h4>Una volta eliminato, non sarà più possibile recuperare il film in alcun modo</h4><br><br>
{if $dati}
  {foreach $dati as $eliminazione}
      <ul>
        <li> <a href="#" onclick="erasefilm('{$eliminazione.codice_film}');"> <div id={$eliminazione.titolo}>{$eliminazione.titolo} (codice: {$eliminazione.codice_film}) 
                </div></a></li><br>
                <a href="Elenco_Film_Delete.tpl"></a>
 <div id="finestra3" class='wind' title="ATTENZIONE!">
        <p>Sei sicuro di voler eliminare definitivamente {$eliminazione.titolo}? Dopo l'eliminazione non sarà più possibile recuperare il film!</p>
   </div>
     </ul>
  

     {/foreach}
 {else}
     Non sono presenti film sul database!
    
     
 {/if}



            
            
</div></div>