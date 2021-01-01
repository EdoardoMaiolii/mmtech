<section>
  <h1>DATI PERSONALI</h1>
  <p>Email: <?php echo $_SESSION["email"]; ?></p>
  <form action="profile.php" method="POST">
    <fieldset>
      <label for="profile-nome">Nome: </label>
      <input type="text" name="profile-nome" id="profile-nome" <?php echo $_SESSION["nome"] != NULL ? "value=" . $_SESSION["nome"] : ""; ?> disabled />
      <label for="profile-password">Password:</label>
      <input type="text" name="profile-password" id="profile-password" <?php echo $_SESSION["password"] != NULL ? "value=" . $_SESSION["password"] : ""; ?> disabled />
      <label for="profile-numerocarta">Numero Carta: </label>
      <input type="text" name="profile-numerocarta" id="profile-numerocarta" <?php echo $_SESSION["numerocarta"] != NULL ? "value=" . $_SESSION["numerocarta"] : ""; ?> disabled />
      <label for="profile-scadenzacarta">Scadenza Carta: </label>
      <input type="text" name="profile-scadenzacarta" id="profile-scadenzacarta" <?php echo $_SESSION["scadenzacarta"] != NULL ? "value=" . $_SESSION["scadenzacarta"] : ""; ?> disabled />
      <label for="profile-cvv">CVV: </label>
      <input type="text" name="profile-cvv" id="profile-cvv" <?php echo $_SESSION["cvvcarta"] != NULL ? "value=" . $_SESSION["cvvcarta"] : ""; ?> disabled />
      <?php if ($templateParams['header'] != "headerSeller.php") : ?>
        <strong> Se si desidera modificare i dati personali <a href="javascript:switchModify();"> Clicca qui' </a> </strong>
        <input type="submit" id="profile-modifyProfile" value="Submit" disabled />
      <?php endif; ?>
    </fieldset>
  </form>
</section>