<section>
    <h1>Registrati</h1>
    <p> Compila il seguente form per iscriverti su MMTech </p>
    <?php
    if (isset($templateParams["erroreregister"]))
        echo  $templateParams["erroreregister"];
    ?>
    <form action="register.php" method="POST">
        <fieldset>
            <label for="email">E-mail: </label><input type="text" id="email" name="email" />
            <label for="nome">Nome: </label><input type="text" id="nome" name="nome" />
            <label for="password">Password: </label><input type="password" id="password" name="password" />
            <p> Metodo di pagamento: </p>
            <label for="numerocarta">Numero Carta: </label><input type="text" id="numerocarta" name="numerocarta" />
            <label for="datascadenza">Data scadenza: </label><input type="text" id="datascadenza" name="datascadenza" />
            <label for="cvvcarta">Cvv: </label><input type="text" id="cvvcarta" name="cvvcarta" />
            <input type="submit" name="submit" value="Registrati" />
        </fieldset>
    </form>
</section>