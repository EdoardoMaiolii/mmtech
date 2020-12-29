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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/javascript.js" type="text/javascript"></script>
    <script src="js/profile.js" type="text/javascript"></script>
    <title> <?php echo $templateParams["title"] ?> </title>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body class="bg-light" onload="closeNav()">
    <div id="mySidenav" class="sidenav">
        <a class="closebtn">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
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