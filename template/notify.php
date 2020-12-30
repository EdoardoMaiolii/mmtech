<?php 
foreach ($templateParams["nofifications"] as $nofification):
?>
<article>
<ul>
<?php 
if (!$nofification['visualizzata']){
    echo "<p><b> La seguente notifica non e' ancora stata visualizzata </b></p>";
}
?>
<li id='idnotifica' >Numero notifica: <?php echo $nofification['idnotifica'] ?></li>
<li id='data' >Data: <?php echo $nofification['data'] ?></li>
<li id='messaggio' >Messaggio: <?php echo $nofification['messaggio'] ?></li>
</ul>
</br>
</article>
<?php endforeach; ?>