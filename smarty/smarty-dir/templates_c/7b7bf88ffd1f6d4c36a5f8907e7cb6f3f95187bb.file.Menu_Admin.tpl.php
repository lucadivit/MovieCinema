<?php /* Smarty version Smarty-3.1.18, created on 2014-09-02 23:46:44
         compiled from ".\smarty\smarty-dir\templates\Menu_Admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2849054063ac4749339-78474548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b7bf88ffd1f6d4c36a5f8907e7cb6f3f95187bb' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Menu_Admin.tpl',
      1 => 1409675795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2849054063ac4749339-78474548',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nome' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54063ac4775a54_16858746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54063ac4775a54_16858746')) {function content_54063ac4775a54_16858746($_smarty_tpl) {?><script type="text/javascript" src="./JS/Menu_tendina.js"></script>






<nav id="menu-wrap">    
    <ul id="menu" class="egmenu">
        <li class="first" id="formfilm">
            <a>Utenti</a>
            <ul>
                <li>
                    <a href="#" onclick="ajaxcontrtask('autenticazione', 'tplhomeadmin');">Ricerca</a>
                </li>
                <li>
                    <a href="#" onclick="ajaxcontrtask('autenticazione', 'listautenti');">Lista utenti</a>

                </li>
            </ul>
        </li>
        <li>
            <a>Modifica</a>
            <ul>
                <li><a href="#" onclick="ajaxcontrtask('registrazione', 'tariffetpl');">Tariffe</a></li>
                <li><a href="#" onclick="ajaxcontrtask('gestione', 'salatpl');">Proiezioni</a></li>
                <li>
                    <a href="">Film</a>
                    <ul>
                        <li><a href="#" onclick="ajaxcontrtask('gestione', 'mostratitolidamodificare');">Modifica Film</a></li>
                        <li><a href="#" onclick="ajaxcontrtask('gestione', 'elencocancellafilm');">Elimina Film</a></li>
                        <li><a href="#" onclick="ajaxcontrtask('registrazione', 'filmtpl');">Inserisci Film</a></li>


                    </ul>				
                </li>
                <li>
                    <a href="#" onclick="ajaxcontrtask('registrazione', 'recuperadatiadmin');">Profilo</a>

                </li>
                <li>
                    <a href="#" onclick="ajaxcontrtask('registrazione', 'aggiungiadmin');">Aggiungi Admin</a>

                </li>

            </ul>
        </li>
        <li>

        <li><a href="#" onclick="ajaxcontrtask('gestione', 'mostratitoli');">Elenco Film</a></li>
        <li><a href="#" onclick="ajaxcontrtask('gestione', 'tplmessadmin');">Email</a></li>

        <li><a href="#" onclick="ajaxmenucontrtask('autenticazione', 'logout');">Logout</a></li>
        <a id="user">BENTORNATO, <?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
</a>
    </ul>
</nav><?php }} ?>
