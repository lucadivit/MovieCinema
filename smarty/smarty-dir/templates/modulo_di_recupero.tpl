<div id="boxext"><div id="modulorecupero">
    
    Riempire tutti i campi selezionando il campo che si vuole recuperare:<br>
    Se desideri recuperare l'<b>Username</b>, seleziona l'username e inserisci la password e l'email di registrazione.<br>
    Se desideri recuperare la <b>Password</b>, seleziona la password inserisci l'username e l'email di registrazione.<br>
    <br>
    <fieldset>
        Seleziona il dato da recuperare:
        <br><label>Username: </label><input type="radio" id="recuser" name="recdati" value="username" onchange="disabledTextAreaUser();">
    <br><label>Password: </label><input type="radio" id="recpass" name="recdati" value="password" onchange="disabledTextAreaPass();"><br>
    <br>Completa i seguenti campi<br>
    <br><input type="text" id="recpasstxt" placeholder="password" disabled="disabled"><br>
    <input type="text" id="recusertxt" placeholder="username" disabled="disabled"><br></fieldset>
    <br><label>Email: </label><input type="text" id="recmail" name="email">  ATTENZIONE!!! Va inserita esclusivamente la mail con la quale ti sei registrato.
   <div class="hidden" id="loading"> <br><br></div><input id="inviarec" type="submit" value="Invia" name="inviarec" onclick="subdatirec(getdatirec());"/>
</div></div>