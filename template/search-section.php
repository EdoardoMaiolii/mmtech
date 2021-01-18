<section>
    <h1>Risultato ricerca</h1>
    <?php
    if (!isset($templateParams['searchproducts']) || empty($templateParams['searchproducts'])) : ?>
        <h2 id="searchHeader"> Nessun elemento trovato</h2>
    <?php else :
        $products = $templateParams['searchproducts']; ?>
        <div class="row no-gutters">
            <?php foreach ($products as $product) : ?>
                <div class="product">
                    <figure class="gradient-border" id="box">
                        <a href="product.php?productid=<?php echo (int) UPLOAD_DIR . $product["idprodotto"]; ?>"><img class="homeImage" alt=<?php echo $product["nomeimmagine"] ?> src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" /></a>
                        <figcaption id="info"> <?php echo $product["nome"]; ?> </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>