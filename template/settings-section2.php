<h1> GESTIONE ORDINI</h1>
<p> Segue la lista degli ordini piu' recenti </p>
<?php 
if (!isset($templateParams['order-products']))
foreach ($templateParams["orders"] as $order): ?>
<article>
<ul>
<li> Id ordine: <?php echo $order['idordine']?></li>
<li> Data ordine: <?php echo $order['dataordine']?></li>
<li> Per visualizzare le specifiche di quest' ordine <a href=<?php echo "settings.php?view-ordine=".$order['idordine']?>> Clicca qui' </a></li>
</ul>
</article>
<?php endforeach; 
if (isset($templateParams['order-products']))
foreach ($templateParams["order-products"] as $products): ?>
    <article>
    <ul>
    <li> Id Prodotto: <?php echo $products['idprodotto']?></li>
    <li> Nome: <?php echo $products['nome']?></li>
    <li> Categoria: <?php echo $products['nomecategoria']?></li>
    <li> Prezzo Unitario: <?php echo $products['prezzoacquisto']."$"?></li>
    <li> Quantita': <?php echo $products['quantita']?></li>
    </ul>
    </article>
<?php endforeach; 