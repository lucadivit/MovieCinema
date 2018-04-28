<?php /* Smarty version Smarty-3.1.18, created on 2014-09-04 12:24:39
         compiled from ".\smarty\smarty-dir\templates\Imposta_film_sala_error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:366254083de7f144d4-43173239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf88101f16b1cee386c939b5b4df15f809dc4e6f' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Imposta_film_sala_error.tpl',
      1 => 1409647873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '366254083de7f144d4-43173239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'elenco_titoli' => 0,
    'titolo' => 0,
    'numeroSale' => 0,
    'i' => 0,
    'dati_errati' => 0,
    'error_msg' => 0,
    'datiFilm' => 0,
    'proiezione' => 0,
    'locandine' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54083de8058621_15700292',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54083de8058621_15700292')) {function content_54083de8058621_15700292($_smarty_tpl) {?><div id="boxext"><fieldset>
    <div id="dati_sala">
        <div id="reg_sala">Imposta Proiezione:<br></div>
        <p>ATTENZIONE: per impostare una proiezione il film deve necessariamente essere presente nel database</p>
        <label>Seleziona Film: </label><select name="Film" id="titolo_film"> <optgroup label="Titoli: "></optgroup><?php  $_smarty_tpl->tpl_vars['titolo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['titolo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['elenco_titoli']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['titolo']->key => $_smarty_tpl->tpl_vars['titolo']->value) {
$_smarty_tpl->tpl_vars['titolo']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['titolo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['titolo']->value;?>
</option><?php } ?></select><br>
        <label>Seleziona Sala: </label><select name="Sala" id="sala"> <optgroup label="Sala: "></optgroup><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['numeroSale']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['numeroSale']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }} ?></select><?php if ($_smarty_tpl->tpl_vars['dati_errati']->value['sala']=='TRUE') {?><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['sala'];?>
<?php }?><br>
        <tr><label>Primo Spettacolo: </label><select name="Orario" id="orario1_h"> <optgroup label="HH"></optgroup><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 24+1 - (1) : 1-(24)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }} ?></select><select name="Orario" id="orario1_m"> <optgroup label="MM"></optgroup><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 59+1 - (0) : 0-(59)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }} ?></select><br></tr>
        <tr><label>Secondo Spettacolo: </label><select name="Orario" id="orario2_h"> <optgroup label="HH"></optgroup><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 24+1 - (1) : 1-(24)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }} ?></select><select name="Orario" id="orario2_m"> <optgroup label="MM"></optgroup><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 59+1 - (0) : 0-(59)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }} ?></select><br></tr>
        <tr><label>Terzo Spettacolo: </label><select name="Orario" id="orario3_h"> <optgroup label="HH"></optgroup><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 24+1 - (1) : 1-(24)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }} ?></select><select name="Orario" id="orario3_m"> <optgroup label="MM"></optgroup><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 59+1 - (0) : 0-(59)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }} ?></select><br></tr>
        <div id="bottone"> 
            <input type="submit" id="submitfilm" value="Imposta" onclick="subdatisala(getdatisala());"> 
        </div>
    </div>
</fieldset>

         <?php if ($_smarty_tpl->tpl_vars['datiFilm']->value) {?>
<fieldset>
    <div id="dati_sala">
        <div id="del_sala">Elimina Proiezione:<br></div>
        <p>I Film sottostanti sono quelli attualmente in proiezione, per eliminare un film dalla sala scegliere la sala corrispondente</p>
        <?php  $_smarty_tpl->tpl_vars['proiezione'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proiezione']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datiFilm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proiezione']->key => $_smarty_tpl->tpl_vars['proiezione']->value) {
$_smarty_tpl->tpl_vars['proiezione']->_loop = true;
?>        
            <table border="2">
                <tr>
                    <td rowspan="7"><img id="locandina" src="./upload/<?php echo $_smarty_tpl->tpl_vars['locandine']->value[$_smarty_tpl->tpl_vars['proiezione']->value['titolo_film']];?>
"></td>
                    <td>Titolo: <?php echo $_smarty_tpl->tpl_vars['proiezione']->value['titolo_film'];?>
</td>
                </tr>
                <tr>
                    <td>Sala: <?php echo $_smarty_tpl->tpl_vars['proiezione']->value['id_sala'];?>
</td>
                </tr>
            </table>
        <?php } ?>
        <label>Seleziona sala da liberare: </label><select name="Sala" id="d_sala"> <optgroup label="Sala: "></optgroup><?php  $_smarty_tpl->tpl_vars['proiezione'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proiezione']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datiFilm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proiezione']->key => $_smarty_tpl->tpl_vars['proiezione']->value) {
$_smarty_tpl->tpl_vars['proiezione']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['proiezione']->value['id_sala'];?>
"><?php echo $_smarty_tpl->tpl_vars['proiezione']->value['id_sala'];?>
</option><?php } ?></select><br>
        <div id="bottone"> 
            <input type="submit" id="deletefilm" value="Elimina" onclick="deldatisala(getdatidelsala());"> 
        </div>
    </div>
</fieldset>
         <?php } else { ?>
Non ci sono proiezioni in programma!
        <?php }?>
        </div><?php }} ?>
