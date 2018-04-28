<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 23:23:42
         compiled from ".\smarty\smarty-dir\templates\Home_Setup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2508540623a6a38253-80912022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b426547fac709313853c1dcea987bc4eeb33a8bc' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Home_Setup.tpl',
      1 => 1409778219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2508540623a6a38253-80912022',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540623a6aa96f3_56537841',
  'variables' => 
  array (
    'form' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540623a6aa96f3_56537841')) {function content_540623a6aa96f3_56537841($_smarty_tpl) {?><html>
    <head>
        <title>
            INSTALLAZIONE MOVIECINEMA
        </title>
        
        <script type="text/javascript" src="./JS/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="./JS/jquery-ui.js"></script> 
        <script type="text/javascript" src="./JS/jquery.ui.widget.js"></script> 
        <script type="text/javascript" src="./JS/Setup.js"></script>

        <link rel="stylesheet" href="./CSS/jquery-ui.css">
        <link rel="stylesheet" href="./CSS/CssSetup.css"> 
        
        
        
    </head>
    
    
    <body>
        <div id="header"></div>
        <div id="contenitore">
          <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

        
        </div>
        
    </body>
</html><?php }} ?>
