<section>
    <h1>Prodotti piu' visualizzati</h1>
    <?php foreach ($templateParams["mostviewed"] as $product) : ?>
        <article>
            <h2> <?php echo $product['nome']; ?> </h2>
            <img src="<?php echo UPLOAD_DIR.$product["nomeimmagine"]; ?>" alt="" />
            <form action="addtocart.php" method="GET">
                <input type = "hidden" id="idprodotto" name="idprodotto" value = <?php $product["idprodotto"]?> />
                <button type ="submit">Aggiungi al Carrello</button>
            </form>
        </article> 
    <?php endforeach; ?>
</section>
<section>
    <?php if (isset($templateParams["chrono"])): ?>
    <h1>Prodotti visualizati di recente</h1>
    <?php foreach ($templateParams["chrono"] as $product) : ?>
        <article>
            <h2> <?php echo $product['nome']; ?> </h2>
            <img src="<?php echo UPLOAD_DIR.$product["nomeimmagine"]; ?>" alt="" />
        </article>
    <?php endforeach; endif;?>
</section>