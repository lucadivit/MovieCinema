<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 20:47:16
         compiled from ".\smarty\smarty-dir\templates\Elenco_Acquisto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144095407623474acc5-85717636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aea3641a2acb3d377cd785bbc406885e94437af0' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Elenco_Acquisto.tpl',
      1 => 1409647717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144095407623474acc5-85717636',
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
  'unifunc' => 'content_5407623483e8c9_05869334',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5407623483e8c9_05869334')) {function content_5407623483e8c9_05869334($_smarty_tpl) {?><div id="boxext"><div id="elenco">
      <h2>ACQUISTA UN BIGLIETTO!</h2>
    <h4>Scegli uno dei seguenti film! Ti ricordiamo che ogni 4 biglietti
        acquistati ne riceverai subito uno in omaggio da utilizzare per la prossima 
        volta che verrai a trovarci per uno qualsiasi dei film in programmazione!</h4><br><br><ul>
<?php if ($_smarty_tpl->tpl_vars['Titolo']->value) {?>
  <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['contatore']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['contatore']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
    
     
      <li> <a href="#" onclick="sendtitolo2('<?php echo $_smarty_tpl->tpl_vars['elenco']->value[$_smarty_tpl->tpl_vars['i']->value]['codice_film'];?>
','<?php echo $_smarty_tpl->tpl_vars['Titolo']->value[$_smarty_tpl->tpl_vars['i']->value];?>
', 'acquisto', 'sendacquisto');"> <div id=<?php echo $_smarty_tpl->tpl_vars['Titolo']->value[$_smarty_tpl->tpl_vars['i']->value];?>
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

</div>
</div><?php }} ?>
