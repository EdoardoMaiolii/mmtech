<nav>
    <ul>
        <li><a href="profile.php?settings-section=1">Gestione Prodotti</a></li>
        <li><a href="profile.php?settings-section=2">Gestione Ordini</a></li>
    </ul>
    <?php
    if (isset($templateParams["settings-section"])) {
        require("settings-section" . $templateParams["settings-section"] . ".php");
    }
    ?>
</nav>