<!--     ___   ____ _____ _____ _        _    ____-->
<!--    / _ \ / ___|  ___|  ___| |      / \  / ___|-->
<!--   | | | | |   | |_  | |_  | |     / _ \| |  _-->
<!--   | |_| | |___|  _| |  _| | |___ / ___ \ |_| |-->
<!--    \___/ \____|_|   |_|   |_____/_/   \_\____|-->

<?php require("../index-head.php"); ?>
<?php require $_GET["gamefile"]; ?>

<h1><?php echo $game['flagname']; ?></h1>
<p>Letzte Aktualisierung: <?php echo $game['timestamp']; ?></p>
<p><b>Match Nr. <?php echo $game['matchid']; ?></b> &nbsp; <b>Spielbeginn:</b> <?php echo $game['ts_game_started']; ?>
    <?php if ($game['ts_game_ended'] != 'null') {
        echo '&nbsp; <b>Spielende:</b> ' . $game['ts_game_ended'];
    }
    ?>
</p>

<h2>Spielstand</h2>
 
<?php

$collapseref = "collapse" . rand();

if ($game['ts_game_ended'] == 'null') {

    $string_pause = "";

    if ($game['ts_game_paused'] != 'null') {
        $string_pause = 'AUSZEIT/PAUSE seit ' . $game['ts_game_paused'] . ' &rarr; ';
    }

    if ($game['flagcolor'] == 'neutral') {
        echo '<div class="well" style="font-size:175%;background:white;color:black;font-weight:bold">' . $string_pause . 'Flagge neutral</div>';
    } elseif ($game['flagcolor'] == 'red') {
        echo '<div class="well" style="font-size:175%;background:red;color:yellow;font-weight:bold">' . $string_pause . 'Flagge ist rot</div>';
    } elseif ($game['flagcolor'] == 'blue') {
        echo '<div class="well" style="font-size:175%;background:royalblue;color:yellow;font-weight:bold">' . $string_pause . 'Flagge ist blau</div>';
    } elseif ($game['flagcolor'] == 'green') {
        echo '<div class="well" style="font-size:175%;background:green;color:white;font-weight:bold">' . $string_pause . 'Flagge ist grün</div>';
    } elseif ($game['flagcolor'] == 'yellow') {
        echo '<div class="well" style="font-size:175%;background:yellow;color:black;font-weight:bold">' . $string_pause . 'Flagge ist gelb</div>';
    } else {
        echo '<div class="well" style="font-size:175%;background:black;color:white;font-weight:bold">ERROR</div>';
    }


} else {
    // GAME OVER
    if (in_array("drawgame", $game['winning_teams'])) {
        echo '<div class="well" style="font-size:175%;background:white;color:black;font-weight:bold">GAME OVER: Unentschieden</div>';
    }

    if (in_array("red", $game['winning_teams'])) {
        echo '<div class="well" style="font-size:175%;background:red;color:yellow;font-weight:bold">Rot hat gewonnen</div>';
    }

    if (in_array("blue", $game['winning_teams'])) {
        echo '<div class="well" style="font-size:175%;background:royalblue;color:yellow;font-weight:bold">Blau hat gewonnen</div>';
    }

    if (in_array("green", $game['winning_teams'])) {
        echo '<div class="well" style="font-size:175%;background:green;color:white;font-weight:bold">Grün hat gewonnen</div>';
    }

    if (in_array("yellow", $game['winning_teams'])) {
        echo '<div class="well" style="font-size:175%;background:yellow;color:black;font-weight:bold">Gelb hat gewonnen</div>';
    }
}
?>


<table class="table" style="width:100%">
    <tr>
        <th style="font-size:125%;font-weight:bold;text-align:center"><?php echo $lang['TITLE'] ?></th>
        <th style="font-size:125%;font-weight:bold;text-align:center"><?php echo $lang['GAMETIME'] ?></th>
    </tr>
    <tr>
        <th style="font-size:125%;font-weight:bold;text-align:left"><?php echo $lang['REMAINING'] ?></th>
        <td style="font-size:175%;font-weight:bold;text-align:left"><?php echo $game['time']; ?></td>
    </tr>
    <tr>
        <th style="font-size:125%;font-weight:bold;text-align:left"><?php echo $lang['TEAM_RED'] ?></th>
        <td style="font-size:175%;color:red;font-weight:bold;text-align:left"><?php echo $game['rank']['red']; ?></td>
    </tr>
    <tr>
        <th style="font-size:125%;font-weight:bold;text-align:left"><?php echo $lang['TEAM_BLUE'] ?></th>
        <td style="font-size:175%;color:royalblue;font-weight:bold;text-align:left"><?php echo $game['rank']['blue']; ?></td>
    </tr>
    <tr>
        <th style="font-size:125%;font-weight:bold;text-align:left"><?php echo(intval($game['num_teams']) >= 3 ? $lang['TEAM_GREEN'] : '<s>' . $lang['TEAM_GREEN'] . '</s>') ?></th>
        <td style="font-size:175%;color:green;font-weight:bold;text-align:left"><?php echo(intval($game['num_teams']) >= 3 ? $game['rank']['green'] : '--'); ?></td>
    </tr>
    <tr>
        <th style="font-size:125%;font-weight:bold;text-align:left"><?php echo(intval($game['num_teams']) >= 4 ? $lang['TEAM_YELLOW'] : '<s>' . $lang['TEAM_YELLOW'] . '</s>') ?></th>
        <td style="font-size:175%;color:black;background:yellow;font-weight:bold;text-align:left"><?php echo(intval($game['num_teams']) >= 4 ? $game['rank']['yellow'] : '--'); ?></td>
    </tr>
</table>

<br/>


<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#<?php echo $collapseref; ?>">Ereignisse einblenden</a>
            </h4>
        </div>
        <div id="<?php echo $collapseref; ?>" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th><?php echo $lang['TIME'] ?></th>
                        <th><?php echo $lang['REMAINING'] ?></th>
                        <th><?php echo $lang['EVENT'] ?></th>
                    </tr>
                    <?php
                    foreach ($game['events'] AS $myevent) {
                        echo "<tr><td>" . $myevent['pit'] . "</td><td>" . $myevent['humantime'] . "</td><td>" . $lang[$myevent['event']] . "</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="panel-footer"><b>Flag ID:</b> <i><?php echo $game['uuid']; ?></i></div>
        </div>
    </div>
</div>

<?php require("../index-foot.php"); ?>