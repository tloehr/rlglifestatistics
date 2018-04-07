<?php require("index-head.php"); ?>
    <h2>OCF-FLAG</h2>
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
    $protocol = $_SERVER['HTTPS'] == '' ? 'http://' : 'https://';
    $folder = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/ocfflag/";

    foreach ($files AS $file) {
        require($file);

        $mybuttonclass = "btn btn-default";
        if (strcasecmp($game['flagcolor'], 'red') == 0) {
            $mybuttonclass = "btn btn-danger";
        } else if (strcasecmp($game['flagcolor'], 'blue') == 0) {
            $mybuttonclass = "btn btn-primary";
        } else if ($game['flagcolor'] == 'green') {
            $mybuttonclass = "btn btn-success";
        } else if ($game['flagcolor'] == 'yellow') {
            $mybuttonclass = "btn btn-warning";
        }

        echo '<a  class="' . $mybuttonclass . '" role="button" href="' . $folder . 'singlematch.php?gamefile=../' . $file . '"><p style="font-size:20px;font-weight: bold">' . $game['flagname'] . '</p>' . $lang['STARTIME'] . ': ' . $game['ts_game_started'] . '<br/>' . $lang['REMAINING'] . ': ' . $game['time'] . '</a>';
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

<?php require("index-foot.php"); ?>