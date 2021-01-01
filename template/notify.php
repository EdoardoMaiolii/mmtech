<section>
    <h1> NOTIFICHE </h1>
    <p> Segue una lista delle piu' recenti notifiche <p>
            <?php
            foreach ($templateParams["nofifications"] as $nofification) :
            ?>
                <acticle>
                    <ul>
                        <?php
                        if (!$nofification['visualizzata']) {
                            echo "<p><b> La seguente notifica non e' ancora stata visualizzata </b></p>";
                        }
                        ?>
                        <li id='data'>Data: <?php echo $nofification['data'] ?></li>
                        <li id='messaggio'>Messaggio: <?php echo $nofification['messaggio'] ?></li>
                        <a href=<?php echo "notify.php?idnot=" . $nofification['idnotifica'] ?> id="deleteNot"><img alt="Elimina Notifica" src= <?php echo MOCKUP_DIR."delete.png" ?>></a>
                    </ul>
                    </article>
                <?php endforeach; ?>
</section>