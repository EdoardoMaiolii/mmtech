<?php
if ($templateParams["header"] == "headerSeller.php") : ?>
    <link rel="stylesheet" type="text/css" href="./css/profile-settings.css" />
    <section id="sezioneProd">
    <h1 class="bg-light"><?php echo $templateParams["product"]["nome"]; ?></h1>
        <div id="blackline"></div>
        <img id="productImage" src="<?php echo UPLOAD_DIR . $templateParams["product"]["nomeimmagine"]; ?>" alt="<?php echo $templateParams["product"]["nome"] ?>" />
        <div id="containerMid" class="bg-light"> 
        <form id="form1" enctype="multipart/form-data" action="modProduct.php" method="POST">
        <fieldset>
        <div id="row" class="form-group">
            <input type="hidden" id="idprodotto" name="idprodotto" value=<?php echo $templateParams["product"]["idprodotto"] ?> />
            </div>
        <div id="row" class="form-group">
            <label id="info" class="col-form-label"for="nomeProdotto">Nome Prodotto: </label><input class="form-control" type="text" id="nomeProdotto" name="nomeProdotto" <?php echo "value='".$templateParams["product"]["nome"]."' " ?> />
            </div>
        <div id="row" class="form-group">
            <label id="info" class="col-form-label" for="imgProdotto">Modifica immagine: </label><input style="font-size:calc(12px + 0.5vw);" class="form-control" type="file" name="imgProdotto" id="imgProdotto" accept="image/png, image/jpeg, image/jpg, image/gif" />
            </div>
        <div id="mediumrow" class="form-group">
            <label id="info" class="col-form-label" for="categoria">Categoria: </label><select  class="custom-select" id="categoria" name="categoria">
                <?php foreach ($templateParams["categories"] as $category) : ?>
                    <option <?php echo 'value = ' . $category['nomecategoria'] . " ";
                            echo ($category['nomecategoria'] == $templateParams["product"]["nomecategoria"] ? "selected=selected" : "") ?>> <?php echo $category['nomecategoria'] ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        <div id="mediumrow" class="form-group">
            <label id="info" class="col-form-label" for="costo">Costo: </label><input class="form-control" type="text" id="costo" name="costo" value=<?php echo $templateParams["product"]["costo"] ?>>
            </div>
        <div id="mediumrow" class="form-group">
            <label id="info" class="col-form-label" for="costoSpedizione">Costo Spedizione: </label><input class="form-control" type="text" id="costoSpedizione" name="costoSpedizione" value=<?php echo $templateParams["product"]["costospedizione"] ?>>
            </div>
        <div id="mediumrow" class="form-group"> 
            <label id="info" class="col-form-label" for="quantitaDisponibile">Quantita' disponibile: </label><input class="form-control" type="text" id="quantitaDisponibile" name="quantitaDisponibile" value=<?php echo $templateParams["product"]["quantitadisponibile"] ?>>
            </div>
        <div id="row" class="form-group"> 
            <label id="info" class="col-form-label" for="descrizione">Descrizione: </label><textarea class="form-control" name="descrizione" form="form1"><?php echo $templateParams["product"]["descrizione"] ?></textarea>
            </div>
        <div id="row" class="form-group">
            <button class="btn btn-primary" type="submit" id="insertProduct" name="insertProduct"> Aggiorna Prodotto </button>
            </div>
        </fieldset>
        </form>
        </div>
    </section>
<?php else : ?>
    <section id="sezioneProd">
        <h1 class="bg-light"><?php echo $templateParams["product"]["nome"]; ?></h1>
        <div id="blackline"></div>
        <img id="productImage" src="<?php echo UPLOAD_DIR . $templateParams["product"]["nomeimmagine"]; ?>" alt="<?php echo $templateParams["product"]["nome"] ?>" />
        <p id="descrizioneProdotto" class="bg-light">
            <?php echo $templateParams["product"]["descrizione"]; ?>
        </p>
        <div id='datiProdotto' class="bg-light">
            <p>Prezzo prodotto: <?php echo $templateParams["product"]["costo"]; ?> &euro;</p>
            <p>Costo spedizione: <?php echo $templateParams["product"]["costospedizione"]; ?> &euro;</p>
            <form action="addtocart.php" method="GET">
                <input type="hidden" id="idprodotto" name="idprodotto" value=<?php echo $templateParams["product"]["idprodotto"] ?> />
                <label for="quantita">Seleziona quantit&agrave;:</label>
                <select class="custom-select" id="quantita" name="quantita">
                    <?php for ($i = 1; $i < ($templateParams["product"]['quantitadisponibile'] >= 10 ? 10 : $templateParams["product"]['quantitadisponibile'] + 1); $i++) : ?>
                        <option <?php echo 'value = ' . $i ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <?php if (isUserLoggedIn() && $templateParams["product"]["quantitadisponibile"] > 0) : ?>
                    <button class="btn btn-primary" type="submit">Aggiungi al Carrello</button>
                <?php elseif ($templateParams["product"]["quantitadisponibile"] == 0) : ?>
                    <button class="btn btn-primary" type="submit" disabled>Aggiungi al Carrello</button>
                    <p>Prodotto non disponibile</p>
                <?php else : ?>
                    <button class="btn btn-primary" type="submit" disabled>Aggiungi al Carrello</button>
                    <p>Per aggiungere al carrello effettua il login</p>
                <?php endif; ?>
            </form>
        </div>
    </section>
<?php endif; ?>