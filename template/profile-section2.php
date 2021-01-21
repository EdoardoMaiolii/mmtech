<section>
    <?php
    if ($templateParams['header'] != "headerSeller.php")
        if (!isset($templateParams['order-products'])) : ?>
        <h1 class="bg-light"> ORDINI EFFETTUATI</h1>
        <div id="blackline"></div>
        <p id="ppar"> Lista degli ordini effettuati </p>
        <?php foreach ($templateParams["orders"] as $order) : ?>
            <div id="ord">
                <ul class="list-group list-group-flush">
                    <li style="  color: white;" class="list-group-item bg-dark"> Id ordine: <?php echo $order['idordine'] ?></li>
                    <li class="list-group-item list-group-item-dark"> Data ordine: <?php echo $order['dataordine'] ?></li>
                    <li class="list-group-item list-group-item-light"> Stato ordine: <?php echo "<strong>".$order['statoordine']."</strong>" ?></li>
                    <a style="  color: #007bff; text-align: center;" href=<?php echo "profile.php?view-ordine=" . $order['idordine'] ?> class="list-group-item list-group-item-action list-group-item-secondary"> Per visualizzare le specifiche di quest' ordine clicca qui' </a>
                </ul>
            </div>
        <?php endforeach;
        endif;
    if ($templateParams['header'] != "headerSeller.php")
        if (isset($templateParams['order-products'])) : ?>
        <h1> PRODOTTI ORDINE</h1>
        <div id="blackline"></div>
        <p id="ppar"> Lista dei prodotti dell'ordine selezionato </p>
        <?php foreach ($templateParams["order-products"] as $products) : ?>
            <div id="ord" >
                <ul class="list-group list-group-flush">
                    <li style="  color: white;" class="list-group-item bg-dark"> Nome: <?php echo $products['nome'] ?></li>
                    <li class="list-group-item list-group-item-dark"> Categoria: <?php echo $products['nomecategoria'] ?></li>
                    <li class="list-group-item list-group-item-secondary"> Prezzo Unitario: <?php echo $products['prezzoacquisto'] . "$" ?></li>
                    <li class="list-group-item list-group-item-light"> Quantita': <?php echo $products['quantita'] ?></li>
                </ul>
            </div>
    <?php endforeach;
        endif;
    if ($templateParams['header'] == "headerSeller.php"):?>
        <h1 class="bg-light"> ORDINI EFFETTUATI</h1>
        <div id="blackline"></div>
        <p id="ppar" ><i> Questo account non e' abilitato per effettuare ordini! </i></p>
    <?php endif; ?>
</section>