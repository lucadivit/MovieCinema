<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 20:50:24
         compiled from ".\smarty\smarty-dir\templates\Registrazione_Film_Avvenuta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24144540761a37d4ec8-43945189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0a22edc779afddc0e52cb94aea42ed804c9c455' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Registrazione_Film_Avvenuta.tpl',
      1 => 1409770214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24144540761a37d4ec8-43945189',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540761a39962a0_92719469',
  'variables' => 
  array (
    'media' => 0,
    'datiFilm' => 0,
    'Commento' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540761a39962a0_92719469')) {function content_540761a39962a0_92719469($_smarty_tpl) {?><div id="boxext">
<div id="right"><p><b>MEDIA: <?php echo $_smarty_tpl->tpl_vars['media']->value;?>
</b></p>
    <a href="#" id="acquista" onclick="sendtitolo2('<?php echo $_smarty_tpl->tpl_vars['datiFilm']->value['codice_film'];?>
', '<?php echo $_smarty_tpl->tpl_vars['datiFilm']->value['titolo'];?>
', 'acquisto', 'sendacquisto');"><img src="./immagini/ticket_acq.jpg" id="bigliettoacq" title="Acquista biglietto"></a>
</div>

<div id="left">   <img id="locandina" src="./upload/<?php echo $_smarty_tpl->tpl_vars['datiFilm']->value['locandina'];?>
">
</div>

<div id="middle">
    <div id="gettitolo" onchange="sendtitolo2(<?php echo $_smarty_tpl->tpl_vars['datiFilm']->value['titolo'];?>
, 'gestione', 'media');"><b><?php echo $_smarty_tpl->tpl_vars['datiFilm']->value['titolo'];?>
</b></div><br>
    <b>Genere:</b> <?php echo $_smarty_tpl->tpl_vars['datiFilm']->value['genere'];?>
<br>
    <b>Durata:</b> <?php echo $_smarty_tpl->tpl_vars['datiFilm']->value['durata'];?>
<br>
    <b>Autore:</b> <?php echo $_smarty_tpl->tpl_vars['datiFilm']->value['autore'];?>
<br>
    <b>Trama:</b> <?php echo $_smarty_tpl->tpl_vars['datiFilm']->value['trama'];?>
<br>
    <div id="getcodice" class="hidden"><?php echo $_smarty_tpl->tpl_vars['datiFilm']->value['codice_film'];?>
</div>
</div>
<br><br>


<div id="centro">
    <?php echo $_smarty_tpl->tpl_vars['Commento']->value;?>

</div>
<br>


</div><?php }} ?>
