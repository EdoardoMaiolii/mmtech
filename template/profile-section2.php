<h1>  ORDINI EFFETTUATI</h1>
<?php 
foreach ($templateParams["orders"] as $order): ?>
<article>
<ul>
<li> Id ordine: <?php echo $order['idordine']?></li>
<li> Data ordine: <?php echo $order['dataordine']?></li>
<li> Per visualizzare le specifiche di quest' ordine <a href="#"> Clicca qui' </a></li>
</ul>
</article>
<?php endforeach; ?>