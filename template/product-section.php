<section>
    <h1><?php echo $templateParams["product"]["nome"]; ?></h1>
    <img src="<?php echo UPLOAD_DIR.$templateParams["product"]["nomeimmagine"]; ?>" alt="" />
    <section>
    <?php echo $templateParams["product"]["descrizione"]; ?>
    </section>
    <p>Prezzo prodotto: <?php echo $templateParams["product"]["costo"]; ?> &euro;</p>
    <p>Costo spedizione: <?php echo $templateParams["product"]["costospedizione"]; ?> &euro;</p>
    <form action="addtocart.php" method="GET">
        <input type = "hidden" id="idprodotto" name="idprodotto" value = <?php echo $templateParams["product"]["idprodotto"]?> />
        <label for="quantita">Seleziona quantit&agrave;:</label>
        <select name="quantita" id="quantita">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>
        <?php if(isUserLoggedIn() && $templateParams["product"]["quantitadisponibile"]>0):?>
        <button type ="submit">Aggiungi al Carrello</button>
        <?php elseif($templateParams["product"]["quantitadisponibile"] == 0):?>
        <button type ="submit" disabled>Aggiungi al Carrello</button>
        <p>Prodotto non disponibile</p>
        <?php else:?>
        <button type ="submit" disabled>Aggiungi al Carrello</button>
        <p>Per aggiungere al carrello effettua il login</p>
        <?php endif;?>
    </form>
</section>