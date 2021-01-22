<section>
    <link rel="stylesheet" type="text/css" href="./css/profile-settings.css" />
    <h1 class="bg-light">Login</h1>
    <div id="blackline"></div>
    <?php
    if (isset($templateParams['newPass']) && !$templateParams['newPass']) :
    ?>
        <p id="ppar"> Verifica la tua mail </p>
        <div id="containerMid" class="bg-light">
            <form action="login.php" method="POST">
                <fieldset>
                    <?php
                    if (isset($templateParams["errorelogin"])) : ?>
                        <p id="error"><strong>
                                <?php echo  $templateParams["errorelogin"]; ?>
                        </p> <strong>
                        <?php endif; ?>
                        <div id="row" class="form-group">
                            <label id="info" class="col-form-label" for="newemail">Email: </label><input class="form-control" type="text" id="newemail" name="newemail" required/>
                        </div>
                        <div id="row" class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Ricevi codice" />
                        </div>
                </fieldset>
            </form>
        <?php elseif (isset($templateParams['newPass']) && $templateParams['newPass']) : ?>
            <p id="ppar"> Compila qui sotto per cambiare password </p>
            <div id="containerMid" class="bg-light">
                <form action="login.php" method="POST">
                    <fieldset>
                        <?php
                        if (isset($templateParams["errorelogin"])) : ?>
                            <p id="error"><strong>
                            <?php echo  $templateParams["errorelogin"]; ?>
                            </p> <strong>
                            <?php endif; ?>
                            <div id="row" class="form-group">
                                <label id="info" class="col-form-label" for="email">Email: </label><input class="form-control" type="text" id="email" name="email" <?php echo ("value= " . "'" . $templateParams["tmpEmail"] . "' ") ?> readonly/>
                            </div>
                            <div id="row" class="form-group">
                                <label id="info" class="col-form-label" for="newpassword">Nuova password: </label><input class="form-control" type="password" id="newpassword" name="newpassword" required/>
                            </div>
                            <div id="minirow" class="form-group">
                                <label id="info" class="col-form-label" for="codice">Codice ricevuto: </label><input class="form-control" type="text" id="codice" name="codice" maxlength="5" required/>
                            </div>
                            <div id="row" class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Cambia password" />
                            </div>
                    </fieldset>
                </form>
            <?php else : ?>
                <p id="ppar"> Compila qui sotto per accedere </p>
                <div id="containerMid" class="bg-light">
                    <form action="login.php" method="POST">
                        <fieldset>
                            <?php
                            if (isset($templateParams["errorelogin"])) : ?>
                                <p id="error"><strong>
                                        <?php echo  $templateParams["errorelogin"]; ?>
                                </p> <strong>
                                <?php endif; ?>
                                <div id="row" class="form-group">
                                    <label id="info" class="col-form-label" for="email">Email: </label><input class="form-control" type="text" id="email" name="email" required/>
                                </div>
                                <div id="row" class="form-group">
                                    <label id="info" class="col-form-label" for="password">Password: </label><input class="form-control" type="password" id="password" name="password" required/>
                                </div>
                                <div id="row" class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Invia" />
                                </div>
                        </fieldset>
                    </form>
                    <p id="ppar">Se non sei ancora iscritto puoi iscriverti <a href="register.php"> cliccando qui </a></p>
                    <p id="ppar">Se hai dimenticato la password puoi cambiarla <a class="link" onclick="newPassPage()"> cliccando qui </a></p>
                <form method="POST" action="login.php"> 
                <input type="hidden" name="newPass" id="newPass" value="true" />
                <input type="submit" id="newPassBtn" hidden/>
                </form>
                </div>
            <?php endif; ?>
</section>