<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:24:12
         compiled from ".\smarty\smarty-dir\templates\Elenco_Film_Delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:801654083dcc607755-78830992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fa27d235c1a814d6bb9fef529f2f428ef8d7135' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Elenco_Film_Delete.tpl',
      1 => 1409647737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '801654083dcc607755-78830992',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dati' => 0,
    'eliminazione' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54083dcc648097_78801292',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54083dcc648097_78801292')) {function content_54083dcc648097_78801292($_smarty_tpl) {?><div id="elenco">
    <div id="boxext"> <h2>ELIMINA FILM</h2>
    <h4>Una volta eliminato, non sarà più possibile recuperare il film in alcun modo</h4><br><br>
<?php if ($_smarty_tpl->tpl_vars['dati']->value) {?>
  <?php  $_smarty_tpl->tpl_vars['eliminazione'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['eliminazione']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dati']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['eliminazione']->key => $_smarty_tpl->tpl_vars['eliminazione']->value) {
$_smarty_tpl->tpl_vars['eliminazione']->_loop = true;
?>
      <ul>
        <li> <a href="#" onclick="erasefilm('<?php echo $_smarty_tpl->tpl_vars['eliminazione']->value['codice_film'];?>
');"> <div id=<?php echo $_smarty_tpl->tpl_vars['eliminazione']->value['titolo'];?>
><?php echo $_smarty_tpl->tpl_vars['eliminazione']->value['titolo'];?>
 (codice: <?php echo $_smarty_tpl->tpl_vars['eliminazione']->value['codice_film'];?>
) 
                </div></a></li><br>
                <a href="Elenco_Film_Delete.tpl"></a>
 <div id="finestra3" class='wind' title="ATTENZIONE!">
        <p>Sei sicuro di voler eliminare definitivamente <?php echo $_smarty_tpl->tpl_vars['eliminazione']->value['titolo'];?>
? Dopo l'eliminazione non sarà più possibile recuperare il film!</p>
   </div>
     </ul>
  

     <?php } ?>
 <?php } else { ?>
     Non sono presenti film sul database!
    
     
 <?php }?>



            
            
</div></div><?php }} ?>
