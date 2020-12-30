<?php
if ($templateParams["header"] == "headerSeller.php") : ?>
    <section>
        <form id="form1" enctype="multipart/form-data" action="modProduct.php" method="POST">
            <input type="hidden" id="idprodotto" name="idprodotto" value=<?php echo $templateParams["product"]["idprodotto"] ?> />
            <label for="nomeProdotto">Nome Prodotto: </label><input type="text" id="nomeProdotto" name="nomeProdotto" value=<?php echo $templateParams["product"]["nome"] ?> /> </br>
            <label for="oldimgProdotto">Immagine corrente: </label><img  name="oldimgProdotto" id="oldimgProdotto" src="<?php echo UPLOAD_DIR . $templateParams["product"]["nomeimmagine"]; ?>" alt="" />
            <label for="imgProdotto">Modifica immagine: </label><input type="file" name="imgProdotto" id="imgProdotto" accept="image/png, image/jpeg, image/jpg, image/gif" /> </br>
            <label for="categoria">Categoria: </label><select id="categoria" name="categoria">
                <?php foreach ($templateParams["categories"] as $category) : ?>
                    <option <?php echo 'value = ' . $category['nomecategoria']." "; echo ($category['nomecategoria']==$templateParams["product"]["nomecategoria"]?"selected=selected":"")?>  > <?php echo $category['nomecategoria'] ?></option>
                <?php endforeach; ?>
            </select></br>
            <label for="costo">Costo: </label><input type="text" id="costo" name="costo" value=<?php echo $templateParams["product"]["costo"] ?>> </br>
            <label for="costoSpedizione">Costo Spedizione: </label><input type="text" id="costoSpedizione" name="costoSpedizione" value=<?php echo $templateParams["product"]["costospedizione"] ?>> </br>
            <label for="quantitaDisponibile">Quantita' disponibile: </label><input type="text" id="quantitaDisponibile" name="quantitaDisponibile" value=<?php echo $templateParams["product"]["quantitadisponibile"] ?>> </br>
            <label for="descrizione">Descrizione: </label><textarea name="descrizione" form="form1"><?php echo $templateParams["product"]["descrizione"] ?></textarea></br>
            <button type="submit" id="insertProduct" name="insertProduct"> Aggiorna Prodotto </button></br>
        </form>
    </section>
<?php else : ?>
    <section>
        <h1><?php echo $templateParams["product"]["nome"]; ?></h1>
        <img src="<?php echo UPLOAD_DIR . $templateParams["product"]["nomeimmagine"]; ?>" alt="" />
        <section>
            <?php echo $templateParams["product"]["descrizione"]; ?>
        </section>
        <p>Prezzo prodotto: <?php echo $templateParams["product"]["costo"]; ?> &euro;</p>
        <p>Costo spedizione: <?php echo $templateParams["product"]["costospedizione"]; ?> &euro;</p>
        <form action="addtocart.php" method="GET">
            <input type="hidden" id="idprodotto" name="idprodotto" value=<?php echo $templateParams["product"]["idprodotto"] ?> />
            <label for="quantita">Seleziona quantit&agrave;:</label>
            <select id = "quantita" name ="quantita">
                <?php for($i=1;$i<($templateParams["product"]['quantitadisponibile']>=10?10:$templateParams["product"]['quantitadisponibile']+1);$i++): ?>
                    <option <?php echo 'value = '.$i ?> ><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <?php if (isUserLoggedIn() && $templateParams["product"]["quantitadisponibile"] > 0) : ?>
                <button type="submit">Aggiungi al Carrello</button>
            <?php elseif ($templateParams["product"]["quantitadisponibile"] == 0) : ?>
                <button type="submit" disabled>Aggiungi al Carrello</button>
                <p>Prodotto non disponibile</p>
            <?php else : ?>
                <button type="submit" disabled>Aggiungi al Carrello</button>
                <p>Per aggiungere al carrello effettua il login</p>
            <?php endif; ?>
        </form>
    </section>
<?php endif; ?>