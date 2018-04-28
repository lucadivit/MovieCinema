<?php /* Smarty version Smarty-3.1.18, created on 2014-09-03 22:17:05
         compiled from ".\smarty\smarty-dir\templates\Login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3192554063ac0363820-60773810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25688f03cfce34871166019688ba08b9e2f825e5' => 
    array (
      0 => '.\\smarty\\smarty-dir\\templates\\Login.tpl',
      1 => 1409775368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3192554063ac0363820-60773810',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54063ac03a1904_19129872',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54063ac03a1904_19129872')) {function content_54063ac03a1904_19129872($_smarty_tpl) {?><div id="boxext">
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
</div><?php }} ?>
