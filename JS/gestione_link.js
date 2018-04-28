function lista(dati) {
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            ricerca: dati,
            controller: 'gestione',
            task: 'mostrautenti'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });

}



function gettariffe(){
    var array=[];
    array['prezzo_adulto']=($('#intero_adulto').val() + "," + $('#cent_adulto').val());
    array['prezzo_ridotto']=($('#intero_ridotto').val() + "," + $('#cent_ridotto').val());
    return array;
}

function subtariffe(dati){
    
     $.ajax({
        url: "index.php",
        type: "post",
        data: {
          
            prezzo_adulto: dati['prezzo_adulto'],
            prezzo_ridotto: dati['prezzo_ridotto'],
           
            controller: 'registrazione',
            task: 'registratariffe'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
    
}


function getdatiacquisto(codsala){
    var array=[];
    array['codice']=$('#codice').val();
    array['orario']=$('#spettac').val();
    array['num_biglietti']=(parseInt($('#adulto').val())+parseInt($('#ridotto').val()));
    array['codsala']=codsala;
    array['ridotto']=parseInt($('#ridotto').val());
    array['adulto']=parseInt($('#adulto').val());
    array['omaggio']=parseInt($('#omaggio').val());
    array['totale']=$('#totale').val();
    
    alert(array['codice']);
    return array;
    
}

function acquisto(dati, contr, task, contenitore){

             $(document).ready(function(){
    $('#finestra7').dialog({
        modal: true,
        buttons: {
            "No": function() {
                $( this ).dialog( "close" );
                },
            "Si, sono sicuro": function(){
                 $("#inviacquisto").remove();
     $("#loading").removeAttr("class");
                
                   $.ajax({
        url: "index.php",
        type: "post",
        data: {
            orario: dati['orario'],
            codice_film:dati['codice'],
            num_biglietti: dati['num_biglietti'],
            codsala: dati['codsala'],
            ridotto: dati['ridotto'],
            adulto: dati['adulto'],
            omaggio: dati['omaggio'],
            totale: dati['totale'],
            controller: contr,
            task: task}, //controller e task

        success: function(data) {
            $('#'+contenitore).html(data);        }
    });
                    $( this ).dialog( "close" );
                    }
                }
            });
    });
        
     
        
      
}

function rotella(id){
    $("#"+id).remove();
     $("#loading").removeAttr("class");
}



function subdatiacquisto(dati, contr, task, contenitore){
   
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            orario: dati['orario'],
            num_biglietti: dati['num_biglietti'],
            codsala: dati['codsala'],
            titolo: dati['titolo'],
            ridotto: dati['ridotto'],
            adulto: dati['adulto'],
            omaggio: dati['omaggio'],
            totale: dati['totale'],
            controller: contr,
            task: task}, //controller e task

        success: function(data) {
            $('#'+contenitore).val(data);
        }
    });
}



function getpostidisponibili(variabile){
    var array=[];
    array['orario'] = $('#'+variabile).val();
    array['sala'] = $('#sala').val();
    
    
 
    return array;
}



function subpostidisponibili(dati){
      $.ajax({
        url: "index.php",
        type: "post",
        data: {
          
            orario: dati['orario'],
            sala: dati['sala'],
          
            controller: 'acquisto',
            task: 'prendipostidisponibili'}, //controller e task

        success: function(data) {
            $("#successivo").html(data);
            $("#adulto").attr("max",data-parseInt($('#ridotto').val()));
            $("#ridotto").attr("max",data-parseInt($('#adulto').val()));
            if((parseInt($('#ridotto').val())+parseInt($('#adulto').val()))>data){
                $('#ERRORE').html("Pulsante disabilitato, posti non disponibili!");
                document.getElementById("inviacquisto").disabled = true;
            }else{
                $('#ERRORE').html("");
                document.getElementById("inviacquisto").disabled = false;
            }
        }
    });
}
function prendiid(){
    return $('#spettac :selected').attr('id');
}



function upload(contr, task) {
        $("#caricalocandina").remove();
     $("#loading").removeAttr("class");
 var fileInput = document.getElementById('upl');
 var file = fileInput.files[0];
 var formData = new FormData();
 formData.append('file', file);
 formData.append('task', task);
formData.append('controller', contr);
formData.append('titolo', $('#titolo').val());
formData.append('autore', $('#autore').val());
formData.append('durata', $('#durata').val());
formData.append('genere', $('#genere').val());
formData.append('codice_film',  $('#codice').val());
formData.append('trama', $('#trama').val());



    $.ajax({
        type: 'POST',
        //method: 'POST', 
        //url: './Utility/upload.php',
        url: 'index.php',
        headers: {'Cache-Control': 'no-cache'},
        data: formData,//"?file=test.jpg" + "&controller=chupa" + "&task=chipa",
        
        contentType: false,
        processData: false,
        success: function(data) {
            $("#ajaxcontenitore").html(data);

            }
      
    });
}

