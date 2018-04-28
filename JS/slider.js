var timeout;
var slideron=0;
var durataslide=4000;
var duratafade=1000;
/*avia lo slider del banner nella home'*/
$(document).ready(function(){
 
    setTimeout(function(){contatore();},durataslide);
});

/*funzione che ricorsiva che funge da motore per lo slider, inoltre si occupa di creare la transizione
 *tre l'immagine attuale e quella che la succede*/
    function cambiaimmagine()
    {
        indicesucc=parseInt($('#indiceimmagini').attr('value'))+1;
   
         if(indicesucc>=0 && indicesucc<$('#dati').children('input').length){
            imgsucc=$($('#dati').children('input').get(indicesucc)).val();
        }else if(indicesucc<0){
            indicesucc=$('#dati').children('input').length-1;
            imgsucc=$($('#dati').children('input').get(indicesucc)).val();
        }else{
            indicesucc=0;
            imgsucc=$($('#dati').children('input').get(indicesucc)).val();
        }
        $('#indiceimmagini').attr('value',indicesucc);
        $("#imgattuale").animate({'opacity': '0'},duratafade,function(){$('#imgsucc').css('background-image',"url('"+imgsucc+"')")}).attr('id','contTit');
        $("#imgsucc").animate({'opacity': '1'},duratafade).attr('id','imgattuale');
        $("#titoloattuale").html($($('#titoli').children('input').get(indicesucc-1)).val());
        $("#star").attr('src',"./immagini/"+$($('#stelle').children('input').get(indicesucc-1)).val()+"star.png");
        $('#contTit').attr('id','imgsucc');

        timeout=setTimeout(function(){cambiaimmagine()},durataslide);
    }
    
    
/*funzione che avvia o ferma la funzione ricorsiva*/
    function contatore()
    {
        if (!slideron){
            slideron=1;
            cambiaimmagine();
          }else{
            clearTimeout(timeout);
            slideron=0;
        }
    }