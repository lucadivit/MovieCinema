<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 20:44:48
         compiled from ".\smarty\smarty-dir\templates\ElencoFilm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6914540761a0d94fe2-68047336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44dea7c9250d1eb9bc58793fcb64ff28b13256eb' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\ElencoFilm.tpl',
      1 => 1409647702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6914540761a0d94fe2-68047336',
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
  'unifunc' => 'content_540761a12717d4_03382111',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540761a12717d4_03382111')) {function content_540761a12717d4_03382111($_smarty_tpl) {?><div id="boxext"><div id="elenco">
    <h2>COMMENTA E VOTA</h2>
    <h4>Scegli il film che vuoi votare e commentare!</h4><br><br>
    <ul>
<?php if ($_smarty_tpl->tpl_vars['Titolo']->value) {?>
  <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['contatore']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['contatore']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
    
     
      <li> <a href="#" onclick="sendtitolo(<?php echo $_smarty_tpl->tpl_vars['elenco']->value[$_smarty_tpl->tpl_vars['i']->value]['codice_film'];?>
);"> <div id=<?php echo $_smarty_tpl->tpl_vars['Titolo']->value[$_smarty_tpl->tpl_vars['i']->value];?>
><?php echo $_smarty_tpl->tpl_vars['Titolo']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</div><br>
 </a><div id="<?php echo $_smarty_tpl->tpl_vars['elenco']->value[$_smarty_tpl->tpl_vars['i']->value]['codice_film'];?>
" class='hidden'><?php echo $_smarty_tpl->tpl_vars['elenco']->value[$_smarty_tpl->tpl_vars['i']->value]['codice_film'];?>
</div>
</li>

     <?php }} ?>

<?php } else { ?>
     Non sono presenti film sul database!
    
     
 <?php }?>
 
 
   </ul>

</div>
</div><?php }} ?>
