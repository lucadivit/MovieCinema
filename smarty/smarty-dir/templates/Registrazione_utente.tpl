<div id="boxext"><p id="testo1">
    Completare i campi sottostanti. I campi contrassegnati da <img src="./immagini/popcorn22.gif" id="asterisco"> sono obbligatori.<br>
</p>

<div id="formregistrazione">
    <script type="text/javascript" src="./JS/dtpk.js"></script>
    <br>
    <div id="datiregistrazione">

        <fieldset>
            <div id="userpsw">
                <div id="dati">Dati Utente:<br></div>
                <img src="./immagini/popcorn22.gif" id="asterisco"><label>Username:</label> <input type="text" id="username" placeholder="Username" size="20" maxlength="40" onchange="validazione('username');"><div id="risultato1"></div><br>
            </div>
        </fieldset>
        <fieldset>
            <div id="dati">Dati Anagrafici:<br></div>
            <img src="./immagini/popcorn22.gif" id="asterisco"><label>Nome:</label><input type="text" placeholder="Nome" size="20" maxlength="40" id="nome" onchange="validazione('nome');"><div id="risultato3"></div><br>
            <img src="./immagini/popcorn22.gif" id="asterisco"><label>Cognome:</label><input type="text" id="cognome" size="20" maxlength="40" placeholder="Cognome" onchange="validazione('cognome');"><div id="risultato4"></div><br>
            <div id="sex"><label>Sesso:</label>
                <input type="radio" name="sesso" id="sesso" value="M">M
                <input type="radio" name="sesso" id="sesso" value="F">F
                <br>
            </div>

            <img src="./immagini/popcorn22.gif" id="asterisco"><label>Citt&#x00E0:</label><input type="text" id="citta" size="20" maxlength="20" placeholder="Città" onchange="validazione('citta');"><div id="risultato5"></div><br>
            <img src="./immagini/popcorn22.gif" id="asterisco"><label>Provincia:</label><input type="text" id="provincia" size="20" maxlength="2" placeholder="Provincia" onchange="validazione('provincia');"><div id="risultato7"></div><br>
            <div id="cap2"><label>CAP:</label> <input type="text" id="cap" size="5" maxlength="5" placeholder="CAP" onchange="validazione('cap');"><div id="risultato6"></div></div><br>
            <img src="./immagini/popcorn22.gif" id="asterisco"><label>E-Mail:</label><input type="text" id="email" size="40" maxlength="40" placeholder="Inserisci indirizzo e-mail" onchange="validazione('email');"><div id="risultato8"></div><br>
            <div id="anim"><label>Data di nascita:</label><input type="text" placeholder="aaaa-mm-gg" id="data_nascita" size="20" maxlength="20" onchange="validazione('data_nascita');"><div id="risultato9"></div><br>

                </fieldset>

            </div>

            <div id="bottone"> 
                 <div class="hidden" id="loading"> <br><br></div><input type="submit" id="submit" value="Invia" onclick="sendform(getdati());"> 
            </div>





            </div>






</div>