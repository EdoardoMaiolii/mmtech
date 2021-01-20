<section>
    <h1 class="bg-light"> GESTIONE PRODOTTI</h1>
    <div id="blackline"></div>
    <p id="ppar"> Inserisci un nuovo prodotto </p>
    <div class="bg-light" id="containerMid">
    <form enctype="multipart/form-data" id="form1" action="settings.php" method="POST">
        <fieldset>
            <div id="row" class="form-group">
                <label id="info" class="col-form-label" for="nomeProdotto">Nome Prodotto: </label><input class="form-control" type="text" id="nomeProdotto" name="nomeProdotto" /> </br>
            </div>
            <div id="row" class="form-group">
                <label id="info" class="col-form-label" for="imgProdotto">Immagine Prodotto: </label><input class="form-control" type="file" name="imgProdotto" id="imgProdotto" accept="image/png, image/jpeg, image/jpg, image/gif" /> </br>
            </div>
            <div id="mediumrow" class="form-group">
                <label id="info" class="col-form-label" for="categoria">Categoria: </label><select class="custom-select" id="categoria" name="categoria" ?>
                    <?php foreach ($templateParams["categories"] as $category) : ?>
                        <option <?php echo 'value = ' . $category['nomecategoria'] ?>> <?php echo $category['nomecategoria'] ?></option>
                    <?php endforeach; ?>
                </select></br>
            </div>
            <div id="minirow" class="form-group">
                <label id="info" class="col-form-label" for="costo">Costo: </label><input class="form-control" type="text" id="costo" name="costo" /> </br>
            </div>
            <div id="minirow" class="form-group">
                <label id="info" class="col-form-label" for="costoSpedizione">Costo Spedizione: </label><input class="form-control" type="text" id="costoSpedizione" name="costoSpedizione" /> </br>
            </div>
            <div id="minirow" class="form-group">
                <label id="info" class="col-form-label" for="quantitaDisponibile">Quantita' disponibile: </label><input class="form-control" type="text" id="quantitaDisponibile" name="quantitaDisponibile" /> </br>
            </div>
            <div id="row" class="form-group">
                <label id="info" class="col-form-label" for="descrizione">Descrizione: </label><textarea class="form-control" name="descrizione" form="form1" placeholder="Inserisci la descrizione qui..."></textarea></br>
            </div>
            <div id="row" class="form-group">
                <button id="btn" class="btn btn-primary" type="submit" id="insertProduct" name="insertProduct"> Inserisci il prodotto </button></br>
            </div>
        </fieldset>
    </form>
    </div>
    <p id="ppar"> <strong>Se si vuole modificare o eliminare un prodotto e' possibile farlo cercando il medesimo con la barra di ricerca oppure con il menu' laterale </strong> </p>
</section>