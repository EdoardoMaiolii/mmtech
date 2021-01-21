<section>
    <h1 class="bg-light"> GESTIONE ORDINI </h1>
    <div id="blackline"></div>
    <?php
    if (!isset($templateParams['order-products'])) : ?>
        <p id="ppar"> Lista degli ordini piu' recenti </p>
        <?php foreach ($templateParams["orders"] as $order) : ?>
            <div id="ord">
                <ul class="list-group list-group-flush">
                    <li style="  color: white;" class="list-group-item bg-dark"> Id ordine: <?php echo $order['idordine'] ?></li>
                    <li class="list-group-item list-group-item-dark"> Email: <?php echo $order['email'] ?></li>
                    <li class="list-group-item list-group-item-dark"> Data ordine: <?php echo $order['dataordine'] ?></li>
                    <li class="list-group-item list-group-item-light"> Stato ordine: <?php echo "<strong>" . $order['statoordine'] . "</strong>" ?>
                        <?php if ($order['statoordine'] != "Consegnato") :   ?>
                            <form method="GET" action="settings.php">
                                <fieldset>
                                    <input type="hidden" id="settings-section" name="settings-section" value='update' />
                                    <input type="hidden" id="idordine" name="idordine" value=<?php echo ("'" . $order['idordine'] . "'") ?> />
                                    <button style="margin-top: 20px; margin-bottom: 10px" class="btn btn-primary">
                                        <?php echo ($order['statoordine'] == "Elaborazione" ? "SPEDISCI" : "CONFERMA CONSEGNA") ?>
                                    </button>
                                </fieldset>
                            </form>
                        <?php endif; ?>
                    </li>
                    <a style="  color: #007bff; text-align: center;" href=<?php echo "settings.php?view-ordine=" . $order['idordine'] ?> class="list-group-item list-group-item-action list-group-item-secondary"> Per visualizzare le specifiche di quest' ordine clicca qui' </a>
                </ul>
            </div>
        <?php endforeach;
    endif;
    if (isset($templateParams['order-products'])) : ?>
        <p id="ppar"> Lista dei prodotti dell'ordine selezionato </p>
        <?php
        foreach ($templateParams["order-products"] as $products) : ?>
            <div id="ord">
                <ul class="list-group list-group-flush">
                    <li style="  color: white;" class="list-group-item bg-dark"> Id Prodotto: <?php echo $products['idprodotto'] ?></li>
                    <li class="list-group-item list-group-item-dark"> Nome: <?php echo $products['nome'] ?></li>
                    <li class="list-group-item list-group-item-secondary"> Categoria: <?php echo $products['nomecategoria'] ?></li>
                    <li class="list-group-item list-group-item-light"> Prezzo Unitario: <?php echo $products['prezzoacquisto'] . "$" ?></li>
                    <li class="list-group-item list-group-item-light"> Quantita': <?php echo $products['quantita'] ?></li>
                </ul>
            </div>
    <?php endforeach;
    endif; ?>
</section>