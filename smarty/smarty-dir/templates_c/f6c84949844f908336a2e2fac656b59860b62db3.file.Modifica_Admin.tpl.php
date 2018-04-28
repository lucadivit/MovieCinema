<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:19:33
         compiled from ".\smarty\smarty-dir\templates\Modifica_Admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2901654083cb58381a9-73619272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6c84949844f908336a2e2fac656b59860b62db3' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Modifica_Admin.tpl',
      1 => 1409647912,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2901654083cb58381a9-73619272',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datiadmin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54083cb586ed14_34166263',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54083cb586ed14_34166263')) {function content_54083cb586ed14_34166263($_smarty_tpl) {?><div id="boxext"><fieldset>
    <label>Username:</label> <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['datiadmin']->value['username'];?>
" id="username" placeholder="Username" size="20" maxlength="40" onchange="validazione('username');"><div id="risultato1"></div><br>
    <label>Nuova Password:</label> <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['datiadmin']->value['password'];?>
" id="password" placeholder="Nuova Password" size="20" maxlength="40" onchange="validazione('password');" onclick="checkpass();"><div id="risultato2"></div><br>
    <label>Conferma Password:</label> <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['datiadmin']->value['password'];?>
" id="password_1" placeholder="Conferma Password" size="20" maxlength="40" onchange="validazione('password');"><div id="risultato10"></div><br>
    <label>E-Mail:</label><input type="text" id="email" size="40" value="<?php echo $_smarty_tpl->tpl_vars['datiadmin']->value['email'];?>
" maxlength="40" placeholder="Inserisci indirizzo e-mail" onchange="validazione('email');"><div id="risultato8"></div><br>
    <label>Nome:</label><input type="text" placeholder="Nome" size="20" maxlength="40" value="<?php echo $_smarty_tpl->tpl_vars['datiadmin']->value['nome'];?>
" id="nome" onchange="validazione('nome');"><div id="risultato3"></div><br>
    <label>Cognome:</label><input type="text" id="cognome" size="20" maxlength="40" value="<?php echo $_smarty_tpl->tpl_vars['datiadmin']->value['cognome'];?>
" placeholder="Cognome" onchange="validazione('cognome');"><div id="risultato4"></div><br>
    <script type="text/javascript" src="./JS/dtpk.js"></script>
    <div id="anim"><label>Data di nascita:</label><input type="text" id="data_nascita" value="<?php echo $_smarty_tpl->tpl_vars['datiadmin']->value['data_nascita'];?>
" size="20" maxlength="20" onchange="validazione('data_nascita');"></div><div id="risultato9"></div><br>
    <br>
    <input type="submit" id="submit" value="Invia" onclick="subdatiadmin(getdatiadmin());"> 
</fieldset>
</div><?php }} ?>
