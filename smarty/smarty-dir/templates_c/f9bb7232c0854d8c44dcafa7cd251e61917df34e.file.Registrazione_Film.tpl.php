<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:24:17
         compiled from ".\smarty\smarty-dir\templates\Registrazione_Film.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2592954083dd100e8a6-87917099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9bb7232c0854d8c44dcafa7cd251e61917df34e' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Registrazione_Film.tpl',
      1 => 1409648027,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2592954083dd100e8a6-87917099',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54083dd103b503_88836147',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54083dd103b503_88836147')) {function content_54083dd103b503_88836147($_smarty_tpl) {?><div id="boxext">
    <fieldset>
        <div id="dati_film">

            <input type="text" id="titolo" size="40" maxlength="40" placeholder="Titolo" onchange="validazionefilm('titolo')"><div id="risultatofilm1"></div><br>
            <input type="text" id="autore" size="40" maxlength="30" placeholder="Autore" onchange="validazionefilm('autore')"><div id="risultatofilm2"></div><br>
            <input type="text" id="durata" size="40" maxlength="4" placeholder="Durata in minuti" onchange="validazionefilm('durata')"><div id="risultatofilm3"></div><br>
            <textarea id="trama" rows="6" cols="45" placeholder="Inserisci trama:" maxlength="2048" onchange="validazionefilm('trama')"></textarea><div id="risultatofilm4"></div><br>
            <input type="text" id="genere" size="40" maxlength="40" placeholder="Genere:" onchange="validazionefilm('genere')"><div id="risultatofilm5"></div><br>
            <input type="text" id="codice" size="40" maxlength="40" placeholder="Codice Film:" onchange="validazionefilm('codice')"><div id="risultatofilm7"></div><br>


<a>Sfoglia</a>

    <input type="file" name="upl" id="upl">

    <span id="stato"></span>

    <div class="elemento">
    <div class="hidden" id="loading"> <br><br></div><input type="submit" id="caricalocandina" value="Carica" onclick="upload('registrazione', 'creafilm');">
    </div>

                  </div>
    </fieldset>


</div><?php }} ?>
