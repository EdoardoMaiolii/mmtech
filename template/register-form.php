<section>
    <link rel="stylesheet" type="text/css" href="./css/profile-settings.css" />
    <h1 class="bg-light">Registrati</h1>
    <div id="blackline"></div>
    <p id="ppar"> Compila il seguente form per iscriverti su MMTech </p>
    <div id="containerMid" class="bg-light">
        <?php
        if (isset($templateParams["erroreregster"])) : ?>
            <p id="error"><strong>
                    <?php echo  $templateParams['erroreregster']; ?>
            </p> <strong>
            <?php endif; ?>
            <form action="register.php" method="POST">
                <fieldset>
                    <div id="row" class="form-group">
                        <label id="info" class="col-form-label" for="email">E-mail: </label><input class="form-control" type="text" id="email" name="email" required/>
                    </div>
                    <div id="row" class="form-group">
                        <label id="info" class="col-form-label" for="nome">Nome: </label><input class="form-control" type="text" id="nome" name="nome" required/>
                    </div>
                    <div id="row" class="form-group">
                        <label id="info" class="col-form-label" for="password">Password: </label><input class="form-control" type="password" id="password" name="password" required/>
                    </div>
                    <p id="ppar"> Metodo di pagamento: </p>
                    <div id="row" class="form-group">
                        <label id="info" class="col-form-label" for="numerocarta">Numero Carta: </label><input class="form-control" type="text" pattern="\d*" id="numerocarta" name="numerocarta" minlength="16" maxlength="16" />
                    </div>
                    <div id="minirow" class="form-group">
                        <label id="info" class="col-form-label" for="datascadenza">Data scadenza: </label><input class="form-control" type="month" id="datascadenza" name="datascadenza" min="2021-01" />
                    </div>
                    <div id="minirow" class="form-group">
                        <label id="info" class="col-form-label" for="cvvcarta">Cvv: </label><input class="form-control" type="text" id="cvvcarta" name="cvvcarta" pattern="\d*" minlength="3" maxlength="3" />
                    </div>
                    <div id="row" class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Registrati" />
                    </div>
                </fieldset>
            </form>
    </div>
</section>