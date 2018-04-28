<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:25:18
         compiled from ".\smarty\smarty-dir\templates\Visualizza_Tariffe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:333354083e0e7b9dd8-24465003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af00388be8f2ff2befc763a57c215b4c91aeaa77' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Visualizza_Tariffe.tpl',
      1 => 1409354566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '333354083e0e7b9dd8-24465003',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adulto' => 0,
    'ridotto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54083e0e7e7854_13141402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54083e0e7e7854_13141402')) {function content_54083e0e7e7854_13141402($_smarty_tpl) {?>
<div>I nostri prezzi:</div><br>

Biglietto Adulti: <?php echo $_smarty_tpl->tpl_vars['adulto']->value;?>
 €<br>
Biglietto Ridotto: <?php echo $_smarty_tpl->tpl_vars['ridotto']->value;?>
 €<br>
<?php }} ?>
