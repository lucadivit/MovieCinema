<html>
    <head>
        <script type="text/javascript" src="./JS/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="./JS/jquery-ui.js"></script> {* libreria datepicker *}
        <script type="text/javascript" src="./JS/jquery.ui.widget.js"></script> {* libreria datepicker *}
        <script type="text/javascript" src="./JS/gestione_link.js"></script>
        <script type="text/javascript" src="./JS/votazione.js"></script>
        <script type="text/javascript" src="./JS/recupero.js"></script>
        <script type="text/javascript" src="./JS/slider.js"></script>

        <link rel="stylesheet" href="./CSS/jquery-ui.css">
        <link rel="stylesheet" href="./CSS/Registrazione_stile.css"> 
        <link rel="stylesheet" href="./CSS/Pagina_stile.css"> 
        <link rel="stylesheet" href="./CSS/Votazione_stile.css"> 
        <link rel="stylesheet" href="./CSS/Filmcommenti_stile.css"> 
        <link rel="stylesheet" href="./CSS/slider.css">

        <title>Movie Cinema</title>
    </head>

    <body> 
        <div id="header">




        </div>

        <noscript>
        <div style="color: red; font-size: 22px; text-align: center;">
            Il tuo browser non supporta JavaScript, o lo hai disattivato!<br>
            Riattivalo accedendo alle impostazioni del browser se vuoi usufruire dei nostri servizi

        </div>
        </noscript>  



        <div id="ajaxmenu">

            {$Menu}

            <div id="ajaxcontenitore"> 
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
            <br>

        </div>
        <div id="footer">

        </div>

    </body>  
</html>