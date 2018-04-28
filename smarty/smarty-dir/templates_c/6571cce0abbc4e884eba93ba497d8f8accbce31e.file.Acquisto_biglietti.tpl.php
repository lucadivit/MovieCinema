<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 20:47:18
         compiled from ".\smarty\smarty-dir\templates\Acquisto_biglietti.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2593454076236763cf3-09586241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6571cce0abbc4e884eba93ba497d8f8accbce31e' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Acquisto_biglietti.tpl',
      1 => 1409648416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2593454076236763cf3-09586241',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Titolo' => 0,
    'sala' => 0,
    'codice' => 0,
    'spettacolo1' => 0,
    'spettacolo2' => 0,
    'spettacolo3' => 0,
    'numposti' => 0,
    'omaggi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5407623684e2f3_43018586',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5407623684e2f3_43018586')) {function content_5407623684e2f3_43018586($_smarty_tpl) {?><div id="boxext"><h1><div id="<?php echo $_smarty_tpl->tpl_vars['Titolo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['Titolo']->value;?>
</div></h1><br>
<input type='text' id="sala" class="hidden" value=<?php echo $_smarty_tpl->tpl_vars['sala']->value;?>
>
<input type='text' id="codice" class="hidden" value=<?php echo $_smarty_tpl->tpl_vars['codice']->value;?>
>

<h4>Film in proiezione alla sala <b id="<?php echo $_smarty_tpl->tpl_vars['sala']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['sala']->value;?>
 </b></h4><br>
Seleziona Spettacolo: <select name="spettacolo" id="spettac"> <optgroup label="Seleziona"></optgroup>
    <option value="<?php echo $_smarty_tpl->tpl_vars['spettacolo1']->value;?>
" id='spet1' onclick="subpostidisponibili(getpostidisponibili('spet1'));"><?php echo $_smarty_tpl->tpl_vars['spettacolo1']->value;?>
</option>
    <option value="<?php echo $_smarty_tpl->tpl_vars['spettacolo2']->value;?>
" id='spet2' onclick="subpostidisponibili(getpostidisponibili('spet2'));"><?php echo $_smarty_tpl->tpl_vars['spettacolo2']->value;?>
</option>
    <option value="<?php echo $_smarty_tpl->tpl_vars['spettacolo3']->value;?>
" id='spet3' onclick="subpostidisponibili(getpostidisponibili('spet3'));"><?php echo $_smarty_tpl->tpl_vars['spettacolo3']->value;?>
</option></select><br><br>
    
    <div id="postonascosto">posti disponibili: <b id="successivo"><?php echo $_smarty_tpl->tpl_vars['numposti']->value;?>
 </b></div><br>


    <br>Quanti biglietti vuoi acquistare?<br>
Adulti: <input type="number" min="0" max="<?php echo $_smarty_tpl->tpl_vars['numposti']->value;?>
" id="adulto" size="2" value="0" onchange="subpostidisponibili(getpostidisponibili(prendiid()));" onclick="subdatiacquisto(getdatiacquisto(<?php echo $_smarty_tpl->tpl_vars['sala']->value;?>
), 'acquisto', 'preventivo', 'totale');">
Bambini: <input type="number" min="0" max="<?php echo $_smarty_tpl->tpl_vars['numposti']->value;?>
" id="ridotto" size="2" value="0" onchange="subpostidisponibili(getpostidisponibili(prendiid()));" onclick="subdatiacquisto(getdatiacquisto(<?php echo $_smarty_tpl->tpl_vars['sala']->value;?>
), 'acquisto', 'preventivo', 'totale');">

<div id="ERRORE"></div>

Hai a disposizione <?php echo $_smarty_tpl->tpl_vars['omaggi']->value;?>
 biglietti omaggio. <br>
<?php if ($_smarty_tpl->tpl_vars['omaggi']->value!=0) {?>
    Vuoi utilizzarli? Quanti biglietti omaggio vuoi utilizzare? <input type="number" min="0" max="<?php echo $_smarty_tpl->tpl_vars['omaggi']->value;?>
" id="omaggio" size="2" value="0" onclick="subdatiacquisto(getdatiacquisto(<?php echo $_smarty_tpl->tpl_vars['sala']->value;?>
), 'acquisto', 'preventivo', 'totale');">
<?php }?>
<br>
Totale <input type="text" id="totale" value='0' size='6' readonly> €

<div class="hidden" id="loading"> <br><br></div><input type="submit" id="inviacquisto" value="invia" onclick="acquisto(getdatiacquisto(<?php echo $_smarty_tpl->tpl_vars['sala']->value;?>
), 'acquisto', 'inviacquisto', 'ajaxcontenitore');">

<br><br><br>

 <div id="finestra7" class='wind' title='Acquisto'>
        <p> Sei sicuro di voler procedere con l'acquisto?</p>
    </div>
    

</div><?php }} ?>
