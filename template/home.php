<section id="MostViewed">
    <h1>Prodotti piu' visualizzati</h1>
    <?php foreach ($templateParams["mostviewed"] as $product) : ?>
        <figure>
            <a href="product.php?productid=<?php echo $product["idprodotto"]; ?>"> <img src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" alt=<?php echo $product["nome"]; ?> /></a>
            <figcaption> <?php echo $product["nome"]; ?> </figcaption>
        </figure>
    <?php endforeach; ?>
</section>
<section id="Chronology">
    <?php if (isset($templateParams["chrono"])) : ?>
        <h1>Prodotti visualizati di recente</h1>
        <?php foreach ($templateParams["chrono"] as $product) : ?>
            <figure>
                <a href="product.php?productid=<?php echo $product["idprodotto"]; ?>"> <img src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" alt=<?php echo $product["nome"]; ?> /></a>
                <figcaption> <?php echo $product["nome"]; ?> </figcaption>
            </figure>
    <?php endforeach;
    endif; ?>
</section>