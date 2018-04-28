<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 22:17:06
         compiled from ".\smarty\smarty-dir\templates\Login_Errato.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20235540650d41edd15-65919156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '128d74f41bf0af2296f27cc59c74f9eb46c9e385' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Login_Errato.tpl',
      1 => 1409775314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20235540650d41edd15-65919156',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540650d423bf10_97728831',
  'variables' => 
  array (
    'Menu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540650d423bf10_97728831')) {function content_540650d423bf10_97728831($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['Menu']->value;?>


<div id="ajaxcontenitore">
<div id="boxext">
        Attenzione! Username o password errati! Riprova!

    <div id="login">
        <h1>Login</h1>
        <label>Username: </label><input type="text" id="useraccess" size="20" maxlength="40"> 
        <br>
        <label>Password: </label><input type="password" id="passaccess" size="20" maxlength="40" >

    <input type="submit" id="submitlogin" value="Accedi" onclick="sublog(getdatilog());">


    </div>  
    

    <div id="avvisilogin">
        Hai dimenticato Username o password? <div id="recuperadati"><b><a href="#" onclick="ajaxcontrtask('autenticazione', 'modulorecuperodati');">Vai al modulo di recupero</a></b></div><br>
        Sei un nuovo utente? <div id="registrautente"><b><a href="#" onclick="ajaxcontrtask('registrazione', 'registrazionetpl');">Registrati ora!</a></b></div>
    </div> 
</div>
    </div>   
 
<?php }} ?>
