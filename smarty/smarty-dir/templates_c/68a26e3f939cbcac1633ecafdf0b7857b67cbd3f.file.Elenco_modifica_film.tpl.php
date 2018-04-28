<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:24:07
         compiled from ".\smarty\smarty-dir\templates\Elenco_modifica_film.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2894754083dc72778b6-80968884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68a26e3f939cbcac1633ecafdf0b7857b67cbd3f' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Elenco_modifica_film.tpl',
      1 => 1409648968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2894754083dc72778b6-80968884',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Titolo' => 0,
    'contatore' => 0,
    'i' => 0,
    'elenco' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54083dc72bed52_42685969',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54083dc72bed52_42685969')) {function content_54083dc72bed52_42685969($_smarty_tpl) {?><div id="boxext"><div id="elenco">
    <h2>MODIFICA FILM</h2>
    <h4>Scegli il film che vuoi modificare</h4><br><br>
    <ul>
<?php if ($_smarty_tpl->tpl_vars['Titolo']->value) {?>
  <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['contatore']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['contatore']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
    
     
      <li> <a href="#" onclick="sendcodice('', <?php echo $_smarty_tpl->tpl_vars['elenco']->value[$_smarty_tpl->tpl_vars['i']->value]['codice_film'];?>
, 'registrazione', 'modificafilmtpl');"> <div id=<?php echo $_smarty_tpl->tpl_vars['Titolo']->value[$_smarty_tpl->tpl_vars['i']->value];?>
><?php echo $_smarty_tpl->tpl_vars['Titolo']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</div> </a></li><br>
        <div id="<?php echo $_smarty_tpl->tpl_vars['elenco']->value[$_smarty_tpl->tpl_vars['i']->value]['codice_film'];?>
" class="hidden"><?php echo $_smarty_tpl->tpl_vars['elenco']->value[$_smarty_tpl->tpl_vars['i']->value]['codice_film'];?>
</div>
     <?php }} ?>

<?php } else { ?>
     Non sono presenti film sul database!
    
     
 <?php }?>
 
 
   </ul>

</div></div><?php }} ?>
