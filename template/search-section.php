<section>
    <h1>Risultato ricerca</h1>
    <?php
    $products = $templateParams['searchproducts'];
    if (empty($products)) : ?>
        <h2> Nessun elemento trovato</h2>
        <?php else :
        foreach ($products as $product) : ?>
            <div>
                <h2> <?php echo $product['nome']; ?> </h2>
                <a href="product.php?productid=<?php echo (int) UPLOAD_DIR . $product["idprodotto"]; ?>"><img alt=<?php echo $product["nomeimmagine"] ?> src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" /></a>
            </div>
    <?php endforeach;
    endif; ?>
</section>