<?php /* Smarty version Smarty-3.1.18, created on 2014-09-02 22:54:32
         compiled from ".\smarty\smarty-dir\templates\form_setup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:697154062e8843e156-87246169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a9059e535032b5cde8107de9934baf7ab3ee4c6' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\form_setup.tpl',
      1 => 1409691220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '697154062e8843e156-87246169',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dati_errati' => 0,
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54062e884b3335_17550725',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54062e884b3335_17550725')) {function content_54062e884b3335_17550725($_smarty_tpl) {?><h1>INSTALLAZIONE - PASSO UNO</h1>
            Completare i campi sottostanti. I campi contrassegnati da <img src="./immagini/popcorn22.gif" id="asterisco"> sono obbligatori.<br><br>

            
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>Username:</label> <input type="text" id="username" placeholder="Username" size="20" maxlength="40" onchange="validazione('username');"><div id="risultato1"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value['username'])) {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['username'];?>
 <?php }?></div><br>
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>Password:</label> <input type="password" id="password" placeholder="Password" size="20" maxlength="40" onchange="validazione('password');"><div id="risultato2"></div><br>
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>Conferma Password:</label> <input type="password" id="password_1" placeholder="Conferma Password" size="20" maxlength="40" onchange="validazione('password_1');"><div id="risultato3"></div><br>
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>E-Mail:</label><input type="text" id="email" size="40" maxlength="40" placeholder="Inserisci indirizzo e-mail" onchange="validazione('email');"><div id="risultato4"></div><br>
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>Nome:</label><input type="text" placeholder="Nome" size="20" maxlength="40" id="nome" onchange="validazione('nome');"><div id="risultato5"></div><br>
     <img src="./immagini/popcorn22.gif" id="asterisco"><label>Cognome:</label><input type="text" id="cognome" size="20" maxlength="40" placeholder="Cognome" onchange="validazione('cognome');"><div id="risultato6"></div><br>
    <script type="text/javascript" src="./JS/dtpk.js"></script>
    <div id="anim"><label>Data di nascita:</label><input type="text" id="data_nascita" size="20" maxlength="20"></div><div id="risultato7"></div><br>
    <br>
    <input type="submit" id="submit" value="AVANTI >" onclick="registra_admin();"> 
        <?php }} ?>
