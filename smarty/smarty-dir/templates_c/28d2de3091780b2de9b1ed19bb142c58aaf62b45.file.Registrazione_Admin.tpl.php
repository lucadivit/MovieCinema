<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 22:04:02
         compiled from ".\smarty\smarty-dir\templates\Registrazione_Admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2070540636df2f9926-90494532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28d2de3091780b2de9b1ed19bb142c58aaf62b45' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Registrazione_Admin.tpl',
      1 => 1409860768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2070540636df2f9926-90494532',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540636df37f627_42099995',
  'variables' => 
  array (
    'dati_registrazione' => 0,
    'dati_errati' => 0,
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540636df37f627_42099995')) {function content_540636df37f627_42099995($_smarty_tpl) {?>
<h1>PASSO DUE - AMMINISTRATORE PRINCIPALE</h1>
<div>Completare i campi sottostanti. I campi contrassegnati da <img src="./immagini/popcorn22.gif" id="asterisco"> sono obbligatori.<br>
</div>

<div id='sx'>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Username:</label> <br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Password:</label> <br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Conferma Password:</label><br> 
    <label><img src="./immagini/popcorn22.gif" id="asterisco">E-Mail:</label><br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Nome:</label><br>
    <label><img src="./immagini/popcorn22.gif" id="asterisco">Cognome:</label><br>
    <label>Data di nascita:</label><br>
</div>
<div id='dx'>
    <input type="text" id="username" placeholder="Username" size="20" maxlength="40" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['username'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['username'];?>
<?php }?>" onchange="validazione('username');"><div id="risultato1"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['username'])) {?> <?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['username']) {?><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['username'];?>
 <?php }?><?php }?></div>
    <input type="password" id="password" placeholder="Password" size="20" maxlength="40" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['password'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['password'];?>
<?php }?>" onchange="validazione('password');"><div id="risultato2"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['password'])) {?> <?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['password']) {?><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['password'];?>
 <?php }?> <?php }?></div>
    <input type="password" id="password_1" placeholder="Conferma Password" size="20" maxlength="40" onchange="validazione('password_1');"><div id="risultato3"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['password'])) {?> <?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['password']) {?><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['password'];?>
 <?php }?> <?php }?></div>
    <input type="text" id="email" size="40" maxlength="40" placeholder="Inserisci indirizzo e-mail" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['email'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['email'];?>
<?php }?>" onchange="validazione('email');"><div id="risultato4"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['email'])) {?> <?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['email']) {?><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['email'];?>
 <?php }?> <?php }?></div>
    <input type="text" placeholder="Nome" size="20" maxlength="40" id="nome" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['nome'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['nome'];?>
<?php }?>"  onchange="validazione('nome');"><div id="risultato5"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['nome'])) {?> <?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['nome']) {?><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['nome'];?>
 <?php }?> <?php }?></div>
    <input type="text" id="cognome" size="20" maxlength="40" placeholder="Cognome" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['cognome'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['cognome'];?>
<?php }?>" onchange="validazione('cognome');"><div id="risultato6"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['cognome'])) {?> <?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['cognome']) {?><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['cognome'];?>
 <?php }?> <?php }?></div>
    <script type="text/javascript" src="./JS/dtpk.js"></script>
    <div id="anim"><input type="text" id="data_nascita" size="20" maxlength="20" placeholder="aaaa-mm-gg" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['data_nascita'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['data_nascita'];?>
<?php }?>"></div><div id="risultato7"></div>  
</div>
<div id='tasto'>
<div class="hidden" id="loading"> <br><br></div><input type="submit" id="submit" value="AVANTI >" onclick="registra_admin();"> 
</div><?php }} ?>
