<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 22:03:29
         compiled from ".\smarty\smarty-dir\templates\Db_Setup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27744540786de15d913-42434087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78da37c48fb20a11c3c456a4c812a41664be096c' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Db_Setup.tpl',
      1 => 1409860768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27744540786de15d913-42434087',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540786de33e100_42958258',
  'variables' => 
  array (
    'dati_registrazione' => 0,
    'dati_errati' => 0,
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540786de33e100_42958258')) {function content_540786de33e100_42958258($_smarty_tpl) {?>
<h1>PASSO UNO - DATI DI ACCESSO AL DATABASE</h1>
<div id='sx'>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Host:</label> <br>
    <label>&nbsp; &nbsp; &nbsp; Password db:</label> <br>
    <label>&nbsp; &nbsp; &nbsp; Conferma Password db: </label><br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Userid db:</label><br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Nome DataBase:</label><br>
</div>
<div id='dx'>
    <input type="text" id="host" size="20" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['host'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['host'];?>
<?php }?>" onchange="validazione('host');"><div id="risultato8"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['host'])) {?> <?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['host']) {?><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['host'];?>
 <?php }?><?php }?></div>
    <input type="text" id="password" size="20" value="" onchange="validazione('password');"><div id="risultato2"></div>
    <input type="text" id="password_1" size="20" value="" onchange="validazione('password_1');"><div id="risultato3"></div>
    <input type="text" id="userid" size="20" value=""><div id="risultato8"></div>
    <input type="text" id="nomedb" size="20" value=""><div id="risultato8"></div>
    <br>
</div>
<div>
    Non compilare i campi sottostanti se si utilizza altervista.org<br>
    Configurazione server smtp:<br><br>
</div>
<div id='sx'>
    <label>&nbsp; &nbsp; &nbsp; Server SMTP: </label> <br>
    <label>&nbsp; &nbsp; &nbsp; Indirizzo E-mail:</label> <br>
    <label>&nbsp; &nbsp; &nbsp; Password Mail: </label><br>
</div>
<div id='dx'>
    <input type='text' id='hostmail' size="20"><br>
    <input type='usernamemail' id='usermail'><br>
    <input type='passwordmail' id='passmail'><br>   
</div>


<div class="hidden" id="loading"> <br><br></div><input type="submit" id="creadb" value="Avanti>" onclick="registra_db();">


<?php }} ?>
