<section>
    <h1>Prodotti nel carrello</h1>
    <form action="updatecart.php" method="GET">
    <?php foreach ($templateParams['cartproducts'] as $product) : ?>
        <article>
            <h2> <?php echo $product['nome']; ?> </h2>
            <a href="product.php?productid=<?php echo (int) UPLOAD_DIR.$product["idprodotto"]; ?>"><img src="<?php echo UPLOAD_DIR.$product["nomeimmagine"]; ?>" alt="" /></a>
            <select id = <?php echo 'quantita-'.$product['idprodotto'] ?> name =<?php echo 'quantita-'.$product['idprodotto']?> onchange="submitQuantityBtn();" value = <?php echo $product['quantita']; ?>>
                <?php for($i=1;$i<($product['quantitadisponibile']>=10?10:$product['quantitadisponibile']+1);$i++): ?>
                    <option <?php if($product['quantita'] == $i) echo 'selected = selected'; echo 'value = '.$i ?> ><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <a href="updatecart.php?action=1&idprodotto=<?php echo $product["idprodotto"] ?>">Rimuovi articolo dal carrello</a>
        </article>
    <?php endforeach; ?>
    <input type ="submit" id="updateQuantity" name="updateQuantity" hidden="hidden"/>
    </form>
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