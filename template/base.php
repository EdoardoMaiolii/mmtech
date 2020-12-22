<!DOCTYPE html>

<html lang="it">

<head>
    <meta charset="utf-8" />
    <meta name="content" description="Home M&M" />
    <meta name="keywords" description="Home,M&M,shop,cpu,gpu" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css" /> -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="js/searchbar.js" type="text/javascript"></script>
    <title> <?php echo $templateParams["title"] ?> </title>
</head>

<body class="bg-light">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <header class="p-3 bg-primary">
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
                            <td rowspan="2"><img src="<?php echo MOCKUP_DIR."Logo.png"; ?>" /></td>
                        </tr>
                    </table>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>