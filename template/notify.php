<section class="bg-light">
    <link rel="stylesheet" type="text/css" href="./css/profile-settings.css" />
    <h1> NOTIFICHE </h1>
    <div id="blackline"></div>
    <p id="ppar"> Segue una lista delle piu' recenti notifiche <p>
            <?php
            foreach ($templateParams["nofifications"] as $nofification) :
            ?>
            <div id="ord">
                <acticle>
                    <ul class="list-group list-group-flush">
                        <?php
                        if (!$nofification['visualizzata']) {
                            echo "<li class='list-group-item list-group-item-primary' > La seguente notifica non e' ancora stata visualizzata </li>";
                        }
                        ?>
                        <li class="list-group-item list-group-item-info" id='data'>Data: <?php echo $nofification['data'] ?></li>
                        <li class="list-group-item list-group-item-warning" id='messaggio'>Messaggio: <?php echo $nofification['messaggio'] ?></li>
                        <a href=<?php echo "notify.php?idnot=" . $nofification['idnotifica'] ?> id="deleteNot" class="list-group-item list-group-item-action list-group-item-danger"><div style="text-align: center;"> <img alt="Elimina Notifica" src=<?php echo MOCKUP_DIR . "delete.png" ?>> Elimina notifica </div> </a>
                    </ul>
                    </article>
                    </div>
                <?php endforeach; ?>
</section>