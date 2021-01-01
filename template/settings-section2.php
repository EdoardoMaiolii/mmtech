<section>
<h1> GESTIONE ORDINI </h1>
    <?php
    if (!isset($templateParams['order-products'])): ?>
        <p> Lista degli ordini piu' recenti </p>
        <?php foreach ($templateParams["orders"] as $order) : ?>
        <div>
            <ul>
                <li> Id ordine: <?php echo $order['idordine'] ?></li>
                <li> Email: <?php echo $order['email'] ?></li>
                <li> Data ordine: <?php echo $order['dataordine'] ?></li>
                <li> Per visualizzare le specifiche di quest' ordine <a href=<?php echo "settings.php?view-ordine=" . $order['idordine'] ?>> Clicca qui' </a></li>
            </ul>
        </div>
    <?php endforeach; endif;
    if (isset($templateParams['order-products'])): ?>
    <p> Lista dei prodotti dell'ordine selezionato </p>
    <?php
        foreach ($templateParams["order-products"] as $products) : ?>
        <div>
            <ul>
                <li> Id Prodotto: <?php echo $products['idprodotto'] ?></li>
                <li> Nome: <?php echo $products['nome'] ?></li>
                <li> Categoria: <?php echo $products['nomecategoria'] ?></li>
                <li> Prezzo Unitario: <?php echo $products['prezzoacquisto'] . "$" ?></li>
                <li> Quantita': <?php echo $products['quantita'] ?></li>
            </ul>
        </div>
    <?php endforeach; endif; ?>
</section>