<?php /* Smarty version Smarty-3.1.18, created on 2014-09-02 22:37:14
         compiled from ".\smarty\smarty-dir\templates\Orari_proiezioni.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1572954062a7a2ef7e3-76165416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf1183a8844ea73646951f7cab244dc512358afa' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Orari_proiezioni.tpl',
      1 => 1409647990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1572954062a7a2ef7e3-76165416',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datiFilm' => 0,
    'elencoFilm' => 0,
    'locandina' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54062a7a406f11_88904196',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54062a7a406f11_88904196')) {function content_54062a7a406f11_88904196($_smarty_tpl) {?><div id="boxext"><div id="filmaggiunto">
    <?php  $_smarty_tpl->tpl_vars['elencoFilm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elencoFilm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datiFilm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elencoFilm']->key => $_smarty_tpl->tpl_vars['elencoFilm']->value) {
$_smarty_tpl->tpl_vars['elencoFilm']->_loop = true;
?>
        <table border="1">
            <tr>
                <td rowspan="7"><img id="locandina" src="./upload/<?php echo $_smarty_tpl->tpl_vars['locandina']->value[$_smarty_tpl->tpl_vars['elencoFilm']->value['codice_film']];?>
">
                </td>
                <td><b>Titolo:</b> <?php echo $_smarty_tpl->tpl_vars['elencoFilm']->value['titolo_film'];?>
</td>
            </tr>
            <tr>
                <td><b>Sala:</b> <?php echo $_smarty_tpl->tpl_vars['elencoFilm']->value['id_sala'];?>
</td>
            </tr>
            <tr>
                <td><b>Posti Disponibili:</b> <?php echo $_smarty_tpl->tpl_vars['elencoFilm']->value['numero_posti'];?>
</td>
            </tr>
            <tr>
                <td><b>Spettacoli:</b> <br><?php echo $_smarty_tpl->tpl_vars['elencoFilm']->value['orario1'];?>
 
                    <br><?php echo $_smarty_tpl->tpl_vars['elencoFilm']->value['orario2'];?>
 
                    <br><?php echo $_smarty_tpl->tpl_vars['elencoFilm']->value['orario3'];?>
</td>
            </tr>
        </table>
    <?php } ?>
</div></div><?php }} ?>
