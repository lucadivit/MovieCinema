<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:35:39
         compiled from ".\smarty\smarty-dir\templates\Modifica_Carta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:298485408407b037eb8-76809911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aac0a9f861f9254fe853cfa437220747bc160df4' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Modifica_Carta.tpl',
      1 => 1409655729,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '298485408407b037eb8-76809911',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'daticarta' => 0,
    'dati_errati' => 0,
    'error_msg' => 0,
    'data_split' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5408407b0b00b8_68880477',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5408407b0b00b8_68880477')) {function content_5408407b0b00b8_68880477($_smarty_tpl) {?><div id="carta">

    <fieldset>
        <div id="dati">Dati Carta di Credito:<br></div>
        <input type="text" id="task" class="hidden" value="<?php echo $_smarty_tpl->tpl_vars['daticarta']->value['task'];?>
" size="20" maxlength="40">
        <input type="text" class="hidden" id="username" value="<?php echo $_smarty_tpl->tpl_vars['daticarta']->value['username'];?>
" size="20" maxlength="40"><div id="risultato1"></div><br>
        <label>Numero carta di credito:</label><input type="text" id="numero_carta" size="16" maxlength="16" placeholder="carta di credito" value="<?php if (isset($_smarty_tpl->tpl_vars['daticarta']->value['numero_carta'])) {?><?php echo $_smarty_tpl->tpl_vars['daticarta']->value['numero_carta'];?>
<?php }?>" onchange="validazione('numero_carta');" readonly><img src="./immagini/index.jpg" alt="contatta" id="index" class='opzut' onclick="modifica('numero_carta');"><div id="risultato11"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value)) {?><?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['numero_carta']=="TRUE") {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['numero_carta'];?>
 <?php }?><?php }?></div><br>
        <?php if (isset($_smarty_tpl->tpl_vars['daticarta']->value['data_scadenza'])) {?><?php $_smarty_tpl->tpl_vars["data_split"] = new Smarty_variable(explode("-",$_smarty_tpl->tpl_vars['daticarta']->value['data_scadenza']), null, 0);?><?php }?>
        
        <label>Data di scadenza:</label> <input type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['data_split']->value[1])) {?><?php echo $_smarty_tpl->tpl_vars['data_split']->value[1];?>
<?php }?>" id="data_scadenza_m" size="2" maxlength="2" placeholder="mm"> / <input type="text" id="data_scadenza_a" size="4" maxlength="4"  value="<?php if (isset($_smarty_tpl->tpl_vars['data_split']->value[0])) {?><?php echo $_smarty_tpl->tpl_vars['data_split']->value[0];?>
<?php }?>" placeholder="aaaa"><div id="risultato13"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value)) {?><?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['data_scadenza']=="TRUE") {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['data_scadenza'];?>
 <?php }?><?php }?></div><br>
        <label>CVV: </label><input type="text" id="credit_validation_value" value="<?php if (isset($_smarty_tpl->tpl_vars['daticarta']->value['credit_validation_value'])) {?><?php echo $_smarty_tpl->tpl_vars['daticarta']->value['credit_validation_value'];?>
<?php }?>" size="4" maxlength="4" placeholder="CVV" onchange="validazione('credit_validation_value');" readonly><img src="./immagini/index.jpg" alt="contatta" id="index" class='opzut' onclick="modifica('credit_validation_value');"><div id="risultato12"><?php if (isset($_smarty_tpl->tpl_vars['dati_errati']->value)) {?><?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['credit_validation_value']=="TRUE") {?> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value['credit_validation_value'];?>
 <?php }?><?php }?></div><br><br>
    </fieldset>

    <br>
    <br> 

    <div id="bottone"> 
        <input type="submit" id="submit" value="Invia" onclick="subdaticartanew(getdaticarta());"> 
    </div>
</div>
    
  <?php }} ?>
