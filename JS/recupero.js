/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function disabledTextAreaUser() {
    if ($('#recuser').attr('checked')) {
        $('#recpasstxt:input').removeAttr('disabled');
        $('#recusertxt:input').attr('disabled', true);
    }
}
;


function disabledTextAreaPass() {
    if ($('#recpass').attr('checked')) {
        $('#recusertxt:input').removeAttr('disabled');
        $('#recpasstxt:input').attr('disabled', true);
    }
}
;

function getdatirec() {
    var array = [];
    array['username'] = $('#recusertxt').val();
    array['password'] = $('#recpasstxt').val();
    array['email'] = $('#recmail').val();
    return array;
}

function subdatirec(dati) {
$("#inviarec").remove();
     $("#loading").removeAttr("class");
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            username: dati['username'],
            password: dati['password'],
            email: dati['email'],
            controller: 'autenticazione',
            task: 'recuperodati'
        },
        success: function(data) {
            $("#ajaxcontenitore").html(data);
        }
    });


}

/*
 * ANALOGHE ALLE PRECEDENTI
 $(document).ready(function() {
 $('#recuser').change(function() {
 if ($("#recuser").attr("checked")) {
 $('#recpasstxt:input').removeAttr('disabled');
 $('#recusertxt:input').attr('disabled', true);
 }
 });
 });
 
 $(document).ready(function() {
 $('#recpass').change(function() {
 if ($("#recpass").attr("checked")) {
 $('#recpasstxt:input').removeAttr('disabled');
 $('#recusertxt:input').attr('disabled', true);
 }
 });
 });
 */