<!DOCTYPE html>

<html lang="it">

<head>
    <meta charset="utf-8" />
    <meta name="content" description="Home M&M" />
    <meta name="keywords" description="Home,M&M,shop,cpu,gpu" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css" /> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/javascript.js" type="text/javascript"></script>
    <script src="js/profile.js" type="text/javascript"></script>
    <title> <?php echo $templateParams["title"] ?> </title>
</head>

<body class="bg-light" onload="closeNav()">
    <div id="mySidenav" class="sidenav">
        <a id="closebtn">&times;</a>
        <!-- add dynamic catecoriess -->
        <?php foreach ($templateParams["categories"] as $category) : ?>
            <a href=<?php echo "search.php?categoria=".$category["nomecategoria"] ?>> <?php echo $category["nomecategoria"] ?></a>
        <?php endforeach; ?>
    </div>

    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <header class="p-3 bg-primary">
                <img style="font-size:30px;cursor:pointer" id="barrette" src="<?php echo MOCKUP_DIR."BarretteMenu.png"; ?>"/>
                    <?php
                    if (isset($templateParams["header"])) {
                        require($templateParams["header"]);
                    }
                    ?>
                </header>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-12 p-0">
                <main>
                    <?php
                    if (isset($templateParams["content"])) {
                        require($templateParams["content"]);
                    }
                    ?>
                </main>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-12 p-0">
                <footer class="p-3 bg-primary">
                    <table>
                        <tr>
                            <th type="row"> Sede </th>
                            <td> Via del Freijlord, 4
                                Runeterra (RT)</td>
                        </tr>
                        <tr>
                            <th type="row"> Contattaci </th>
                            <td> assistenza@mandm.com</td>
                            <td rowspan="2"><img src="<?php echo MOCKUP_DIR . "Logo.png"; ?>" /></td>
                        </tr>
                    </table>
                </footer>
            </div>
        </div>
    </div>
    <script src="js/header.js" type="text/javascript"></script>
</body>
</html>