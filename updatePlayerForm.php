<?php
    require ('Access.php');
	require ('webFunctions.php');
    $stylesheet = 'CardinalsStats.css';
    $id = $_POST[ 'playerid'];
//throw error if no id is selected
    if (!$id) {
        $message = "No game was specified to update.";
        print genHTML("Update Game (Error)", generateErrorPage($message), $stylesheet);
        exit;
    }
//update stat form to grab new data and update it
    $body = <<<EOT
<h1>Update Player</h1>
<form  action="updatePlayer.php" method="post">
 <input type='hidden' name='action' value='update' /><input type='hidden' name='id' value='$id' />
    <p>Name <br />
    <input type="text" name="Name" value="" placeholder="" maxlength="99" size="80"></p>
    <p>Number <br />
    <input type="number" name="Number" value="" placeholder="" min="0" max="99" size="10"></p>
    <p>Position <br />
        <select name="Position">
            <option value="OutField">Outfield</option>
            <option value="infield">infield</option>
            <option value="Pitcher">Pitcher</option>
            <option value="Catcher">Catcher</option>
            <option value="FB">FB</option>
        </select>
    </p>
    <p>At Bats<br />
        <input type="number" name="atBats" value="" placeholder="" min="0" size="10">
    </p>
    <p>Hits<br />
        <input type="number" name="Hits" value="" placeholder="" min="0" size="10">
    </p>
    <p>RBIs<br />
        <input type="number" name="RBI" value="" placeholder="" min="0" size="10">
    </p>
    <p>Home Runs<br />
        <input type="number" name="HomeRuns" value="" placeholder="" min="0" size="10">
    </p>
    <p>Innings Played<br />
        <input type="number" name="Innings" value="" placeholder="" min="0" size="10">
    </p>
       <p>Player ID<br />
        <input type="number" name="playerid" value="$id" placeholder="" min="0" size="10">
    </p>
<input type="submit" value="Submit">
</form>
EOT;
    print genHTML("Update Player", $body, $stylesheet);
?>			