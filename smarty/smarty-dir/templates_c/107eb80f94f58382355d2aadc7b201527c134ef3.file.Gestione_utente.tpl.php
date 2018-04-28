<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 21:22:03
         compiled from ".\smarty\smarty-dir\templates\Gestione_utente.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2031654076a5b6618a6-17205640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '107eb80f94f58382355d2aadc7b201527c134ef3' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Gestione_utente.tpl',
      1 => 1409354360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2031654076a5b6618a6-17205640',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Utente' => 0,
    'biglietti' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54076a5b709845_49688813',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54076a5b709845_49688813')) {function content_54076a5b709845_49688813($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['Utente']->value) {?>
<div id="evidenza"><?php echo $_smarty_tpl->tpl_vars['Utente']->value['username'];?>
</div><br><br>
<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['Utente']->value['username'];?>
" class="hidden" id="ut_nascosto">
<a href="#" onclick="eraseuser(getusererase());"><img src="./immagini/cancella.jpg" alt="elimina" id="eliminautente" class='opzut'>Elimina </a><br>
<a href="#" onclick="scrivimail();"><img src="./immagini/email.jpg" alt="contatta" id="contattautente" class='opzut'>Scrivi un'e-mail </a> <br>
<a href="#" onclick="recuperainfoutenti(getusererase());"><img src="./immagini/index.jpg" alt="contatta" id="index" class='opzut'>Visualizza informazioni personali</a><br>
<?php } else { ?>
     La Sua ricerca non ha prodotto risultati! Provi ad affettuare una nuova ricerca!
    
     
 <?php }?>

 <div id="finestra" class='wind' title="ATTENZIONE!">
        <p>Sei sicuro di voler eliminare definitivamente <?php echo $_smarty_tpl->tpl_vars['Utente']->value['username'];?>
 ? Dopo l'eliminazione non sarà più possibile recuperare l'account!</p>
    </div>
    
    <div id="numbiglietti" class='wind' title='Numero Biglietti'>
        <p> Il numero di biglietti acquistati da <?php echo $_smarty_tpl->tpl_vars['Utente']->value['username'];?>
 è <?php echo $_smarty_tpl->tpl_vars['biglietti']->value;?>
</p>
    </div>
    
    <?php }} ?>
