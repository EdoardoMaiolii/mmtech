<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Home MMTech" />
    <meta name="keywords" content="Home,M&M,shop,cpu,gpu" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="shortcut icon" type="image/x-icon" href="logoMMtech.ico" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/javascript.js"></script>
    <script src="js/profile.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/footer.js"></script>
    <title> <?php echo $templateParams["title"] ?> </title>
</head>

<body class="bg-light" onload="closeNav()">
    <nav class="navbar navbar-expand-md navbar-light sticky-top bg-dark">
        <div id="mySidenav" class="sidenav">
            <a id="closebtn">&times;</a>
            <a href="index.php">Home</a>
            <?php if (isUserLoggedIn()) : ?>
                <a href="notify.php">Notifiche</a>
                <a href="profile.php">Profilo</a>
                <?php if ($templateParams["header"] == "headerSeller.php") : ?>
                    <a href="settings.php">Impostazioni</a>
                <?php else : ?>
                    <a href="cart.php">Carrello</a>
                <?php endif; ?>
            <?php else : ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
            <br>
            <!-- add dynamic catecoriess -->
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Categorie ▼</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <?php foreach ($templateParams["categories"] as $category) : ?>
                        <li>
                            <a href=<?php echo "search.php?categoria=" . $category["nomecategoria"] ?>> <?php echo $category["nomecategoria"] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </div>
        <div class="navbar-nav mr-auto">
            <img id="barrette" alt="MenuLaterale" src="<?php echo MOCKUP_DIR . "BarretteMenu.png"; ?>" />
        </div>
        <?php
        if (isset($templateParams["header"])) {
            require($templateParams["header"]);
        }
        ?>
    </nav>
    <main>
        <?php
        if (isset($templateParams["content"])) {
            require($templateParams["content"]);
        }
        ?>
    </main>
    <footer id="footer" class="text-center text-light p-3 bg-dark">
        <p>Sede: Via del Freijlord, 4 Runeterra (RT)</p>
        <p>Contattaci: assistenza@mandm.com</p>
        <br>
    </footer>
    <script src="js/header.js"></script>
</body>

</html>