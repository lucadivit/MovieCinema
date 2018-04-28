<div id="boxext"><div id="formregistrazione">
    <script type="text/javascript" src="./JS/dtpk.js"></script>
    <br>
    <div id="datiregistrazione">

        <fieldset>
            <div id="userpsw">
                <div id="dati">Dati Utente:<br></div>
                <label>Username:</label> <input type="text" id="username" placeholder="Username" value="{$datiutente.username}" size="20" maxlength="40" readonly><div id="risultato1">{if $dati_errati.username == "TRUE"} {$error_msg.username} {/if}</div><br>
                <label>Password:</label> <input type="password" id="password" value="{$datiutente.password}" placeholder="Password" size="20" maxlength="40" onchange="validazione('password');" onclick="checkpass();" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('password');"></a><div id="risultato2">{if $dati_errati.password == "TRUE"} {$error_msg.password} {/if}
                </div><br>
                <label>Conferma Password:</label> <input type="password" value="{$datiutente.password}" id="password_1" placeholder="Conferma Password" size="20" maxlength="40" onchange="validazione('password');"><div id="risultato10"></div><br>

            </div>
        </fieldset>



        <fieldset>
            <div id="dati">Dati Anagrafici:<br></div>
            <label>Nome:</label><input type="text" placeholder="Nome" size="20" maxlength="40" value="{$datiutente.nome}" id="nome" onchange="validazione('nome');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('nome');"></a><div id="risultato3">{if $dati_errati.nome == "TRUE"} {$error_msg.nome} {/if}</div><br>
            <label>Cognome:</label><input type="text" id="cognome" size="20" maxlength="40" value="{$datiutente.cognome}" placeholder="Cognome" onchange="validazione('cognome');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('cognome');"></a><div id="risultato4">{if $dati_errati.cognome == "TRUE"} {$error_msg.cognome} {/if}</div><br>
            <div id="sex"><label>Sesso:</label>
            <input type="radio" name="sesso" id="sesso" value="M" {if $datiutente.sesso=='M'}checked='checked'{/if}>M
                <input type="radio" name="sesso" id="sesso" value="F" {if $datiutente.sesso=='F'}checked='checked'{/if}>F
                <br>
            </div>

            <label>Citt&#x00E0:</label><input type="text" id="citta" size="20" value="{$datiutente.citta}" maxlength="20" placeholder="Città" onchange="validazione('citta');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('citta');"></a><div id="risultato5"></div><br>
            <label>Provincia:</label><input type="text" id="provincia" size="20" maxlength="2" value="{$datiutente.provincia}" placeholder="Provincia" onchange="validazione('provincia');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('provincia');"></a><div id="risultato7"></div><br>
            <div id="cap2"><label>CAP:</label> <input type="text" id="cap" size="5" maxlength="5" placeholder="cap" value="{$datiutente.CAP}" onchange="validazione('cap');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('cap');"></a><div id="risultato6"></div></div><br>
            <label>E-Mail:</label><input type="text" id="email" size="40" value="{$datiutente.email}" maxlength="40" placeholder="Inserisci indirizzo e-mail" onchange="validazione('email');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" alt="contatta" id="index" class='opzut' onclick="modifica('email');"></a><div id="risultato8">{if $dati_errati.email == "TRUE"} {$error_msg.email} {/if}</div><br>
            <div id="anim"><label>Data di nascita:</label><input type="text" id="data_nascita" size="20" maxlength="20" value="{$datiutente.data_nascita}" onchange="validazione('data_nascita');" readonly><a href=# onclick='return false;'><img src="./immagini/index.jpg" title="modifica" id="index" class='opzut' onclick="modifica('data_nascita');"></a><div id="risultato9"></div><br>

                </fieldset>

            </div>

            <div id="bottone"> 
                <input type="submit" id="submit2" value="Invia" onclick="subdatiutentenew(getdatiutentenew());"> 
            </div>
    </div>
             </div>