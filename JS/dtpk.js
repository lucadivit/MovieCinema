/*
 * funzione per il datepicker. Stabilisce il formato della data e permette di cambiare mese e anno,
 * fornisce inoltre il range degli anni da visualizzare. 
 * La scelta di inserire questo script nel body del tpl "Registrazione_utente" ha una duplice motivazione:
 * se fosse stato inserito tra i tag head di "Home_page" non avrebbe potuto funzionare in quanto lo script 
 * sarebbe partito e avrebbe letto tutta la pagina html (questo avviene durante il caricamento della pagina) 
 * senza trovare, perÃ², il corrispondente id "data_nascita" (che si trova in "Registrazione_utente").
 * Con la chiamata ajax si va a cambiare il div "ajaxcontenitore", non si ricarica la pagina e quindi
 * lo script non gira di nuovo e non "vede" data_nascita. 
 * Se, invece, racchiudessimo tale codice in una funzione da far partire 
 * all'evento click del campo testo relativo alla data di nascita avremmo un considerevole tempo di ritardo
 * nella comparsa del datepicker, ritardo dovuto al caricamento degli script (stessa latenza si ha mentre
 * si carica la pagina ma non viene percepito dall'utente appunto perchÃ¨ la pagina si sta caricando)
 */ 

    $(document).ready(function() {

        $("#data_nascita").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: "1930:2014"
        });
    });