{$Menu}
<div id='ajaxcontenitore'>

        {if $slider}
                    {if $slider|@count>1}
                        <div id="imgsucc" class="slideimg" style="background-image: url('./upload/{$slider[1].locandina}'); opacity: 0;"> </div>
                    {else}
                        <div id="imgsucc" class="slideimg" style="background-image: url('./upload/{$slider[0].locandina}'); opacity: 0;"> </div>

                    {/if} 
                    
                    <div id="imgattuale" class="slideimg" style="background-image: url('./upload/{$slider[0].locandina}'); top: -400px; opacity: 1;"> </div>
                    <div id="titoloattuale" class="slidetxt">{$slider[0].titolo}</div>
                    <img id="star" class="star" src="./immagini/{$slider[0].media}star.png">

                    <div id="dati" class="delta">
                        <div id="indiceimmagini" value="1"></div>
                        {foreach $slider as $dato}
                            <input value="./upload/{$dato.locandina}">

                        {/foreach}
                    </div>
                    <div id="titoli" class="delta">
                        {foreach $slider as $dato}
                            <input value="{$dato.titolo}">

                        {/foreach}
                    </div>
                    
                     <div id="stelle" class="delta">
                        {foreach $slider as $dato}
                            <input value="{$dato.media}">

                        {/foreach}
                    </div>

                {else}
                    Non sono presenti film in programmazione!
                {/if}

</div>