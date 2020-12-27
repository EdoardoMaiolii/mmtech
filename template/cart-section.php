<section>
    <h1>Prodotti nel carrello</h1>
    <?php foreach ($templateParams['cartproducts'] as $product) : ?>
        <article>
            <h2> <?php echo $product['nome']; ?> </h2>
            <img src="<?php echo UPLOAD_DIR.$product["nomeimmagine"]; ?>" alt="" />
        </article>
    <?php endforeach; ?>
</section>