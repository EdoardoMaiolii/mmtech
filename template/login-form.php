<section>
    <form action="login.php" method="POST">
        <h2>Login</h2>
        <ul>
            <?php
            if (isset($templateParams["errorelogin"]))
                echo  $templateParams["errorelogin"];
            ?>
            <li>
                <label for="email">Email: </label><input type="text" id="email" name="email" />
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