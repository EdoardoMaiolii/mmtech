<section>
    <h1>Prodotti nel carrello</h1>
    <?php foreach ($templateParams['cartproducts'] as $product) : ?>
        <article>
            <h2> <?php echo $product['nome']; ?> </h2>
            <a href="product.php?productid=<?php echo (int) UPLOAD_DIR.$product["idprodotto"]; ?>"><img src="<?php echo UPLOAD_DIR.$product["nomeimmagine"]; ?>" alt="" /></a>
            <form action="updatecart.php" method="GET">
            <input type="hidden" name="idprodotto" id="idprodotto" value=<?php echo $product['idprodotto']; ?>/>
            <select id = "quantita" name = "quantita" onchange="submitQuantityBtn();" value = <?php echo $product['quantita']; ?>>
                <?php for($i=1;$i<10;$i++): ?>
                    <option <?php if($product['quantita'] == $i) echo 'selected = selected'; echo 'value = '.$i ?> ><?php echo $i; ?></option>
                <?php endfor; ?>
                <input type ="submit" id="updateQuantity" name="updateQuantity" hidden="hidden"/>
            </select>
            <a href="updatecart.php?action=1&idprodotto=<?php echo $product["idprodotto"] ?>">Rimuovi articolo dal carrello</a>
            </form>
        </article>
    <?php endforeach; ?>
    </br>
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
        <button type = "submit" id ="orderBtn" name ="orderBtn">Compra gli articoli nel carrello</button>
    </form>
</section>