function disattivaaccount(){
    $(document).ready(function(){
    $('#finestra4').dialog({
        modal: true,
        buttons: {
            "Chiudi": function() {
                $( this ).dialog( "close" );
                },
            "Elimina": function(){
                 $.ajax({
        url: "index.php",
        type: "post",
        data: {
            controller: 'gestione',
            task: 'disattivaaccount'}, //controller e task

        success: function(data) {
            $("#ajaxmenu").html(data);
        }
    });
                    $( this ).dialog( "close" );
                    }
                }
            });
    });
   
}

function modifica(id){
      $("#" + id).removeAttr('readonly');
}

//funzione che stabilisce se la password Ã¨ debole, media o forte
function checkpass(){
    $('#password').keyup(function() {
        var strong = new RegExp("^(?=.{20,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var medium = new RegExp("^(?=.{11,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z]))|((?=.*[a-z]))).*", "g");
        var enough = new RegExp("^(?=.{8,}).*", "g");
        if (false == enough.test($(this).val())) {
            $('#risultato2').html('Debole');
        } else if (strong.test($(this).val())) {
            $('#risultato2').html('Forte');
        } else if (medium.test($(this).val())) {
            $('#risultato2').html('Media');
        }
        return true;
    });

}
function inviamailutente(){
    
}

