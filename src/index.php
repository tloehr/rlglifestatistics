<!DOCTYPE html>
<html lang="de">
<head>
    <title>Flashheart's RLG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<?php
require("navbar.php");
?>


<div class="container">
    <div class="page-header">
        <h1>Flashheart's Real Life Gaming
            <small>Life Statistics</small>
        </h1>
    </div>

    <input type="checkbox" onclick="toggleAutoRefresh(this);" id="reloadCB"> Auto Refresh alle 10 Sekunden


    <?php
    require("lang-deDE.php");
    ?>


    <h2>OCFFLAG</h2>
    <!-- ocf loop starts here -->
    <?php

    $files = glob("ocfflag/active/*.php");

    $filecount = 0;
    if ($files) {
        $filecount = count($files);
    }

    if ($filecount == 0) {
        echo "<h3>" . $lang['NO_GAMES_RUNNING'] . "</h3>";
    } else {
        foreach ($files AS $file) {
            // echo '<p>'.$file."</p>";
            require($file);
            require("ocfflag/singlematch.php");
            echo '<hr style="background:lightgray;height:15px"/>';
        }
    }
    ?>

    <h2>MissionBox</h2>
       <!-- missionbox loop starts here -->
       <?php

       $files = glob("missionbox/active/*.php");

       $filecount = 0;
       if ($files) {
           $filecount = count($files);
       }

       if ($filecount == 0) {
           echo "<h3>" . $lang['NO_GAMES_RUNNING'] . "</h3>";
       } else {
           foreach ($files AS $file) {
               // echo '<p>'.$file."</p>";
               require($file);
               require("missionbox/singlematch.php");
               echo '<hr style="background:lightgray;height:15px"/>';
           }
       }
       ?>

</body>
</html>