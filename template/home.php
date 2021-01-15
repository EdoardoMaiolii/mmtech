<section id="MostViewed">
    <h1>Prodotti piu' visualizzati</h1>
    <div class="row no-gutters">
        <?php foreach ($templateParams["mostviewed"] as $product) : ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 my-5 pl-5">
                <figure>
                    <a href="product.php?productid=<?php echo $product["idprodotto"]; ?>"> <img class="homeImage" src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" alt=<?php echo $product["nome"]; ?> /></a>
                    <figcaption> <?php echo $product["nome"]; ?> </figcaption>
                </figure>
            </div>
        <?php endforeach; ?>
    </div>
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