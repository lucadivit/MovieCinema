<?php /* Smarty version Smarty-3.1.18, created on 2014-09-02 22:24:56
         compiled from ".\smarty\smarty-dir\templates\Contatti.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2143854062798b5fe21-94582347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8474390bd958b233961c40846e6e8442f96afb01' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Contatti.tpl',
      1 => 1409689435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2143854062798b5fe21-94582347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contatore' => 0,
    'i' => 0,
    'address' => 0,
    'nomi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54062798d53e92_42429708',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54062798d53e92_42429708')) {function content_54062798d53e92_42429708($_smarty_tpl) {?>
<div id="boxext">
<div id="sx">
    <h1>Contattaci</h1>

<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['contatore']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['contatore']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
    <ul><li>
            <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['address']->value[$_smarty_tpl->tpl_vars['i']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['nomi']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</a>
        </li></ul>
<?php }} ?>
</div>
<div id="dx">
    <h1>Dove siamo</h1>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23593.45872118791!2d13.368659765841953!3d42.33863568208627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132fd2694672d90d%3A0xc79ecfcb1eb4ba78!2sUniversit%C3%A0+degli+Studi+L&#39;Aquila+-+Facolt%C3%A0+Ingegneria!5e0!3m2!1sit!2sit!4v1409684988500" width="550" height="300" frameborder="0" style="border:0"></iframe>
</div><?php }} ?>
