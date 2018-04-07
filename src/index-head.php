<?php require("lang-deDE.php"); ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title><?php echo $lang['SITE_TITLE']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="my.css">

    <script>
        var reloading;

        function checkReloading() {
            if (window.location.hash == "#autoreload") {
                reloading = setTimeout("window.location.reload();", 10000);
                document.getElementById("reloadCB").checked = true;
            }
        }

        function toggleAutoRefresh(cb) {
            if (cb.checked) {
                window.location.replace("#autoreload");
                reloading = setTimeout("window.location.reload();", 10000);
            } else {
                window.location.replace("#");
                clearTimeout(reloading);
            }
        }

        window.onload = checkReloading;
    </script>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://www.flashheart.de"><img
                        src="https://www.flashheart.de/lib/exe/fetch.php?t=1505502790&w=32&h=32&tok=6037b3&media=wiki:logo.png"
                        alt="Flashheart"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="https://flashheart.de">Back to Flashheart.de</a></li>
                <li><a href="https://flashheart.de/rlg/index.php">Life Statistics</a></li>
                <li><a href="https://flashheart.de/rlg/index-archive.php">Archive Statistics</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="page-header">
        <h1>Flashheart's Real Life Gaming
            <small>Life Statistics</small>
        </h1>
    </div>

<!---->
<!--    <div class="[ form-group ]">-->
<!--        <input type="checkbox" name="fancy-checkbox-primary" onclick="toggleAutoRefresh(this);"-->
<!--               id="reloadCB" autocomplete="off"/>-->
<!--        <div class="[ btn-group ]">-->
<!--            <label for="reloadCB" class="[ btn btn-primary ]">-->
<!--                <span class="[ glyphicon glyphicon-ok ]"></span>-->
<!--                <span> </span>-->
<!--            </label>-->
<!--            <label for="reloadCB" class="[ btn btn-default active ]">-->
<!--                --><?php //echo $lang['SITE_AUTOREFRESH']; ?>
<!--            </label>-->
<!--        </div>-->
<!--    </div>-->
