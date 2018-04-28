<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:35:37
         compiled from ".\smarty\smarty-dir\templates\Modifica_Utente.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118995408407913f7b5-64310714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b06bfa89cf6e37079dccdd7815eafc59372fcd96' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Modifica_Utente.tpl',
      1 => 1409647940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118995408407913f7b5-64310714',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datiutente' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540840791975b7_88624813',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540840791975b7_88624813')) {function content_540840791975b7_88624813($_smarty_tpl) {?><div id="boxext"><div id="formregistrazione">
    <script type="text/javascript" src="./JS/dtpk.js"></script>
    <br>
    <div id="datiregistrazione">

        <fieldset>
            <div id="userpsw">
                <div id="dati">Dati Utente:<br></div>
                <label>Username:</label> <input type="text" id="username" placeholder="Username" value="<?php echo $_smarty_tpl->tpl_vars['datiutente']->value['username'];?>
" size="20" maxlength="40" readonly><div id="risultato1"></div><br>
                <label>Password:</label> <input type="password" id="password" value="<?php echo $_smarty_tpl->tpl_vars['datiutente']->value['password'];?>
" placeholder="Password" size="20" maxlength="40" onchange="validazione('password');" onclick="checkpass();" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('password');"></a><div id="risultato2">
                </div><br>
                <label>Conferma Password:</label> <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['datiutente']->value['password'];?>
" id="password_1" placeholder="Conferma Password" size="20" maxlength="40" onchange="validazione('password');"><div id="risultato10"></div><br>

            </div>
        </fieldset>



        <fieldset>
            <div id="dati">Dati Anagrafici:<br></div>
            <label>Nome:</label><input type="text" placeholder="Nome" size="20" maxlength="40" value="<?php echo $_smarty_tpl->tpl_vars['datiutente']->value['nome'];?>
" id="nome" onchange="validazione('nome');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('nome');"></a><div id="risultato3"></div><br>
            <label>Cognome:</label><input type="text" id="cognome" size="20" maxlength="40" value="<?php echo $_smarty_tpl->tpl_vars['datiutente']->value['cognome'];?>
" placeholder="Cognome" onchange="validazione('cognome');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('cognome');"></a><div id="risultato4"></div><br>
            <div id="sex"><label>Sesso:</label>
                <input type="radio" name="sesso" id="sesso" value="M" <?php if ($_smarty_tpl->tpl_vars['datiutente']->value['sesso']=='M') {?>checked='checked'<?php }?>>M
                <input type="radio" name="sesso" id="sesso" value="F" <?php if ($_smarty_tpl->tpl_vars['datiutente']->value['sesso']=='F') {?>checked='checked'<?php }?>>F
                <br>
            </div>

            <label>Citt&#x00E0:</label><input type="text" id="citta" size="20" value="<?php echo $_smarty_tpl->tpl_vars['datiutente']->value['citta'];?>
" maxlength="20" placeholder="Città" onchange="validazione('citta');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('citta');"></a><div id="risultato5"></div><br>
            <label>Provincia:</label><input type="text" id="provincia" size="20" maxlength="2" value="<?php echo $_smarty_tpl->tpl_vars['datiutente']->value['provincia'];?>
" placeholder="Provincia" onchange="validazione('provincia');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('provincia');"></a><div id="risultato7"></div><br>
            <div id="cap2"><label>CAP:</label> <input type="text" id="cap" size="5" maxlength="5" placeholder="cap" value="<?php echo $_smarty_tpl->tpl_vars['datiutente']->value['CAP'];?>
" onchange="validazione('cap');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('cap');"></a><div id="risultato6"></div></div><br>
            <label>E-Mail:</label><input type="text" id="email" size="40" value="<?php echo $_smarty_tpl->tpl_vars['datiutente']->value['email'];?>
" maxlength="40" placeholder="Inserisci indirizzo e-mail" onchange="validazione('email');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('email');"></a><div id="risultato8"></div><br>
            <div id="anim"><label>Data di nascita:</label><input type="text" id="data_nascita" size="20" maxlength="20" value="<?php echo $_smarty_tpl->tpl_vars['datiutente']->value['data_nascita'];?>
" onchange="validazione('data_nascita');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('data_nascita');"></a><div id="risultato9"></div><br>

                </fieldset>

            </div>

            <div id="bottone"> 
                <input type="submit" id="submit2" value="Invia" onclick="subdatiutentenew(getdatiutentenew());"> 
            </div>
    </div>
      
            
            
          </div><?php }} ?>
