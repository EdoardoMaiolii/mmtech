<section class="bg-light">
<link rel="stylesheet" type="text/css" href="./css/profile-settings.css" />
    <h1>Registrati</h1>
    <div id="blackline"></div>
    <p id="ppar"> Compila il seguente form per iscriverti su MMTech </p>
    <?php
    if (isset($templateParams["erroreregister"]))
        echo  $templateParams["erroreregister"];
    ?>
    <form class="form-inline" action="register.php" method="POST">
        <fieldset>
        <div  id="row" class="form-group">
            <label id="info" class="col-sm-2 col-form-label" for="email">E-mail: </label><input class="form-control" type="text" id="email" name="email" />
            </div>
            <div  id="row" class="form-group">
            <label id="info" class="col-sm-2 col-form-label" for="nome">Nome: </label><input class="form-control" type="text" id="nome" name="nome" />
            </div>
            <div  id="row" class="form-group">
            <label id="info" class="col-sm-2 col-form-label" for="password">Password: </label><input class="form-control" type="password" id="password" name="password" />
            </div>
            <p id="ppar"> Metodo di pagamento: </p>
            <div  id="row" class="form-group">
            <label id="info" class="col-sm-2 col-form-label" for="numerocarta">Numero Carta: </label><input class="form-control" type="text" id="numerocarta" name="numerocarta" />
            </div>
            <div  id="row" class="form-group">
            <label id="info" class="col-sm-2 col-form-label" for="datascadenza">Data scadenza: </label><input class="form-control" type="text" id="datascadenza" name="datascadenza" />
            </div>
            <div  id="row" class="form-group">
            <label id="info" class="col-sm-2 col-form-label" for="cvvcarta">Cvv: </label><input class="form-control" type="text" id="cvvcarta" name="cvvcarta" />
            </div>
            <div  id="row" class="form-group col-sm-10">
            <input class="btn btn-primary" type="submit" name="submit" value="Registrati" />
            </div>
        </fieldset>
    </form>
</section>