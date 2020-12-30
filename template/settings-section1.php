<h1> GESTIONE PRODOTTI</h1>
<h2> Inserisci un nuovo prodotto </h2>
<form enctype="multipart/form-data" id="form1" action="settings.php" method="POST">
    <label for="nomeProdotto">Nome Prodotto: </label><input type="text" id="nomeProdotto" name="nomeProdotto" /> </br>
    <label for="imgProdotto">Immagine Prodotto: </label><input type="file" name="imgProdotto" id="imgProdotto" accept="image/png, image/jpeg, image/jpg, image/gif"/> </br>
    <label for="categoria">Categoria: </label><select id="categoria" name="categoria" ?>
        <?php foreach ($templateParams["categories"] as $category) : ?>
            <option <?php echo 'value = ' . $category['nomecategoria'] ?>> <?php echo $category['nomecategoria'] ?></option>
        <?php endforeach; ?>
    </select></br>
    <label for="costo">Costo: </label><input type="text" id="costo" name="costo" /> </br>
    <label for="costoSpedizione">Costo Spedizione: </label><input type="text" id="costoSpedizione" name="costoSpedizione" /> </br>
    <label for="quantitaDisponibile">Quantita' disponibile: </label><input type="text" id="quantitaDisponibile" name="quantitaDisponibile" /> </br>
    <label for="descrizione">Descrizione: </label><textarea name="descrizione" form="form1" placeholder="Inserisci la descrizione qui..."></textarea></br>
    <button type="submit" id="insertProduct" name="insertProduct"> Inserisci il prodotto </button></br>
</form>
<p> <i>Se si vuole modificare o eliminare un prodotto e' possibile farlo cercando il medesimo con la barra di ricerca oppure con il menu' laterale </i> </p>