<?php /* Smarty version Smarty-3.1.18, created on 2014-09-02 22:13:01
         compiled from ".\smarty\smarty-dir\templates\Home_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6777540624cdea5463-09713144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39d8b629241e04d3376ac68a221b4715c52c0f62' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Home_page.tpl',
      1 => 1409677094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6777540624cdea5463-09713144',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Menu' => 0,
    'slider' => 0,
    'dato' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540624ce1243f6_64183950',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540624ce1243f6_64183950')) {function content_540624ce1243f6_64183950($_smarty_tpl) {?><html>
    <head>
        <script type="text/javascript" src="./JS/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="./JS/jquery-ui.js"></script> 
        <script type="text/javascript" src="./JS/jquery.ui.widget.js"></script> 
        <script type="text/javascript" src="./JS/gestione_link.js"></script>
        <script type="text/javascript" src="./JS/votazione.js"></script>
        <script type="text/javascript" src="./JS/recupero.js"></script>
        <script type="text/javascript" src="./JS/slider.js"></script>

        <link rel="stylesheet" href="./CSS/jquery-ui.css">
        <link rel="stylesheet" href="./CSS/Registrazione_stile.css"> 
        <link rel="stylesheet" href="./CSS/Pagina_stile.css"> 
        <link rel="stylesheet" href="./CSS/Votazione_stile.css"> 
        <link rel="stylesheet" href="./CSS/Filmcommenti_stile.css"> 
        <link rel="stylesheet" href="./CSS/slider.css">

        <title>Movie Cinema</title>
    </head>

    <body> 
        <div id="header">




        </div>

        <noscript>
        <div style="color: red; font-size: 22px; text-align: center;">
            Il tuo browser non supporta JavaScript, o lo hai disattivato!<br>
            Riattivalo accedendo alle impostazioni del browser se vuoi usufruire dei nostri servizi

        </div>
        </noscript>  



        <div id="ajaxmenu">

            <?php echo $_smarty_tpl->tpl_vars['Menu']->value;?>


            <div id="ajaxcontenitore"> 
                <?php if ($_smarty_tpl->tpl_vars['slider']->value) {?>
                    <?php if (count($_smarty_tpl->tpl_vars['slider']->value)>1) {?>
                        <div id="imgsucc" class="slideimg" style="background-image: url('./upload/<?php echo $_smarty_tpl->tpl_vars['slider']->value[1]['locandina'];?>
'); opacity: 0;"> </div>
                    <?php } else { ?>
                        <div id="imgsucc" class="slideimg" style="background-image: url('./upload/<?php echo $_smarty_tpl->tpl_vars['slider']->value[0]['locandina'];?>
'); opacity: 0;"> </div>

                    <?php }?> 
                    
                    <div id="imgattuale" class="slideimg" style="background-image: url('./upload/<?php echo $_smarty_tpl->tpl_vars['slider']->value[0]['locandina'];?>
'); top: -400px; opacity: 1;"> </div>
                    <div id="titoloattuale" class="slidetxt"><?php echo $_smarty_tpl->tpl_vars['slider']->value[0]['titolo'];?>
</div>
                    <img id="star" class="star" src="./immagini/<?php echo $_smarty_tpl->tpl_vars['slider']->value[0]['media'];?>
star.png">

                    <div id="dati" class="delta">
                        <div id="indiceimmagini" value="1"></div>
                        <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value) {
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
                            <input value="./upload/<?php echo $_smarty_tpl->tpl_vars['dato']->value['locandina'];?>
">

                        <?php } ?>
                    </div>
                    <div id="titoli" class="delta">
                        <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value) {
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
                            <input value="<?php echo $_smarty_tpl->tpl_vars['dato']->value['titolo'];?>
">

                        <?php } ?>
                    </div>
                    
                     <div id="stelle" class="delta">
                        <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value) {
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
                            <input value="<?php echo $_smarty_tpl->tpl_vars['dato']->value['media'];?>
">

                        <?php } ?>
                    </div>

                <?php } else { ?>
                    Non sono presenti film in programmazione!
                <?php }?>

            </div>
            <br>

        </div>
        <div id="footer">

        </div>

    </body>  
</html><?php }} ?>
