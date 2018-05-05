<?php
    require ('Access.php');
	require ('webFunctions.php');
    $stylesheet = 'CardinalsStats.css';
    $id = $_POST['id'];
//if no ID, throw error page
    if (!$id) {
        $message = "No Game was selected to add player";
        print genHTML("Add Player (Error)", generateErrorPage($message), $stylesheet);
        exit;
    }
//body of the new player form, takes all the data then adds it to player table with add_player.php
    $body = <<<EOT
<h1>Add Player</h1>
<form action="addPlayer.php" method="post">
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
        <input type="number" name="atbats" value="" placeholder="" min="0" size="10">
    </p>
    <p>Hits<br />
        <input type="number" name="Hits" value="" placeholder="" min="0" size="10">
    </p>
    <p>RBIs<br />
        <input type="number" name="rbi" value="" placeholder="" min="0" size="10">
    </p>
    <p>Home Runs<br />
        <input type="number" name="homeruns" value="" placeholder="" min="0" size="10">
    </p>
    <p>Innings Played<br />
        <input type="number" name="innings" value="" placeholder="" min="0" size="10">
    </p>
  <input type="submit" value="Submit">
</form>
EOT;
print genHTML("Add Player", $body, $stylesheet);
?>