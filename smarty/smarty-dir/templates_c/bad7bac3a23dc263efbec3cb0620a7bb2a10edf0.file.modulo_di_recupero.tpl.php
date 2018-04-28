<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:25:15
         compiled from ".\smarty\smarty-dir\templates\modulo_di_recupero.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2470054083e0be1cd57-03333193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bad7bac3a23dc263efbec3cb0620a7bb2a10edf0' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\modulo_di_recupero.tpl',
      1 => 1409648141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2470054083e0be1cd57-03333193',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54083e0be49452_11957595',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54083e0be49452_11957595')) {function content_54083e0be49452_11957595($_smarty_tpl) {?><div id="boxext"><div id="modulorecupero">
    
    Riempire tutti i campi selezionando il campo che si vuole recuperare:<br>
    Se desideri recuperare l'<b>Username</b>, seleziona l'username e inserisci la password e l'email di registrazione.<br>
    Se desideri recuperare la <b>Password</b>, seleziona la password inserisci l'username e l'email di registrazione.<br>
    <br>
    <fieldset>
        Seleziona il dato da recuperare:
        <br><label>Username: </label><input type="radio" id="recuser" name="recdati" value="username" onchange="disabledTextAreaUser();">
    <br><label>Password: </label><input type="radio" id="recpass" name="recdati" value="password" onchange="disabledTextAreaPass();"><br>
    <br>Completa i seguenti campi<br>
    <br><input type="text" id="recpasstxt" placeholder="password" disabled="disabled"><br>
    <input type="text" id="recusertxt" placeholder="username" disabled="disabled"><br></fieldset>
    <br><label>Email: </label><input type="text" id="recmail" name="email">  ATTENZIONE!!! Va inserita esclusivamente la mail con la quale ti sei registrato.
   <div class="hidden" id="loading"> <br><br></div><input id="inviarec" type="submit" value="Invia" name="inviarec" onclick="subdatirec(getdatirec());"/>
</div></div><?php }} ?>