function scrivimail(){
    var username= document.getElementById('evidenza').innerHTML;
   
     $.ajax({
        url: "index.php",
        type: "post",
        data: {
          
            ricerca: username,
            controller: 'gestione',
            task: 'tplscrivimailutente'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}
 function selectall(){
    $('.selezionabile').each(function(){
        
        $(this).prop('checked',!$(this).prop('checked'));
    
    });
}

function getdatiemail() {
    var check = [];
    var array = [];


    array['oggetto'] = $('#oggetto').val();
    array['bodymess'] = $('#bodymess').val();
    $("#indirizzi:checked").each(function() {
        check.push($(this).val());

    });

    array['indirizzi'] = check;
    return array;
}
//per riutilizzare il codice ho riadattato sta cosa
function getdatiemailsingolo(){
    var array=[];
    var ind=[];
    ind[0]=$('#destinatario').val();
    array['oggetto'] = $('#oggetto').val();
    array['bodymess'] = $('#bodymess').val();
    array['indirizzi']=ind;
  
    return array;
    
}
function subdatiemail(dati){
$("#inviaemail").remove();
     $("#loading").removeAttr("class");
     $.ajax({
        url: "index.php",
        type: "post",
        data: {
          
            oggetto: dati['oggetto'],
            bodymess: dati['bodymess'],
            indirizzi: dati['indirizzi'],
            controller: 'gestione',
            task: 'invioemailbroad'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}

function getdatisala() {
    var array = [];
    array['titolo_film'] = $('#titolo_film').val();
    //array['codice_film'] = $('#codice_film').val();
    array['id_sala'] = $('#sala').val();
    array['orario1'] = ($('#orario1_h').val() + ":" + $('#orario1_m').val());
    array['orario2'] = ($('#orario2_h').val() + ":" + $('#orario2_m').val());
    array['orario3'] = ($('#orario3_h').val() + ":" + $('#orario3_m').val());
    return array;
}

function subdatisala(dati) {
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            titolo_film: dati['titolo_film'],
            //codice_film: dati['codice_film'],
            id_sala: dati['id_sala'],
            orario1: dati['orario1'],
            orario2: dati['orario2'],
            orario3: dati['orario3'],
            controller: 'gestione',
            task: 'impostafilmsala'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}
function getdatidelsala() {
    var array = [];
    array['id_sala'] = $('#d_sala').val();
    return array;
}

function deldatisala(dati) {
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            id_sala: dati['id_sala'],
            controller: 'gestione',
            task: 'eliminaproiezione'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}









function getdatiadmin() {
    var array = [];
    array['username'] = $('#username').val();
    array['password'] = $('#password').val();
    array['email'] = $('#email').val();
    array['nome'] = $('#nome').val();
    array['cognome'] = $('#cognome').val();
    array['data_nascita'] = $('#data_nascita').val();
    
    return array;
}

function subdatiadmin(dati) {
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            username: dati['username'],
            password: dati['password'],
            email: dati['email'],
            nome: dati['nome'],
            cognome: dati['cognome'],
            data_nascita: dati['data_nascita'],
         
            controller: 'registrazione',
            task: 'modificaadmin'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}



function sendcodice(dati, codice, contr, task){
    
     $.ajax({
        url: "index.php",
        type: "post",
        data: {titolo:dati.id,
            codice_film:codice.id,
            controller:contr,
            task:task}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}




function sendtitolo2(codice, dati, contr, task){
    $.ajax({
        url: "index.php",
        type: "post",
        data: {titolo:dati,
            codice_film:codice,
            controller:contr,
            task:task}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}


//associato al click del bottone (al tpl), permette di fare una chiamata ajax inviando al server i
// dati del form, controller e task
function subdatifilm(dati) {
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            titolo: dati['titolo'],
            autore: dati['autore'],
            durata: dati['durata'],
            genere: dati['genere'],
            codice_film: dati['codice_film'],
            trama: dati['trama'],
            controller: 'registrazione',
            task: 'registrafi'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}


function getusersearch() {
    var array = [];
    array['username'] = $('#cercautente').val();
    return array;
}

function subsearch(dati) {
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            ricerca: dati['username'],
            controller: 'gestione',
            task: 'mostrautenti'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });

}

function getusererase(){
    var utente=$('#ut_nascosto').val();
    return utente;
}

function recuperainfoutenti(dati){
      $.ajax({
        url: "index.php",
        type: "post",
        data: {
            utente: dati,
            controller: 'gestione',
            task: 'mostradatiut'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}

function eraseuser(dati){
    $(document).ready(function(){
    $('#finestra').dialog({
        modal: true,
        buttons: {
            "Chiudi": function() {
                $( this ).dialog( "close" );
                },
            "Elimina": function(){
                 $.ajax({
        url: "index.php",
        type: "post",
        data: {
            utente: dati,
            controller: 'gestione',
            task: 'eliminautente'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
                    $( this ).dialog( "close" );
                    }
                }
            });
    });
   

}

//function getfilmerase(titolo_film){
  //  var titolo=document.getElementById(titolo_film).innerHTML;
    //return titolo;
//}

function erasefilm(dati){
    $(document).ready(function(){
    $('#finestra3').dialog({
        modal: true,
        buttons: {
            "Chiudi": function() {
                $( this ).dialog( "close" );
                },
            "Elimina": function(){
                 $.ajax({
        url: "index.php",
        type: "post",
        data: {
            codice_film: dati,
            controller: 'gestione',
            task: 'eliminafilm'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
                    $( this ).dialog( "close" );
                    }
                }
            });
    });
   

}

function recuperabiglietti(dati){
  $(document).ready(function(){
    $('#numbiglietti').dialog({
        modal: true,
        buttons: {
            "Chiudi": function() {
                $( this ).dialog( "close" );
                }
            }
           
    });
   
   });
}

//Prende username e password e li salva in un array
function getdatilog() {
    var array = [];
    array['username'] = $('#useraccess').val();
    array['password'] = $('#passaccess').val();
    return array;
}

//invia i dati al server mediante una chiamata ajax
function sublog(dati) {

    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            username: dati['username'],
            password: dati['password'],
            controller: 'autenticazione',
            task: 'autorizzazioni'}, //controller e task

        success: function(data) {
            $("#ajaxmenu").html(data);
        }
    });

}





//questa funzione permette di fare una chiamata al server inviando controller e task 
function ajaxcontrtask(contr, tsk) {

    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            controller: contr,
            task: tsk}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }


    });


}
function ajaxmenucontrtask(contr, tsk) {

    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            controller: contr,
            task: tsk}, //controller e task

        success: function(data) {
            $("#ajaxmenu").html(data);
        }


    });


}


function cambiapassword(){
 $("#primoaccesso").remove();
     $("#loading").removeAttr("class");
    var password=$('#password').val();
        $.ajax({
        url: "index.php",
        type: "post",
        data: {
            password: password,
            controller: 'registrazione',
            task: 'cambiapassword'}, //controller e task

        success: function(data) {
          
            $("#ajaxmenu").html(data);
        }


    });

}

//prende i dati dal form e li mette in un array
function getdati() {
    var array = [];
    if($('#username').val().length>0){
            array['username'] = $('#username').val();
    }else{
        array['username']='-';
    }
    array['nome'] = $('#nome').val();
    array['cognome'] = $('#cognome').val();
    if($('#email').val().length>0){
           array['email'] = $('#email').val();
 
    }else{
        array['email']='-';
    }
    array['sesso'] = $('input[name="sesso"]:checked').val();
    array['data_nascita'] = $('#data_nascita').val();
    array['citta'] = $('#citta').val();
    array['provincia'] = $('#provincia').val();
    array['CAP'] = $('#cap').val();

    return array;

}

//invia i dati raccolti al server mediante una chiamata ajax e invia anche controller e task
function sendform(dati) {
$("#submit").remove();
     $("#loading").removeAttr("class");
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            username: dati['username'],
            nome: dati['nome'],
            cognome: dati['cognome'],
            email: dati['email'],
            sesso: dati['sesso'],
            data_nascita: dati['data_nascita'],
            citta: dati['citta'],
            provincia: dati['provincia'],
            CAP: dati['CAP'],
            controller: 'registrazione',
            task: 'registrautente'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}

function getdatiutentenew() {
    var array = [];
    array['username'] = $('#username').val();
    array['nome'] = $('#nome').val();
    array['cognome'] = $('#cognome').val();
    array['password'] = $('#password').val();
    array['password_1'] = $('#password_1').val();
    array['email'] = $('#email').val();
    array['sesso'] = $('input[name="sesso"]:checked').val();
    array['data_nascita'] = $('#data_nascita').val();
    array['citta'] = $('#citta').val();
    array['provincia'] = $('#provincia').val();
    array['CAP'] = $('#cap').val();

    return array;

}

function subdatiutentenew(dati) {

    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            username: dati['username'],
            nome: dati['nome'],
            cognome: dati['cognome'],
            password: dati['password'],
            password_1: dati['password_1'],
            email: dati['email'],
            sesso: dati['sesso'],
            data_nascita: dati['data_nascita'],
            citta: dati['citta'],
            provincia: dati['provincia'],
            CAP: dati['CAP'],
            controller: 'registrazione',
            task: 'modificautenteok'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}

function subdaticarta(dati) {

    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            username: dati['username'],
            numero_carta: dati['numero_carta'],
            data_scadenza: dati['data_scadenza'],
            credit_validation_value: dati['credit_validation_value'],
            controller: 'registrazione',
            task: 'recuperadatiutente'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}

//prende i dati dal form e li mette in un array. trattino per distinguere se il campo Ã¨ null oppure Ã¨ stato inviato form vuoto
function getdaticarta() {
    var array = [];
    
    array['username'] = $('#username').val();
    if($('#numero_carta').val().length>0){
    array['numero_carta'] = $('#numero_carta').val();
    }else{
    array['numero_carta'] = '-';
    }
    array['data_scadenza'] = ($('#data_scadenza_a').val() + "-" + $('#data_scadenza_m').val() + "-01");
     if($('#credit_validation_value').val().length>0){
    array['credit_validation_value'] = $('#credit_validation_value').val();
    }else{
    array['credit_validation_value'] = '-';
    }
    array['titolo']=$('#film').val();
    
   
    return array;
}


//invia i dati raccolti al server mediante una chiamata ajax e invia anche controller e task
function sendformcarta(dati, contr, task, id) {

$("#"+id).remove();
     $("#loading").removeAttr("class");

    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            username: dati['username'],
            numero_carta: dati['numero_carta'],
            data_scadenza: dati['data_scadenza'],
            credit_validation_value: dati['credit_validation_value'],
            codice_film: dati['titolo'],
            controller: contr,
            task: task}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}
function subdaticartanew(dati) {

    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            username: dati['username'],
            numero_carta: dati['numero_carta'],
            data_scadenza: dati['data_scadenza'],
            credit_validation_value: dati['credit_validation_value'],
            controller: 'registrazione',
            task: $('#task').val()}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}


function gettitolo(titolo_film){
      var titolo=document.getElementById(titolo_film).innerHTML;
  
    return titolo;
    
}

function sendtitolo(dati){
  
    $.ajax({
        url: "index.php",
        type: "post",
        data: {codice_film:dati.id,
            controller:'gestione',
            task:'impostafilm'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}
function validazioneadmin(id) {

    var tmp2 = $("#" + id).val();
    if (tmp2 != "") {

        if (id == 'username')
        {
            var pattern = /^[0-9a-zA-Z\_\-]{2,20}$/; //lettere, numeri, e i simboli _ -
            if (tmp2.match(pattern)) {
                $("#" + "risultato1").html("Username valido!") && $("#username").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato1").html("L'username non pu&ograve;  contenere simboli! Pu&ograve;  contenere solo lettere, numeri, _,-") && $("#username").css("background-color", "#e0ab80");

            }
        }

        if (id == 'password')
        {
            var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,30}$/; //min 8 max 30 caratteri

            if (tmp2.match(pattern)) {
                $("#" + "risultato2").html("Password valida!") && $("#password").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato2").html("La password deve essere compresa tra gli 8 e i 30 caratteri. Deve contenere almeno una lettera maiuscola, una lettere minuscola e un numero") && $("#password").css("background-color", "#e0ab80");
            }
        }

        if (id == 'nome')
        {
            var pattern = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]{2,40}\s?)+$/; //caratteri, lettere accentate apostrofo e un solo spazio fra le parole

            if (tmp2.match(pattern)) {
                $("#" + "risultato5").html("") && $("#nome").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato5").html("Il nome deve contenere solo caratteri!") && $("#nome").css("background-color", "#e0ab80");
            }
        }

        if (id == 'cognome')
        {
            var pattern = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/; //caratteri, lettere accentate apostrofo e un solo spazio fra le parole

            if (tmp2.match(pattern)) {
                $("#" + "risultato6").html("") && $("#cognome").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato6").html("Il cognome deve contenere solo caratteri!") && $("#cognome").css("background-color", "#e0ab80");
            }
        }

        
        if (id == 'email')
        {
            var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/; //caratteri, simboli (. _ â€“ @)

            if (tmp2.match(pattern)) {
                $("#" + "risultato4").html("") && $("#email").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato4").html("L'e-mail deve contenere caratteri e sono ammessi solo -,_,.,@") && $("#email").css("background-color", "#e0ab80");
            }
        }

        
        $('#password_1').blur(function() {
            var password = $("#password").val();
            var password_1 = $("#password_1").val();
            if (password === password_1)
            {

                $("#risultato3").html('Ok!') && $("#password_1").css("background-color", "whitesmoke");
            } else {
                $("#risultato3").html('ATTENZIONE: Le password non coincidono!') && $("#password_1").css("background-color", "#e0ab80");
            }
        });
    }

}
function registra_admin(){
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            username: $('#username').val(),
            password: $('#password').val(),
            password_1: $('#password_1').val(),
            email: $('#email').val(),
            nome: $('#nome').val(),
            cognome: $('#cognome').val(),
            data_nascita: $('#data_nascita').val(),
         
            controller: 'registrazione',
            task: 'creaadmin'
            }, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}

//validazione lato client
function validazione(id) {

    var tmp2 = $("#" + id).val();
    if (tmp2 != "") {

        if (id == 'username')
        {
            var pattern = /^[0-9a-zA-Z\_\-]{2,20}$/; //lettere, numeri, e i simboli _ -
            if (tmp2.match(pattern)) {
                $("#" + "risultato1").html("Username valido!") && $("#username").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato1").html("L'username non pu&ograve; contenere simboli! Pu&ograve;  contenere solo lettere, numeri, _,-") && $("#username").css("background-color", "#e0ab80");

            }
        }

        if (id == 'password')
        {
            var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,30}$/; //min 8 max 30 caratteri

            if (tmp2.match(pattern)) {
                $("#" + "risultato2").html("Password valida!") && $("#password").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato2").html("La password deve essere compresa tra gli 8 e i 30 caratteri. Deve contenere almeno una lettera maiuscola, una lettere minuscola e un numero") && $("#password").css("background-color", "#e0ab80");
            }
        }

        if (id == 'nome')
        {
            var pattern = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]{2,40}\s?)+$/; //caratteri, lettere accentate apostrofo e un solo spazio fra le parole

            if (tmp2.match(pattern)) {
                $("#" + "risultato3").html("") && $("#nome").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato3").html("Il nome deve contenere solo caratteri!") && $("#nome").css("background-color", "#e0ab80");
            }
        }

        if (id == 'cognome')
        {
            var pattern = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/; //caratteri, lettere accentate apostrofo e un solo spazio fra le parole

            if (tmp2.match(pattern)) {
                $("#" + "risultato4").html("") && $("#cognome").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato4").html("Il cognome deve contenere solo caratteri!") && $("#cognome").css("background-color", "#e0ab80");
            }
        }

        if (id == 'citta')
        {
            var pattern = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/; //caratteri, lettere accentate apostrofo e un solo spazio fra le parole

            if (tmp2.match(pattern)) {
                $("#" + "risultato5").html("") && $("#citta").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato5").html("Citt&#x00E0 non valida! Inserire nuovamente!") && $("#citta").css("background-color", "#e0ab80");
            }
        }


        if (id == 'cap')
        {
            var pattern = /^\d{5}$/; //5 numeri

            if (tmp2.match(pattern)) {
                $("#" + "risultato6").html("") && $("#cap").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato6").html("CAP errato! Inserire nuovamente!") && $("#cap").css("background-color", "#e0ab80");
            }
        }
        if (id == 'provincia')
        {
            var pattern = /^([a-zA-Z]\s?)+$/;//solo caratteri

            if (tmp2.match(pattern)) {
                $("#" + "risultato7").html("") && $("#provincia").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato7").html("Provincia non valida! Inserire nuovamente!") && $("#provincia").css("background-color", "#e0ab80");
            }
        }
        if (id == 'email')
        {
            var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/; //caratteri, simboli (. _ â€“ @)

            if (tmp2.match(pattern)) {
                $("#" + "risultato8").html("") && $("#email").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato8").html("L'e-mail deve contenere caratteri e sono ammessi solo -,_,.,@") && $("#email").css("background-color", "#e0ab80");
            }
        }
 if (id == 'numero_carta')
        {
            var pattern = /^\d{16}$/; //16 numeri

            if (tmp2.match(pattern)) {
                $("#" + "risultato11").html("") && $("#numero_carta").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato11").html("Numero carta non valido! Inserire di nuovo!") && $("#numero_carta").css("background-color", "#e0ab80");
            }
        }
if (id == 'credit_validation_value')
        {
            var pattern = /^\d{4}$/; //4 numeri

            if (tmp2.match(pattern)) {
                $("#" + "risultato12").html("") && $("#credit_validation_value").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato12").html("CVV non valido! Inserire di nuovo!") && $("#credit_validation_value").css("background-color", "#e0ab80");
            }
        }
        
        
        $('#password_1').blur(function() {
            var password = $("#password").val();
            var password_1 = $("#password_1").val();
            if (password === password_1)
            {

                $("#risultato10").html('Ok!') && $("#password_1").css("background-color", "whitesmoke");
            } else {
                $("#risultato10").html('ATTENZIONE: Le password non coincidono!') && $("#password_1").css("background-color", "#e0ab80");
            }
        });
    }

}


function validazionefilm(id) {

    var tmp2 = $("#" + id).val();
    if (tmp2 !== "") {
        

        if (id == 'titolo')
        {
           var pattern = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/;
            if (tmp2.match(pattern)) {
                $("#" + "risultatofilm1").html("") && $("#titolo").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultatofilm1").html("Il titolo non pu&ograve contentere caratteri speciali!") && $("#titolo").css("background-color", "#e0ab80");

            }
        }
        
           if (id == 'autore')
        {
           var pattern = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/;
            if (tmp2.match(pattern)) {
                $("#" + "risultatofilm2").html("") && $("#autore").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultatofilm2").html("L'autore non pu&ograve contentere caratteri speciali e numeri!") && $("#autore").css("background-color", "#e0ab80");

            }
        }
        
           if (id == 'durata')
        {
           var pattern =  /^[0-9]{1,3}$/;
            if (tmp2.match(pattern)) {
                $("#" + "risultatofilm3").html("") && $("#durata").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultatofilm3").html("La durata dev'essere indicata in minuti") && $("#durata").css("background-color", "#e0ab80");

            }
        }
        
            if (id == 'genere')
        {
           var pattern = /^([a-zA-Z]\s?)+$/;
            if (tmp2.match(pattern)) {
                $("#" + "risultatofilm5").html("") && $("#genere").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultatofilm5").html("Il genere non pu&ograve contentere caratteri speciali e numeri!") && $("#genere").css("background-color", "#e0ab80");

            }
        }
        
                    
          if (id === 'codice')
        {
            var patternprimalettera=/^([a-zA-Z])$/;
           var pattern = /^([a-zA-Z0-9]\s?)+$/;
          
           
            if (tmp2.substring(0).match(patternprimalettera)||tmp2.match(pattern)) {
                $("#" + "risultatofilm7").html("") && $("#codice").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultatofilm7").html("Il codice pu&ograve contenere solo numeri e lettere e il primo carattere deve essere una lettera") && $("#codice").css("background-color", "#e0ab80");

            }
        }
        }
    }