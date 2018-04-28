<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 20:44:51
         compiled from ".\smarty\smarty-dir\templates\Commenti.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19475540761a351d918-61642605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2565baf6969721a2b99fb1c468f9a4adf4b97926' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Commenti.tpl',
      1 => 1409605556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19475540761a351d918-61642605',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'elenco_comm' => 0,
    'elenco' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540761a3725213_70619763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540761a3725213_70619763')) {function content_540761a3725213_70619763($_smarty_tpl) {?>    <?php  $_smarty_tpl->tpl_vars['elenco'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elenco']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['elenco_comm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elenco']->key => $_smarty_tpl->tpl_vars['elenco']->value) {
$_smarty_tpl->tpl_vars['elenco']->_loop = true;
?>
        <div id="commentinseriti">
        <?php echo $_smarty_tpl->tpl_vars['elenco']->value;?>
 <br></div>
    <?php } ?>




    <form id="inscommento">
voto: <div id="STAR_RATING" onmouseout="star_accendi(' + QT + ');">
        <ul>
            <li id="star_1" onclick="star_vota(1);
                    valorevoto(1);" onmouseover="star_accendi(0);
                            star_accendi(1);"></li>
            <li id="star_2" onclick="star_vota(2);
                    valorevoto(2);" onmouseover="star_accendi(0);
                            star_accendi(2);"></li>
            <li id="star_3" onclick="star_vota(3);
                    valorevoto(3);" onmouseover="star_accendi(0);
                            star_accendi(3);"></li>
            <li id="star_4" onclick="star_vota(4);
                    valorevoto(4);" onmouseover="star_accendi(0);
                            star_accendi(4);"></li>
            <li id="star_5" onclick="star_vota(5);
                    valorevoto(5);" onmouseover="star_accendi(0);
                            star_accendi(5);"></li>
        </ul>

    </div>
<input type="text" id="usercomm" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" readonly><br>
<textarea id="commento" rows="6" cols="45" placeholder="Inserisci commento:" maxlength="2048"></textarea><br>
    
    <br>
    <input type="reset" value="Cancella Testo">
    <div class="hidden" id="loading"> <br><br></div><input type="button" id='submit' value="Invia Commento" onclick="subcommento(getcommento());">

</form>
<?php }} ?>
