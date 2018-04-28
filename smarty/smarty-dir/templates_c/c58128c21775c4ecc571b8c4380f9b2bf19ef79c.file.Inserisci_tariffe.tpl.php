<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:21:18
         compiled from ".\smarty\smarty-dir\templates\Inserisci_tariffe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91854083d1e3bf4d4-34840861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c58128c21775c4ecc571b8c4380f9b2bf19ef79c' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Inserisci_tariffe.tpl',
      1 => 1409354412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91854083d1e3bf4d4-34840861',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54083d1e3e1d59_51076582',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54083d1e3e1d59_51076582')) {function content_54083d1e3e1d59_51076582($_smarty_tpl) {?>Modifica Tariffe:<br><br>

Prezzo biglietto per adulti:  <input type="number" min="00" max="20" id="intero_adulto" size="2" value="00" >,<input type="number" id="cent_adulto" min="00" max="99" value='00' size='2'>€<br>
Prezzo biglietto ridotto: <input type="number" min="00" max="20" id="intero_ridotto" size="2" value="00">,<input type="number" id="cent_ridotto" min="00" max="99" value='00' size='2'>€<br>

<input type="submit" id="inviatariffe" value="Invia" onclick="subtariffe(gettariffe());">

<?php }} ?>
