<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 01:18:23
         compiled from ".\smarty\smarty-dir\templates\Pagina_Guest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13354064f4b0f8732-87387948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9274c85cc5318ccfa0c571b914963a59b0e60d69' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Pagina_Guest.tpl',
      1 => 1409699873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13354064f4b0f8732-87387948',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54064f4b1b3f69_67078477',
  'variables' => 
  array (
    'Menu' => 0,
    'slider' => 0,
    'dato' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54064f4b1b3f69_67078477')) {function content_54064f4b1b3f69_67078477($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['Menu']->value;?>

<div id='ajaxcontenitore'>

        <?php if ($_smarty_tpl->tpl_vars['slider']->value) {?>
                    <?php if (count($_smarty_tpl->tpl_vars['slider']->value)>1) {?>
                        <div id="imgsucc" class="slideimg" style="background-image: url('./upload/<?php echo $_smarty_tpl->tpl_vars['slider']->value[1]['locandina'];?>
'); opacity: 0;"> </div>
                    <?php } else { ?>
                        <div id="imgsucc" class="slideimg" style="background-image: url('./upload/<?php echo $_smarty_tpl->tpl_vars['slider']->value[0]['locandina'];?>
'); opacity: 0;"> </div>

                    <?php }?> 
                    
                    <div id="imgattuale" class="slideimg" style="background-image: url('./upload/<?php echo $_smarty_tpl->tpl_vars['slider']->value[0]['locandina'];?>
'); top: -400px; opacity: 1;"> </div>
                    <div id="titoloattuale" class="slidetxt"><?php echo $_smarty_tpl->tpl_vars['slider']->value[0]['titolo'];?>
</div>
                    <img id="star" class="star" src="./immagini/<?php echo $_smarty_tpl->tpl_vars['slider']->value[0]['media'];?>
star.png">

                    <div id="dati" class="delta">
                        <div id="indiceimmagini" value="1"></div>
                        <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value) {
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
                            <input value="./upload/<?php echo $_smarty_tpl->tpl_vars['dato']->value['locandina'];?>
">

                        <?php } ?>
                    </div>
                    <div id="titoli" class="delta">
                        <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value) {
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
                            <input value="<?php echo $_smarty_tpl->tpl_vars['dato']->value['titolo'];?>
">

                        <?php } ?>
                    </div>
                    
                     <div id="stelle" class="delta">
                        <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value) {
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
                            <input value="<?php echo $_smarty_tpl->tpl_vars['dato']->value['media'];?>
">

                        <?php } ?>
                    </div>

                <?php } else { ?>
                    Non sono presenti film in programmazione!
                <?php }?>

</div><?php }} ?>
