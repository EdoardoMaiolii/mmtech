<section class="bg-light">
<h1> GESTIONE ORDINI </h1>
<div id="blackline"></div>
    <?php
    if (!isset($templateParams['order-products'])): ?>
        <p id="ppar"> Lista degli ordini piu' recenti </p>
        <?php foreach ($templateParams["orders"] as $order) : ?>
        <div id="ord">
            <ul class="list-group list-group-flush">
                <li class="list-group-item list-group-item-primary"> Id ordine: <?php echo $order['idordine'] ?></li>
                <li class="list-group-item list-group-item-secondary"> Email: <?php echo $order['email'] ?></li>
                <li class="list-group-item list-group-item-dark"> Data ordine: <?php echo $order['dataordine'] ?></li>
                <a href=<?php echo "settings.php?view-ordine=" . $order['idordine'] ?> class="list-group-item list-group-item-action list-group-item-info"> Per visualizzare le specifiche di quest' ordine clicca qui' </a>
       </ul>
        </div>
    <?php endforeach; endif;
    if (isset($templateParams['order-products'])): ?>
    <p id="ppar"> Lista dei prodotti dell'ordine selezionato </p>
    <?php
        foreach ($templateParams["order-products"] as $products) : ?>
        <div id="ord">
            <ul class="list-group list-group-flush">
                <li class="list-group-item list-group-item-primary"> Id Prodotto: <?php echo $products['idprodotto'] ?></li>
                <li class="list-group-item list-group-item-secondary"> Nome: <?php echo $products['nome'] ?></li>
                <li class="list-group-item list-group-item-warning"> Categoria: <?php echo $products['nomecategoria'] ?></li>
                <li class="list-group-item list-group-item-success"> Prezzo Unitario: <?php echo $products['prezzoacquisto'] . "$" ?></li>
                <li class="list-group-item list-group-item-success"> Quantita': <?php echo $products['quantita'] ?></li>
            </ul>
        </div>
    <?php endforeach; endif; ?>
</section>