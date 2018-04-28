<div id="boxext"> 
    <ul>
        {if $lista}
            {foreach $lista as $utente}


                <li> <a href="#" onclick="lista('{$utente.username}');"> <div id={$utente.username}>{$utente.username}</div>
                </li>

            {/foreach}

        {else}
            Non sono presenti utenti sul database!


        {/if}


    </ul>

</div>
        