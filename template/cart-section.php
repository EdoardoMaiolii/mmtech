<section>
    <h1 class="bg-light">CARRELLO</h1>
    <div id="blackline"></div>
    <form action="updatecart.php" method="GET">
    <fieldset>
    <legend>Lista di prodotti selezionati</legend>
    <?php if($templateParams["ordineEffettuato"]):?>
    <p id='ppar'>Ordine Effettuato con successo</p>
    <?php elseif(empty($templateParams['cartproducts'])):?>
    <p id='ppar'><i>Nessun prodotto nel carrello</i></p>
    <?php endif;?>
    <?php foreach ($templateParams['cartproducts'] as $product): ?>
        <div class="cartContainer bg-light">
            <h2 id = 'ppar' class = "legend titleCart"> <?php echo $product['nome']; ?> </h2>
            <a href="product.php?productid=<?php echo (int) UPLOAD_DIR.$product["idprodotto"]; ?>"><img class ="cartImage" src="<?php echo UPLOAD_DIR.$product["nomeimmagine"]; ?>" alt="" /></a>
            <div id ='ppar' class="cartSelection">
                Quantita':       
                <select id = <?php echo 'quantita-'.$product['idprodotto'] ?> name =<?php echo 'quantita-'.$product['idprodotto']?> onchange="submitQuantityBtn();" value = <?php echo $product['quantita']; ?>>
                    <?php for($i=1;$i<($product['quantitadisponibile']>=10?10:$product['quantitadisponibile']+1);$i++): ?>
                        <option <?php if($product['quantita'] == $i) echo 'selected = selected'; echo 'value = '.$i ?> ><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <p id = 'ppar' class = "my-3">Prezzo unitario: <?php echo $product['costo']?>&euro;</p>
                <p class = "my-3"><a href="updatecart.php?action=1&idprodotto=<?php echo $product["idprodotto"] ?>">Rimuovi articolo dal carrello</a></p>
            </div>
        </div>
    <?php endforeach; ?>
    <input type ="submit" id="updateQuantity" name="updateQuantity" hidden="hidden"/>
    </fieldset>
    </form>
    </br>
    <div class="cartRecap bg-light">
        <form action="updatecart.php" method ="GET">
        <fieldset>
        <legend class = 'legend'>Riepilogo ordine</legend>
            <input type="hidden" id="order" name="order" value ="true">
            <p><label for="address">Indirizzo di consegna: <input type="text" id="address" name="address" required></label></p>
            <p><label for="fastShip"> Consegna rapida: </label><?php if(!empty($templateParams['cartproducts'])):?><input type="checkbox" id="fastShip" name="fastShip"><?php else:?><input type="checkbox" id="fastShip" name="fastShip" disabled><?php endif;?><br</p>

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
                <input class="btn btn-primary" type = "submit" id ="orderBtn" name ="orderBtn" value="Compra gli articoli nel carrello">
            <?php elseif(!empty($templateParams['cartproducts'])):?>
                <button class="btn btn-primary" type = "submit" id ="orderBtn" name ="orderBtn" disabled>Compra gli articoli nel carrello</button>
                <p id="error"><strong>Inserire carta di credito</strong></p>
            <?php else:?>
                <button class="btn btn-primary" type = "submit" id ="orderBtn" name ="orderBtn" disabled>Compra gli articoli nel carrello</button>
            <?php endif;?>
        </fieldset>
        </form>
    </div> 
</section>