<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 01:21:15
         compiled from ".\smarty\smarty-dir\templates\Primo_Accesso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3952540650ebd6f7f5-55682887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '958c2f6034b361c6aa01452c45af88f9e17a9ca8' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Primo_Accesso.tpl',
      1 => 1409608994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3952540650ebd6f7f5-55682887',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540650ebdc1874_06855936',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540650ebdc1874_06855936')) {function content_540650ebdc1874_06855936($_smarty_tpl) {?><div id="primoac">
    <br><br>
    Imposta la tua password: La password dev'essere minimo otto caratteri, deve essere presente almeno una lettera maiuscola e un numero<br><br>
<img src="./immagini/popcorn22.gif" id="asterisco"><label>Password:</label> <input type="password" id="password" value="Valentina88" placeholder="Password" size="20" maxlength="40" onchange="validazione('password');" onclick="checkpass();"><div id="risultato2"></div><br>
<img src="./immagini/popcorn22.gif" id="asterisco"><label>Conferma Password:</label> <input type="password" value="Valentina88" id="password_1" placeholder="Conferma Password" size="20" maxlength="40" onchange="validazione('password');"><div id="risultato10"></div><br>

<input type="submit" id="primoaccesso" value="entra" onclick="cambiapassword();">
</div><?php }} ?>
