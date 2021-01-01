<section>
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <fieldset>
            <legend> Compila qui' sotto per accedere </legend>
            <?php
            if (isset($templateParams["errorelogin"]))
                echo  $templateParams["errorelogin"];
            ?>
            <label for="email">Email: </label><input type="text" id="email" name="email" />
            <label for="password">Password: </label><input type="password" id="password" name="password" />
            <input type="submit" name="submit" value="Invia" />
        </fieldset>
    </form>
    <strong> Se non sei ancora iscritto puoi iscriverti <a href="register.php"> cliccando qui </a> </strong>
</section>