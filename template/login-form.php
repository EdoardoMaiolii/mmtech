<section class="bg-light">
<link rel="stylesheet" type="text/css" href="./css/profile-settings.css" />
    <h1>Login</h1>
    <div id="blackline"></div>
    <form class="form-inline" action="login.php" method="POST">
        <fieldset>
            <legend id="ppar"> Compila qui' sotto per accedere </legend>
            <?php
            if (isset($templateParams["errorelogin"]))
                echo  $templateParams["errorelogin"];
            ?>
                        <div id="row" class="form-group">
            <label  id="info" class="col-sm-2 col-form-label" for="email">Email: </label><input class="form-control" type="text" id="email" name="email" />
            </div>
            <div  id="row" class="form-group">
            <label id="info" class="col-sm-2 col-form-label" for="password">Password: </label><input class="form-control" type="password" id="password" name="password" />
            </div>
            <div id="row" class="form-group col-sm-10">
            <input class="btn btn-primary" type="submit" name="submit" value="Invia" />
            </div>
        </fieldset>
    </form>
    <p id="ppar">Se non sei ancora iscritto puoi iscriverti <a href="register.php"> cliccando qui </a></p>
</section>