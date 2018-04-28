<div id="boxext">
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