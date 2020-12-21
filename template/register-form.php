<section>
    <form action="login.php" method="POST">
        <h2>Login</h2>
        <ul>
            <input type="hidden" id="type" name="type" value="Register" />
            <?php
            if (isset($templateParams["erroreregister"]))
                echo  $templateParams["erroreregister"];
            ?>
            <li>
                <label for="email">E-mail: </label><input type="text" id="email" name="email" />
            </li>
            <li>
                <label for="nome">Nome: </label><input type="text" id="nome" name="nome" />
            </li>
            <li>
                <label for="password">Password: </label><input type="password" id="password" name="password" />
            </li>
            <p> Metodo di pagamento: </p>
            <li>
                <label for="numerocarta">Numero Carta: </label><input type="text" id="numerocarta" name="numerocarta" />
            </li>
            <li>
                <label for="datascadenza">Data scadenza: </label><input type="text" id="datascadenza" name="datascadenza" />
            </li>
            <li>
                <label for="cvvcarta">Cvv: </label><input type="text" id="cvvcarta" name="cvvcarta" />
            </li>
            <li>
                <input type="submit" name="submit" value="Registrati" />
            </li>
        </ul>
    </form>
</section>