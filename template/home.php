<section id="MostViewed">
    <h1 class="bg-light">HOME</h1>
    <div id="blackline"></div>
    <h1 class="classifica">Prodotti pi&ugrave; visualizzati</h1>
    <div class="row no-gutters">
        <?php foreach ($templateParams["mostviewed"] as $product) : ?>
            <div class="product">
                <figure class="gradient-border" id="box">
                    <a href="product.php?productid=<?php echo $product["idprodotto"]; ?>"> <img class="homeImage" src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" alt=<?php echo $product["nome"]; ?> /></a>
                    <figcaption id="info"> <?php echo $product["nome"]; ?> </figcaption>
                </figure>
            </div>
        <?php endforeach; ?>
</section>
<section id="Chronology">
    <?php if (isset($templateParams["chrono"])) : ?>
        <h1 class="classifica">Prodotti visualizati di recente</h1>
        <div class="row no-gutters">
        <?php echo empty($templateParams["chrono"])?"<p style='text-align: center; width: 100%;' id='ppar'>Non &egrave; stato ancora visualizzato alcun prodotto</p>":" " ?>
            <?php foreach ($templateParams["chrono"] as $product) : ?>
                <div class="product">
                    <figure class="gradient-border" id="box">
                        <a href="product.php?productid=<?php echo $product["idprodotto"]; ?>"> <img class="homeImage" src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" alt=<?php echo $product["nome"]; ?> /></a>
                        <figcaption> <?php echo $product["nome"]; ?> </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
<section id="BestSeller">
    <?php if (isset($templateParams["bestseller"])) : ?>
        <h1 class="classifica">Prodotti pi&ugrave; venduti</h1>
        <div class="row no-gutters">
            <?php foreach ($templateParams["bestseller"] as $product) : ?>
                <div class="product">
                    <figure class="gradient-border" id="box">
                        <a href="product.php?productid=<?php echo $product["idprodotto"]; ?>"> <img class="homeImage" src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" alt=<?php echo $product["nome"]; ?> /></a>
                        <figcaption> <?php echo $product["nome"]; ?> </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
<section id="lessAvailable">
    <?php if (isset($templateParams["lessavailable"])) : ?>
        <h1 class="classifica">Prodotti con scarsa disponibilit&agrave;</h1>
        <div class="row no-gutters">
            <?php foreach ($templateParams["lessavailable"] as $product) : ?>
                <div class="product">
                    <figure class="gradient-border" id="box">
                        <a href="product.php?productid=<?php echo $product["idprodotto"]; ?>"> <img class="homeImage" src="<?php echo UPLOAD_DIR . $product["nomeimmagine"]; ?>" alt=<?php echo $product["nome"]; ?> /></a>
                        <figcaption> <?php echo $product["nome"]; ?> </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>