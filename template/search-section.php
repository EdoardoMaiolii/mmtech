<section>
    <h1>Risultato ricerca</h1>
    <?php 
    $products = $templateParams['searchproducts'];
    if(empty($products)):?>  
        <h2> Nessun elemento trovato</h2>
    <?php else:
        foreach ($products as $product) : ?>
        <article>
            <h2> <?php echo $product['nome']; ?> </h2>
            <img src="<?php echo UPLOAD_DIR.$product["nomeimmagine"]; ?>" alt="" />
        </article>
        <?php endforeach; 
    endif;?>
</section>