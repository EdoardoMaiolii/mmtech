<section>
    <form action="login.php" method="POST">
        <h2>Login</h2>
        <ul>
            <input type="hidden" id="type" name="type" value="Login" />
            <?php
            if (isset($templateParams["errorelogin"]))
                echo  $templateParams["errorelogin"];
            ?>
            <li>
                <label for="Email">Email: </label><input type="text" id="Email" name="Email" />
            </li>
            <li>
                <label for="password">Password: </label><input type="password" id="password" name="password" />
            </li>
            <li>
                <input type="submit" name="submit" value="Invia" />
            </li>
        </ul>
    </form>
    <p> Se non sei ancora iscritto puoi iscriverti <a href="register.php"> cliccando qui </a> </p>
</section>