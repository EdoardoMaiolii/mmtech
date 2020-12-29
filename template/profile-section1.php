<h1>  DATI PERSONALI</h1>
<p>Email: <?php echo $_SESSION["email"]; ?></p> 
<form action="profile.php" method="POST">
  <label for="profile-nome">Nome: </label>
  <input type="text" name="profile-nome" id="profile-nome" value=<?php echo $_SESSION["nome"]; ?> disabled> </br>
  <label for="profile-password">Password:</label>
  <input type="text" name="profile-password" id="profile-password" value=<?php echo $_SESSION["password"]; ?> disabled> </br> 
  <label for="profile-numerocarta">Numero Carta: </label>
  <input type="text" name="profile-numerocarta" id="profile-numerocarta" value=<?php echo $_SESSION["numerocarta"]; ?> disabled> </br>
  <label for="profile-scadenzacarta">Scadenza Carta: </label>
  <input type="text" name="profile-scadenzacarta" id="profile-scadenzacarta" value=<?php echo $_SESSION["scadenzacarta"]; ?> disabled> </br>
  <label for="profile-cvv">CVV: </label>
  <input type="text" name="profile-cvv" id="profile-cvv" value=<?php echo $_SESSION["cvvcarta"]; ?> disabled> </br> </br>
  <p> Se si desidera modificare i dati personali <a href="javascript:switchModify();"> Clicca qui' </a> </p>
  <input type="submit" id="profile-modifyProfile" value="Submit" disabled>
</form>