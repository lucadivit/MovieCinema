<div id="boxext"><fieldset>
    <label>Username:</label> <input type="text" value="{$datiadmin.username}" id="username" placeholder="Username" size="20" maxlength="40" onchange="validazione('username');"><div id="risultato1"></div><br>
    <label>Nuova Password:</label> <input type="password" value="{$datiadmin.password}" id="password" placeholder="Nuova Password" size="20" maxlength="40" onchange="validazione('password');" onclick="checkpass();"><div id="risultato2"></div><br>
    <label>Conferma Password:</label> <input type="password" value="{$datiadmin.password}" id="password_1" placeholder="Conferma Password" size="20" maxlength="40" onchange="validazione('password');"><div id="risultato10"></div><br>
    <label>E-Mail:</label><input type="text" id="email" size="40" value="{$datiadmin.email}" maxlength="40" placeholder="Inserisci indirizzo e-mail" onchange="validazione('email');"><div id="risultato8"></div><br>
    <label>Nome:</label><input type="text" placeholder="Nome" size="20" maxlength="40" value="{$datiadmin.nome}" id="nome" onchange="validazione('nome');"><div id="risultato3"></div><br>
    <label>Cognome:</label><input type="text" id="cognome" size="20" maxlength="40" value="{$datiadmin.cognome}" placeholder="Cognome" onchange="validazione('cognome');"><div id="risultato4"></div><br>
    <script type="text/javascript" src="./JS/dtpk.js"></script>
    <div id="anim"><label>Data di nascita:</label><input type="text" id="data_nascita" value="{$datiadmin.data_nascita}" size="20" maxlength="20" onchange="validazione('data_nascita');"></div><div id="risultato9"></div><br>
    <br>
    <input type="submit" id="submit" value="Invia" onclick="subdatiadmin(getdatiadmin());"> 
</fieldset>
</div>