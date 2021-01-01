<section>
    <?php
    if ($templateParams['header'] != "headerSeller.php")
        if (!isset($templateParams['order-products'])) : ?>
        <h1> ORDINI EFFETTUATI</h1>
        <p> Lista degli ordini effettuati </p>
        <?php foreach ($templateParams["orders"] as $order) : ?>
            <div>
                <ul>
                    <li> Id ordine: <?php echo $order['idordine'] ?></li>
                    <li> Data ordine: <?php echo $order['dataordine'] ?></li>
                    <li> Per visualizzare le specifiche di quest' ordine <a href=<?php echo "profile.php?view-ordine=" . $order['idordine'] ?>> Clicca qui' </a></li>
                </ul>
            </div>
        <?php endforeach;
        endif;
    if ($templateParams['header'] != "headerSeller.php")
        if (isset($templateParams['order-products'])) : ?>
        <h1> PRODOTTI ORDINE</h1>
        <p> Lista dei prodotti dell'ordine selezionato </p>
        <?php foreach ($templateParams["order-products"] as $products) : ?>
            <div>
                <ul>
                    <li> Nome: <?php echo $products['nome'] ?></li>
                    <li> Categoria: <?php echo $products['nomecategoria'] ?></li>
                    <li> Prezzo Unitario: <?php echo $products['prezzoacquisto'] . "$" ?></li>
                    <li> Quantita': <?php echo $products['quantita'] ?></li>
                </ul>
            </div>
    <?php endforeach;
        endif;
    if ($templateParams['header'] == "headerSeller.php")
        echo "<i> Questo account non e' abilitato per effettuare ordini </i>";
    ?>
</section>