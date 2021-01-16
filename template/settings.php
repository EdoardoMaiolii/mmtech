<div id="content">
<link rel="stylesheet" type="text/css" href="./css/profile-settings.css" />
<nav>
    <ul class="nav nav-tabs">
        <li class="nav-item"><a <?php echo ((!isset($templateParams["settings-section"]) || $templateParams["settings-section"] == "1") ? 'class="nav-link active"' : 'class="nav-link"') ?>  href="settings.php?settings-section=1">Gestione Prodotti</a></li>
        <li class="nav-item"><a <?php echo (($templateParams["settings-section"] == "2") ? 'class="nav-link active"' : 'class="nav-link"') ?>href="settings.php?settings-section=2">Gestione Ordini</a></li>
    </ul>
</nav>
<?php
    if (isset($templateParams["settings-section"])) {
        require("settings-section" . $templateParams["settings-section"] . ".php");
    }
?>
</div>