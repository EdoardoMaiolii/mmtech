<section id="MostViewed">
    <h1>Prodotti piu' visualizzati</h1>
    <div id="blackline"></div>
    <div class="row no-gutters">
        <?php foreach ($templateParams["mostviewed"] as $product) : ?>
            <div id="box" class="product-img">
                <figure class="gradient-border" id="box">
                    <a href="product.php?productid=<?php echo $product["idprodotto"]; ?>"> <img class="homeImage" src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" alt=<?php echo $product["nome"]; ?> /></a>
                    <figcaption id="info"> <?php echo $product["nome"]; ?> </figcaption>
                </figure>
            </div>
        <?php endforeach; ?>
</section>
<section id="Chronology">
    <?php if (isset($templateParams["chrono"])) : ?>
        <h1>Prodotti visualizati di recente</h1>
        <div id="blackline"></div>
        <div class="row no-gutters">
            <?php foreach ($templateParams["chrono"] as $product) : ?>
                <div class="product-img">
                    <figure>
                        <a href="product.php?productid=<?php echo $product["idprodotto"]; ?>"> <img class="homeImage" src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" alt=<?php echo $product["nome"]; ?> /></a>
                        <figcaption> <?php echo $product["nome"]; ?> </figcaption>
                    </figure>
                </div>
            <?php endforeach;?>
        </div>
    <?php endif; ?>
</section>