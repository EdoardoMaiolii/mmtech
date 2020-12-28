<section>
    <h1>Prodotti nel carrello</h1>
    <?php foreach ($templateParams['cartproducts'] as $product) : ?>
        <article>
            <h2> <?php echo $product['nome']; ?> </h2>
            <a href="product.php?productid=<?php echo (int) UPLOAD_DIR.$product["idprodotto"]; ?>"><img src="<?php echo UPLOAD_DIR.$product["nomeimmagine"]; ?>" alt="" /></a>
            <form action="updatecart.php" method="GET">
            <p>Quantit&agrave;: <?php echo $product['quantita']; ?></p>
            <select value = <?php echo $product['quantita']; ?>onchange="updateQuantity();">
                <?php for($i=1;$i<10;$i++): ?>
                    <option <?php if($product['quantita'] == $i) echo 'selected = selected'; echo 'value = '.$i ?> ><?php echo $i ?></option>
                <?php endfor; ?>
            </select>
            <a href="updatecart.php?action=1">Rimuovi articolo dal carrello</a>
            </form>
        </article>
    <?php endforeach; ?>
</section>