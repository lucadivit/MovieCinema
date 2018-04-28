<?php /* Smarty version Smarty-3.1.18, created on 2014-09-02 23:46:44
         compiled from ".\smarty\smarty-dir\templates\Ricerca_utenti.tpl" */ ?>
<?php /*%%SmartyHeaderCode:786754063ac4797d31-27556276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e47b303718dd390fad4e500762198b11816a001e' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Ricerca_utenti.tpl',
      1 => 1409354560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '786754063ac4797d31-27556276',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54063ac4799232_12586091',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54063ac4799232_12586091')) {function content_54063ac4799232_12586091($_smarty_tpl) {?><div id="ricerca">
    <input type="text" id="cercautente" placeholder="Cerca utente..." size="20" maxlength="40"> <a href="#"><img src="./immagini/lente.jpg" id="lente" onclick="subsearch(getusersearch());"></a>
</div>
<?php }} ?>
