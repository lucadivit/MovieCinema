<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 22:23:17
         compiled from ".\smarty\smarty-dir\templates\listautenti.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169845406440630e4b2-80066400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ae95a67d6fd2e3e064015c87731c7441d7ae5c5' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\listautenti.tpl',
      1 => 1409775707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169845406440630e4b2-80066400',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54064406350886_41078857',
  'variables' => 
  array (
    'lista' => 0,
    'utente' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54064406350886_41078857')) {function content_54064406350886_41078857($_smarty_tpl) {?><div id="boxext"> 
    <ul>
        <?php if ($_smarty_tpl->tpl_vars['lista']->value) {?>
            <?php  $_smarty_tpl->tpl_vars['utente'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['utente']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['utente']->key => $_smarty_tpl->tpl_vars['utente']->value) {
$_smarty_tpl->tpl_vars['utente']->_loop = true;
?>


                <li> <a href="#" onclick="lista('<?php echo $_smarty_tpl->tpl_vars['utente']->value['username'];?>
');"> <div id=<?php echo $_smarty_tpl->tpl_vars['utente']->value['username'];?>
><?php echo $_smarty_tpl->tpl_vars['utente']->value['username'];?>
</div>
                </li>

            <?php } ?>

        <?php } else { ?>
            Non sono presenti utenti sul database!


        <?php }?>


    </ul>

</div>
        <?php }} ?>
