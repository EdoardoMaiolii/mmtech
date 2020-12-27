<nav>
    <ul>
        <li><a href="profile.php?profile-section=1">Dati Personali</a></li>
        <li><a href="profile.php?profile-section=2">I miei ordini</a></li>
        <li><a href="profile.php?profile-section=3">Esci</a></li>
    </ul>

    <?php
    if (isset($templateParams["profile-section"])) {
        require("profile-section" . $templateParams["profile-section"] . ".php");
    }
    ?>
</nav>