<section>
    <h1 class="bg-light">CARRELLO</h1>
    <div id="blackline"></div>
    
    <form method="GET">
    <fieldset>
    <legend>Lista di prodotti selezionati</legend>

    <p id='noprodotti'> <?php echo $templateParams["ordineEffettuato"]?"Ordine Effettuato con successo":(empty($templateParams['cartproducts'])?"Nessun prodotto nel carrello":" ")?>  </p>
    <?php foreach ($templateParams['cartproducts'] as $product): ?>
        <div id = <?php echo ("section-".$product["idprodotto"]) ?> class="cartContainer bg-light">
            <h2 id = 'ppar' class = "legend titleCart"> <?php echo $product['nome']; ?> </h2>
            <a href="product.php?productid=<?php echo (int) UPLOAD_DIR.$product["idprodotto"]; ?>"><img class ="cartImage" src="<?php echo UPLOAD_DIR.$product["nomeimmagine"]; ?>" alt="" /></a>
            <div id ='ppar' class="cartSelection">
                Quantita':       
                <select id = <?php echo 'quantita-'.$product['idprodotto'] ?> name =<?php echo 'quantita-'.$product['idprodotto']?> onchange="submitQuantityBtn(<?php echo ($product['idprodotto']) ?>,<?php echo ('\'quantita-'.$product['idprodotto'].'\'') ?>);" value = <?php echo $product['quantita']; ?>>
                    <?php for($i=1;$i<($product['quantitadisponibile']>=10?10:$product['quantitadisponibile']+1);$i++): ?>
                        <option <?php if($product['quantita'] == $i) echo 'selected = selected'; echo 'value = '.$i ?> ><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <p id = 'ppar' class = "my-3">Prezzo unitario: <?php echo $product['costo']?> &euro;</p>
                <p class = "my-3"><a class="link" onclick="removeProduct(<?php echo $product['idprodotto'] ?>,<?php echo '\'section-'.$product['idprodotto'].'\'' ?>)">Rimuovi articolo dal carrello</a></p>
            </div>
        </div>
    <?php endforeach; ?>
    </fieldset>
    </form>
    </br>
    <div <?php echo (empty($templateParams['cartproducts'])?" style='display:none' ":" ") ?>  id="riepilogo" class="cartRecap bg-light">
        <form action="cart.php" method ="POST">
        <fieldset>
        <legend class = 'legend'>Riepilogo ordine</legend>
            <input type="hidden" id="order" name="order" value ="true">
            <p><label for="address">Indirizzo di consegna: <input type="text" required></label></p>
            <p><label for="fastShip"> Consegna rapida: </label><input type="checkbox" id="fastShip"></p>

            <p>Prezzo totale senza Iva: </p><p id = "noIvaPrice">
            <?php 
                $costoTotale = 0;
                foreach($templateParams['cartproducts'] as $p){
                    $costoTotale = $costoTotale + ($p['costo']*$p['quantita'])+ $p['costospedizione'];
                }
                echo $costoTotale;
            ?> &euro;</p>
            <p>Prezzo totale (Iva al 22%): </p><p id="totalPrice">
            <?php 
                echo round(($costoTotale * 1.22),2);
            ?> &euro;</p>
            <?php if(!empty($_SESSION["numerocarta"]) && !empty($_SESSION["scadenzacarta"]) && !empty($_SESSION["cvvcarta"]) && !empty($templateParams['cartproducts'])):?>
                <button class="btn btn-primary" type = "submit" id ="orderBtn"> Compra gli articoli nel carrello </button>
            <?php else:?>
                <button class="btn btn-primary" type = "submit" id ="orderBtn" disabled> Compra gli articoli nel carrello </button>
                <p id="error"><strong>Inserire carta di credito</strong></p>
            <?php endif;?>
        </fieldset>
        </form>
    </div> 
</section>