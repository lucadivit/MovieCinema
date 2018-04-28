<div id="boxext">
    
    
 {if $Titolo}
  {for $i=0 to $contatore-1}
    
<div>
    <ul>
        <li> <a href="#" onclick="sendtitolo2({$Titolo[$i]}, 'gestione', 'mostraorari');"> <div id='{$Titolo[$i]}'>{$Titolo[$i]}</div> </a></li>
        
    </ul>
</div>
   

     {/for}

{else}
     Non sono presenti film sul database!
    
     
 {/if}
 
 </div>