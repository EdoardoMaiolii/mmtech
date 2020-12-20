<!DOCTYPE html>

<html lang="it">

<head>
    <meta charset="utf-8" />
    <meta name="content" description="Home M&M" />
    <meta name="keywords" description="Home,M&M,shop,cpu,gpu" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title> <?php echo $templateParams["title"] ?> </title>
    <!-- <link href="style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <header class="py-3 bg-$blue-500">
                    <?php
                    if (isset($templateParams["header"])) {
                        require($templateParams["header"]);
                    }
                    ?>
                </header>
            </div>
        </div>
        <main>
            <?php
            if (isset($templateParams["content"])) {
                require($templateParams["content"]);
            }
            ?>
        </main>
        <div class="row">
            <div class="col-12">
                <footer class="py-3 bg-$blue-500">
                    <table>
                        <tr>
                            <th type="row"> Sede </th>
                            <td> Via del Freijlord, 4
                                Runeterra (RT)</td>
                        </tr>
                        <tr>
                            <th type="row"> Contattaci </th>
                            <td> assistenza@mandm.com</td>
                            <td rowspan="2"><img src="img/Logo.png" /></td>
                        </tr>
                    </table>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>