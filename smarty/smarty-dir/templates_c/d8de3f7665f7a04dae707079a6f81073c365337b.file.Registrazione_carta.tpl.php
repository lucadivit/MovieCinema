<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 21:49:40
         compiled from ".\smarty\smarty-dir\templates\Registrazione_carta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2252540770d4452c17-89799424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8de3f7665f7a04dae707079a6f81073c365337b' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Registrazione_carta.tpl',
      1 => 1409607997,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2252540770d4452c17-89799424',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540770d4516111_20864084',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540770d4516111_20864084')) {function content_540770d4516111_20864084($_smarty_tpl) {?>Controlla la tua e-mail, riceverai la password per il primo accesso!
Registra anche la tua carta di credito, altrimenti non potrai fare acquisti! Puoi registrare la carta anche successivamente, dopo aver effettuato il login!
<div id="carta">

    <fieldset>
        

        <div id="dati">Dati Carta di Credito:<br></div>
        <input type="text" id="username" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
" class="hidden"><div id="risultato1"></div><br>

        <img src="./immagini/popcorn22.gif" id="asterisco"><label>Numero carta di credito:</label><input type="text" id="numero_carta" size="16" maxlength="16" placeholder="carta di credito" onchange="validazione('numero_carta');"><div id="risultato11"></div><br>

        <img src="./immagini/popcorn22.gif" id="asterisco"><label>Data di scadenza:</label> <input type="text" value="09" id="data_scadenza_m" size="2" maxlength="2" placeholder="mm"> / <input type="text" id="data_scadenza_a" size="4" maxlength="4"  value="2018" placeholder="aaaa"><br>

        <img src="./immagini/popcorn22.gif" id="asterisco"><label>CVV: </label><input type="text" id="credit_validation_value" value="1234" size="4" maxlength="4" onchange="validazione('credit_validation_value');"><div id="risultato12"></div><br><br>
    </fieldset>

    <br>
    <br> 

    <div id="bottone"> 
        <input type="submit" id="submit" value="Invia" onclick="sendformcarta(getdaticarta(), 'registrazione', 'registracarta');"> 
        <input type="submit" id="submitnocarta" value="Salta" onclick="ajaxmenucontrtask('registrazione', 'saltaproceduracarta');"> 
    </div>
</div><?php }} ?>
