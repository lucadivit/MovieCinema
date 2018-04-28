<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:24:42
         compiled from ".\smarty\smarty-dir\templates\Email_Admin_tutti.tpl" */ ?>
<?php /*%%SmartyHeaderCode:292754083dea3846f1-61934570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27588d62ee8d15b65dfd7a8d57713675ca9cc4f2' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Email_Admin_tutti.tpl',
      1 => 1409647789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292754083dea3846f1-61934570',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'elenco' => 0,
    'contatore' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54083dea3bf4e9_26922577',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54083dea3bf4e9_26922577')) {function content_54083dea3bf4e9_26922577($_smarty_tpl) {?><div id="boxext">
    <?php if ($_smarty_tpl->tpl_vars['elenco']->value) {?>
<input type="checkbox" id="selezionatutto" onclick="selectall();">Seleziona tutto<br><br>

<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['contatore']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['contatore']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
<input type="checkbox" id="indirizzi" class="selezionabile" value=<?php echo $_smarty_tpl->tpl_vars['elenco']->value[$_smarty_tpl->tpl_vars['i']->value]['email'];?>
><?php echo $_smarty_tpl->tpl_vars['elenco']->value[$_smarty_tpl->tpl_vars['i']->value]['email'];?>
<br><br>
<?php }} ?>
<input type="text" id="oggetto" size="40" maxlength="40" placeholder="Oggetto"><br>
<textarea id="bodymess" rows="6" cols="45" placeholder="Inserisci il messaggio qui..." maxlength="2048"></textarea>

<div class="hidden" id="loading"> <br><br></div><input type="submit" id='inviaemail' onclick="subdatiemail(getdatiemail())" value='invia'>

<?php } else { ?>
    Non sono presenti utenti sul database!<br><br>
    
     
 <?php }?>

</div><?php }} ?>
