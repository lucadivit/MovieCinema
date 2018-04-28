<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 01:21:22
         compiled from ".\smarty\smarty-dir\templates\Menu_Utente.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19310540650f27d21a8-34243867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a247961786caf21a1966b9fac1e9d01512a5b75e' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Menu_Utente.tpl',
      1 => 1409577032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19310540650f27d21a8-34243867',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nome' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540650f28203a4_54725948',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540650f28203a4_54725948')) {function content_540650f28203a4_54725948($_smarty_tpl) {?>        <script type="text/javascript" src="./JS/Menu_tendina.js"></script>





<div id="finestra4" class='wind' title="ATTENZIONE!">
        <p>Vuoi davvero eliminare definitivamente il tuo account? Dopo l'eliminazione non sar&agrave; pi&ugrave; possibile recuperare l'account in alcun modo!</p>
</div>

<nav id="menu-wrap">    
	<ul id="menu" class="egmenu">
		
		<li>
			<a>Film</a>
			<ul>
        <li><a href="#" onclick="ajaxcontrtask('gestione', 'mostratitoli');">Elenco Film</a></li>
        <li><a href="#" onclick="ajaxcontrtask('acquisto', 'elencoacquisti');">Acquisto</a></li>
        <li><a href="#" onclick="ajaxcontrtask('acquisto', 'visualizzatariffe');">Tariffe</a></li>

                                <li>
								
				</li>
								
			</ul>
		</li>
                <li>
			<a>Impostazioni Account</a>
			<ul>
        <li><a href="#" onclick="ajaxcontrtask('registrazione', 'modificautentetpl');">Profilo</a></li>
        <li><a href="#" onclick="ajaxcontrtask('registrazione', 'modificacartatpl');">Carta di Credito</a></li>
        <li><a href="#" onclick="disattivaaccount();">Disattiva Account</a></li>

                                <li>
								
				</li>
								
			</ul>
		</li>
                
        <li><a href="#" onclick="ajaxmenucontrtask('autenticazione', 'logout');">Logout</a></li>

      <a id="user2">BENTORNATO, <?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
</a>

	</ul>
</nav><?php }} ?>
