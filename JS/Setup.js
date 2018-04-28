function registra_admin(){
     $("#submit").remove();
     $("#loading").removeAttr("class");
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
         
            controller: 'RegistrazioneAdmin'
            }, //controller e task

        success: function(data) {
            $("#contenitore").html(data);
        }
    });
}

function avanti(contr){
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
           
            controller: contr,
            }, //controller e task

        success: function(data) {
            $("#contenitore").html(data);
        }
    });
}

function registra_db(){
     $("#createdb").remove();
     $("#loading").removeAttr("class");
     $.ajax({
        url: "index.php",
        type: "post",
        data: {
            host: $('#host').val(),
            password: $('#password').val(),
            password_1: $('#password_1').val(),
            userid: $('#userid').val(),
            nomedb: $('#nomedb').val(),
           hostmail:$('#hostmail').val(),
           usermail:$('#usermail').val(),
           passmail:$('#passmail').val(),
            controller: 'passodue'
            }, //controller e task

        success: function(data) {
            $("#contenitore").html(data);
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
           
            controller: 'ImpostaTariffe'}, //controller e task

        success: function(data) {
            $("#contenitore").html(data);
        }
    });
    
}

function setupcomplete(){
     $("#setupcomplete").remove();
     $("#loading").removeAttr("class");
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
          
            controller: 'Benvenuto'}, //controller e task

        success: function(data) {
            window.location.replace('http://localhost/PhpProject2/index.php');
        }
    });
}



function validazione(id) {

    var tmp2 = $("#" + id).val();
    if (tmp2 != "") {
         if (id == 'host')
        {
            var pattern = /^[0-9a-zA-Z\_\-]{2,20}$/; //lettere, numeri, e i simboli _ -
            if (tmp2.match(pattern)) {
                $("#" + "risultato8").html("") && $("#host").css("background-color", "whitesmoke");
            } else {
                $("#" + "risultato8").html("Host non valido") && $("#host").css("background-color", "#e0ab80");

            }
        }

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