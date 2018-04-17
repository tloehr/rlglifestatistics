<!--  __  __ _         _             ____-->
<!-- |  \/  (_)___ ___(_) ___  _ __ | __ )  _____  __-->
<!-- | |\/| | / __/ __| |/ _ \| '_ \|  _ \ / _ \ \/ /-->
<!-- | |  | | \__ \__ \ | (_) | | | | |_) | (_) >  <-->
<!-- |_|  |_|_|___/___/_|\___/|_| |_|____/ \___/_/\_\-->

<?php require("../index-head.php"); ?>
<?php require $_GET["gamefile"]; ?>


<h3><?php echo $game['bombname']; ?></h3>
<p>Letzte Aktualisierung: <?php echo $game['timestamp']; ?></p>
<p><b>Match Nr. <?php echo $game['matchid']; ?></b> &nbsp; <b>Spielbeginn:</b> <?php echo $game['ts_game_started']; ?>
    <?php if ($game['ts_game_ended'] != 'null') {
        echo '&nbsp; <b>Spielende:</b> ' . $game['ts_game_ended'];
    }
    ?>

</p>

<p>
    <b>Maximalspielzeit:</b> <?php echo $game['maxgametime']; ?>
    <br/>
    <b>Eroberungszeit:</b> <?php echo $game['capturetime']; ?>
</p>


<h4>Aktueller Spielstand</h4>

<?php

$collapseref = "collapse" . rand();

if ($game['winner'] == 'notdecidedyet') {
    $string_pause = "";

    if ($game['ts_game_paused'] != 'null') {
        $string_pause = 'AUSZEIT/PAUSE seit ' . $game['ts_game_paused'] . ' &rarr; ';
    }

    if ($game['bombfused'] == 'false') {
        echo '<div class="well" style="font-size:175%;background:green;color:white;font-weight:bold">' . $string_pause . $lang['FLAGCOLD'] . '</div>';
    } elseif ($game['bombfused'] == 'true') {
        echo '<div class="well" style="font-size:175%;background:red;color:yellow;font-weight:bold">' . $string_pause . $lang['FLAG_HOT'] . '</div>';
    } else {
        echo '<div class="well" style="font-size:175%;background:black;color:white;font-weight:bold">ERROR</div>';
    }
}

if ($game['winner'] == 'attacker') {
    echo '<div class="well" style="font-size:175%;background:red;color:white;font-weight:bold">' . $lang['ATTACKER'] . " " . $lang['WON_THE_GAME'] . '</div>';
}

if ($game['winner'] == 'defender') {
    echo '<div class="well" style="font-size:175%;background:green;color:yellow;font-weight:bold">' . $lang['DEFENDER'] . " " . $lang['WON_THE_GAME'] . '</div>';
}

?>

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
                        <th>Zeitpunkt</th>
                        <th>Ereignis</th>
                    </tr>
                    <?php
                    foreach ($game['events'] AS $myevent) {
                        echo "<tr><td>" . $myevent['pit'] . "</td><td>" . $lang[$myevent['event']] . "</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="panel-footer"><b>Flag ID:</b> <i><?php echo $game['uuid']; ?></i></div>
        </div>
    </div>
</div>