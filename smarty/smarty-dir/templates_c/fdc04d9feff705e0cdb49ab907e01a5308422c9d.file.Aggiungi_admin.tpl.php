<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 00:45:50
         compiled from ".\smarty\smarty-dir\templates\Aggiungi_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1208154063baf376820-52926851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdc04d9feff705e0cdb49ab907e01a5308422c9d' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Aggiungi_admin.tpl',
      1 => 1409697938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1208154063baf376820-52926851',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54063baf4110a8_87881578',
  'variables' => 
  array (
    'dati_registrazione' => 0,
    'dati_errati' => 0,
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54063baf4110a8_87881578')) {function content_54063baf4110a8_87881578($_smarty_tpl) {?><div id="boxext">
Completare i campi sottostanti. I campi contrassegnati da <img src="./immagini/popcorn22.gif" id="asterisco"> sono obbligatori.<br><br>

            
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>Username:</label> <input type="text" id="username" placeholder="Username" size="20" maxlength="40" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['username'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['username'];?>
<?php }?>" onchange="validazioneadmin('username');"><div id="risultato1"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['username'])) {?> <?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['username']=='username') {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['username'];?>
 <?php }?><?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['username']=='useresistente') {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['useresistente'];?>
 <?php }?> <?php }?></div><br>
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>Password:</label> <input type="password" id="password" placeholder="Password" size="20" maxlength="40" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['password'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['password'];?>
<?php }?>" onchange="validazioneadmin('password');"><div id="risultato2"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['password'])) {?><?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['password']=="TRUE") {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['password'];?>
<?php }?> <?php }?></div><br>
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>Conferma Password:</label> <input type="password" id="password_1" placeholder="Conferma Password" size="20" maxlength="40" onchange="validazioneadmin('password_1');"><div id="risultato3"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['password'])) {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['password'];?>
 <?php }?></div><br>
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>E-Mail:</label><input type="text" id="email" size="40" maxlength="40" placeholder="Inserisci indirizzo e-mail" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['email'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['email'];?>
<?php }?>" onchange="validazioneadmin('email');"><div id="risultato4"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['email'])) {?><?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['email']=="email") {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['email'];?>
 <?php }?><?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['email']=="emailesistente") {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['emailesistente'];?>
 <?php }?><?php }?></div><br>
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>Nome:</label><input type="text" placeholder="Nome" size="20" maxlength="40" id="nome" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['nome'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['nome'];?>
<?php }?>"  onchange="validazioneadmin('nome');"><div id="risultato5"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['nome'])) {?><?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['nome']=="TRUE") {?><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['nome'];?>
 <?php }?><?php }?></div><br>
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>Cognome:</label><input type="text" id="cognome" size="20" maxlength="40" placeholder="Cognome" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['cognome'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['cognome'];?>
<?php }?>" onchange="validazioneadmin('cognome');"><div id="risultato6"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['cognome'])) {?> <?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['cognome']=="TRUE") {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['cognome'];?>
 <?php }?><?php }?></div><br>
    <script type="text/javascript" src="./JS/dtpk.js"></script>
    <div id="anim"><label>Data di nascita:</label><input type="text" id="data_nascita" size="20" maxlength="20" placeholder="aaaa-mm-gg" value="<?php if (isset($_smarty_tpl->tpl_vars['dati_registrazione']->value['data_nascita'])) {?><?php echo $_smarty_tpl->tpl_vars['dati_registrazione']->value['data_nascita'];?>
<?php }?>"></div><div id="risultato7"></div><br>
    <br>
    <input type="submit" id="submit" value="Registra" onclick="registra_admin();"> 
</div><?php }} ?>
