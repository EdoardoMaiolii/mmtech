<div id="content">
    <link rel="stylesheet" type="text/css" href="./css/profile-settings.css" />
    <h1 class="bg-light">PROFILO</h1>
    <div id="blackline"></div>
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a <?php echo ((!isset($templateParams["profile-section"]) || $templateParams["profile-section"] == "1") ? 'class="nav-link active"' : 'class="nav-link"') ?> href="profile.php?profile-section=1">Dati Personali</a></li>
            <li class="nav-item"><a <?php echo (($templateParams["profile-section"] == "2") ? 'class="nav-link active"' : 'class="nav-link"') ?> href="profile.php?profile-section=2">I miei ordini</a></li>
            <li class="nav-item"><a <?php echo (($templateParams["profile-section"] == "3") ? 'class="nav-link active"' : 'class="nav-link"') ?> href="profile.php?profile-section=3">Esci</a></li>
        </ul>
    </nav>
    <?php
    if (isset($templateParams["profile-section"])) {
        require("profile-section" . $templateParams["profile-section"] . ".php");
    }
    ?>
</div>