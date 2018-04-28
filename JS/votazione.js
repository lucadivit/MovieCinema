/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// faccio il preload dell'immagine utilizzata per l'effetto rollover
var stelle = 0;
var staron = new Image(); 
staron.src = "./immagini/staron.gif";

// Definisco la funzione per la votazione che verrÃ  lanciata
// all'evento onclick su una delle 5 stelle
function star_vota(QT)
{
  // Creo una variabile con l'output da restituire al momento del voto
  var star_output = '<span class="output">Hai votato ' + QT + ' stelle!</span>';
  // Cambio dinamicamente il contenuto del DIV contenitore con il messaggio di
  // conferma di votazione avvenuta
  document.getElementById('STAR_RATING').innerHTML = star_output;
return QT;
}

function valorevoto(QT){
    stelle = QT;
}

function getcommento(){

    var nome=$('#usercomm').val();
    var comm=$('#commento').val();
    var array = [];
    array['titolo']=document.getElementById('gettitolo').innerHTML;
    array['codice_film'] = document.getElementById('getcodice').innerHTML;
    array['commento'] = nome+": "+comm;
    array['voto'] = stelle;
    return array;
}
function subcommento(dati) {

  $("#submit").remove();
     $("#loading").removeAttr("class");
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            titolo: dati['titolo'],
            codice_film: dati['codice_film'],
            commento: dati['commento'],
            voto: dati['voto'],
            controller: 'registrazione',
            task: 'registracommento'}, //controller e task

        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });
}

// Definisco la funzione per "accendere" dinamicamente le stelle
// unico argomento Ã¨ il numero di stelle da accendere
function star_accendi(QT)
{
  // verifico che esistano i DIV delle stelle
  // se il DIV non esiste significa che si Ã¨ giÃ  votato
  if (document.getElementById('star_1'))
  {
    // Ciclo tutte e 5 i DIV contenenti le stelle
    for (i=1; i<=5; i++)
    {
      // se il div Ã¨ minore o uguale del numero di stelle da accendere
      // imposto dinamicamente la classe su "on"
      if (i<=QT) document.getElementById('star_' + i).className = 'on';
      // in caso contrario spengo la stella...
      else document.getElementById('star_' + i).className = '';
    }
  }
}

// Questa Ã¨ la funzione che produce l'output.
// richiede come unico argomento il numero di stelle che si vuole accendere
// di default (possiamo in questo, ad esempio, modo mostrare il voto ottenuto
// nelle precedenti votazioni)
/*function star(QT)
{
  // stampo il codice HTML che produce le stelle
  document.write('<div id="STAR_RATING" onmouseout="star_accendi(' + QT + ')""><ul>');
  document.write('<li id="star_1" onclick="star_vota(1)" onmouseover="star_accendi(0); star_accendi(1)"></li>');
  document.write('<li id="star_2" onclick="star_vota(2)" onmouseover="star_accendi(0); star_accendi(2)"></li>');
  document.write('<li id="star_3" onclick="star_vota(3)" onmouseover="star_accendi(0); star_accendi(3)"></li>');
  document.write('<li id="star_4" onclick="star_vota(4)" onmouseover="star_accendi(0); star_accendi(4)"></li>');
  document.write('<li id="star_5" onclick="star_vota(5)" onmouseover="star_accendi(0); star_accendi(5)"></li>');
  document.write('</ul></div>');
  // accendo le stelle definite in argomento
  star_accendi(QT);
}*/