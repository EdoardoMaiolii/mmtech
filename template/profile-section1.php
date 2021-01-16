<section class="bg-light">
  <h1>DATI PERSONALI</h1>
  <div id="blackline"></div>
  <div id="containerMid">
    <p id="ppar"> La tua email:
    <p>
    <h2><?php echo $_SESSION["email"]; ?></h2>
    <form action="profile.php" method="POST">
      <fieldset>
        <div id="row" class="form-group">
          <label id="info" class="col-sm-2 col-form-label" for="profile-nome">Nome: </label>
          <input class="form-control" type="text" name="profile-nome" id="profile-nome" <?php echo $_SESSION["nome"] != NULL ? "value=" . $_SESSION["nome"] : ""; ?> disabled />
        </div>
        <div id="row" class="form-group">
          <label id="info" class="col-sm-2 col-form-label" for="profile-password">Password:</label>
          <input class="form-control" type="text" name="profile-password" id="profile-password" <?php echo $_SESSION["password"] != NULL ? "value=" . $_SESSION["password"] : ""; ?> disabled />
        </div>
        <p id="ppar"> Il tuo metodo di pagamento:
        <p>
        <div id="row" class="form-group">
          <label id="info" class="col-form-label" for="profile-numerocarta">Numero Carta: </label>
          <input class="form-control" type="text" name="profile-numerocarta" id="profile-numerocarta" <?php echo $_SESSION["numerocarta"] != NULL ? "value=" . $_SESSION["numerocarta"] : ""; ?> disabled />
        </div>
        <div id="mediumrow" class="form-group">
          <label id="info" class="col-form-label" for="profile-scadenzacarta">Scadenza Carta: </label>
          <input class="form-control" type="text" name="profile-scadenzacarta" id="profile-scadenzacarta" <?php echo $_SESSION["scadenzacarta"] != NULL ? "value=" . $_SESSION["scadenzacarta"] : ""; ?> disabled />
        </div>
        <div id="minirow" class="form-group">
          <label id="info" class="col-form-label" for="profile-cvv">CVV: </label>
          <input class="form-control" type="text" name="profile-cvv" id="profile-cvv" <?php echo $_SESSION["cvvcarta"] != NULL ? "value=" . $_SESSION["cvvcarta"] : ""; ?> disabled />
        </div>
        <?php if ($templateParams['header'] != "headerSeller.php") : ?>
          <p id="ppar"><strong> Se si desidera modificare i dati personali <a href="javascript:switchModify();"> Clicca qui' </a> </strong></p>
          <div id="row" class="form-group">
            <input id="btn" class="btn btn-primary" type="submit" value="Submit" disabled />
          </div>
        <?php endif; ?>
      </fieldset>
    </form>
  </div>
</section>