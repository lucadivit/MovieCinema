<?php /* Smarty version Smarty-3.1.18, created on 2014-09-02 22:26:19
         compiled from ".\smarty\smarty-dir\templates\Menu_Home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11072540624cde14bd7-95781740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7777ab967d1600a319f84a1187b80f5eaba71f2' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Menu_Home.tpl',
      1 => 1409689435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11072540624cde14bd7-95781740',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540624cde3bcd5_25075009',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540624cde3bcd5_25075009')) {function content_540624cde3bcd5_25075009($_smarty_tpl) {?>

<nav id="menu-wrap">    
    <ul id="menu" class="egmenu">
        <li><a href="">Home</a></li>
        <li><a href="#" onclick="ajaxcontrtask('gestione', 'mostraorari');">Proiezione</a></li>
        <li><a href="#" onclick="ajaxcontrtask('registrazione', 'registrazionetpl');">Registrazione</a></li>
        <li><a href="#" onclick="ajaxcontrtask('autenticazione', 'modulorecuperodati');">Recupero Credenziali</a></li>

        <li><a href="#" onclick="ajaxcontrtask('acquisto', 'visualizzatariffe');">Tariffe</a></li>
        <li><a>Info</a>

        <ul>
            <li>
                <a href="#" onclick="ajaxcontrtask('gestione', 'contattaci');">Contatti</a>
            </li>
            <li>
                <a href="#" onclick="ajaxcontrtask('gestione', 'chisiamo');">Chi siamo</a>

            </li>
        </ul>
        </li>
        <li><a href="#" onclick="ajaxcontrtask('autenticazione', 'logintpl');">Login</a></li>

    </ul>
</nav><?php }} ?>
