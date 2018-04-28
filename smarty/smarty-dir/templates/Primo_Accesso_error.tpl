<div id="primoac">
    <br><br>
    Imposta la tua password: La password dev'essere minimo otto caratteri, deve essere presente almeno una lettera maiuscola e un numero<br><br>
    <img src="./immagini/popcorn22.gif" id="asterisco"><label>Password:</label> <input type="password" id="password" value="Valentina88" placeholder="Password" size="20" maxlength="40" onchange="validazione('password');" onclick="checkpass();"><div id="risultato2">{$error_msg.password}</div><br>
<img src="./immagini/popcorn22.gif" id="asterisco"><label>Conferma Password:</label> <input type="password" value="Valentina88" id="password_1" placeholder="Conferma Password" size="20" maxlength="40" onchange="validazione('password');"><div id="risultato10"></div><br>

<input type="submit" id="primoaccesso" value="entra" onclick="cambiapassword();">

</div>