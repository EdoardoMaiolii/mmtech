<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="Home MMTech"/>
    <meta name="keywords" content="Home,M&M,shop,cpu,gpu"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/javascript.js"></script>
    <script src="js/profile.js"></script>
    <title> <?php echo $templateParams["title"] ?> </title>
</head>

<body onload="closeNav()">
    <header>
        <div id="mySidenav" class="sidenav">
            <a id="closebtn">&times;</a>
            <!-- add dynamic catecoriess -->
            <?php foreach ($templateParams["categories"] as $category) : ?>
                <a href=<?php echo "search.php?categoria=" . $category["nomecategoria"] ?>> <?php echo $category["nomecategoria"] ?></a>
            <?php endforeach; ?>
        </div>
        <img id="barrette" alt="MenuLaterale" src="<?php echo MOCKUP_DIR . "BarretteMenu.png"; ?>" />
        <?php
        if (isset($templateParams["header"])) {
            require($templateParams["header"]);
        }
        ?>
    </header>
    <main>
        <?php
        if (isset($templateParams["content"])) {
            require($templateParams["content"]);
        }
        ?>
    </main>
    <footer>
        <p>Sede: Via del Freijlord, 4 Runeterra (RT)</p>
        <p>Contattaci: assistenza@mandm.com</p>
        <img alt="Logo MMTech" src="<?php echo MOCKUP_DIR . "Logo.png"; ?>" />
    </footer>
    <script src="js/header.js"></script>
</body>
</html>