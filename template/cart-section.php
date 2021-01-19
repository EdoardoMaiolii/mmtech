<section>
    <h1 class="bg-light">CARRELLO</h1>
    <div id="blackline"></div>
    <form action="updatecart.php" method="GET">
    <fieldset>
    <legend>Lista di prodotti selezionati</legend>
    <?php foreach ($templateParams['cartproducts'] as $product): ?>
        <div class="cartContainer bg-light">
            <h2 class = "titleCart"> <?php echo $product['nome']; ?> </h2>
            <a href="product.php?productid=<?php echo (int) UPLOAD_DIR.$product["idprodotto"]; ?>"><img class ="cartImage" src="<?php echo UPLOAD_DIR.$product["nomeimmagine"]; ?>" alt="" /></a>
            <div class="cartSelection">
                <select id = <?php echo 'quantita-'.$product['idprodotto'] ?> name =<?php echo 'quantita-'.$product['idprodotto']?> onchange="submitQuantityBtn();" value = <?php echo $product['quantita']; ?>>
                    <?php for($i=1;$i<($product['quantitadisponibile']>=10?10:$product['quantitadisponibile']+1);$i++): ?>
                        <option <?php if($product['quantita'] == $i) echo 'selected = selected'; echo 'value = '.$i ?> ><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <a href="updatecart.php?action=1&idprodotto=<?php echo $product["idprodotto"] ?>">Rimuovi articolo dal carrello</a>
            </div>
        </div>
    <?php endforeach; ?>
    <input type ="submit" id="updateQuantity" name="updateQuantity" hidden="hidden"/>
    </fieldset>
    </form>
    </br>
    <div class="cartRecap bg-light">
        <form action="updatecart.php" method ="GET">
            <input type="hidden" id="order" name="order" value ="true">
            <p>Costo totale <?php 
            $costoTotale = 0;
            foreach($templateParams['cartproducts'] as $p){
                $costoTotale = $costoTotale + ($p['costo']*$p['quantita'])+ $p['costospedizione'];
            }
            echo $costoTotale;
            ?> &euro;
            </p>
            <button class="btn btn-primary" type = "submit" id ="orderBtn" name ="orderBtn">Compra gli articoli nel carrello</button>
        </form>
    </div>
</section>