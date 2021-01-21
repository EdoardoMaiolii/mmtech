<section>
    <link rel="stylesheet" type="text/css" href="./css/profile-settings.css" />
    <h1 class="bg-light"> NOTIFICHE </h1>
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
                            echo "<li class='list-group-item list-group-item-info' > La seguente notifica non e' ancora stata visualizzata </li>";
                        }
                        ?>
                        <li style="color: white;" class="list-group-item bg-dark" id='data'>Data: <?php echo $nofification['data'] ?></li>
                        <li class="list-group-item list-group-item-dark" id='messaggio'>Messaggio: <?php echo $nofification['messaggio'] ?></li>
                    </ul>
                    </article>
                    <div  class="list-group-item list-group-item-secondary" id="delete">
                    <a href=<?php echo "notify.php?idnot=" . $nofification['idnotifica'] ?> id="deleteNot"><img alt="Elimina Notifica" src=<?php echo MOCKUP_DIR . "delete.png" ?>></a>
                    </div>
                    </div>
                    <?php endforeach; ?>
</section>