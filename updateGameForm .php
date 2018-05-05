<?php
    require ('Access.php');
	require ('webFunctions.php');
    $stylesheet = 'CardinalsStats.css';
    $id = $_POST['id'];
//throw error if no id is selected
    if (!$id) {
        $message = "No game was specified to update.";
        print genHTML("Update Game (Error)", generateErrorPage($message), $stylesheet);
        exit;
    }
//update stat form to grab new data and update it
    $body = <<<EOT
<h1>Update Game</h1>
<form action="updateGame.php" method="post">
<input type='hidden' name='action' value='update' /><input type='hidden' name='id' value='$id' />
<p>Opponent<br />
<input type="text" name="Opponent" value="" placeholder="Opponent" maxlength="255" size="80"></p>
<p>Score<br />
<input type="number" name="Score" value="$" min="0"></p>
<p>Opponent Score<br />
<input type="number" name="VersingScore" value="" min="0"></p>
<p>Date<br />
<input type="date" name="Date" value=""></p>
 <p>Win or Lose<br />
    <select name="winOrLose">
        <option value="Win">Win</option>
        <option value="Lose">Lose</option>
</select>
</p>
<p>Home or Away<br />
    <select name="homeTeam">
        <option value="Home">Home</option>
        <option value="Away">Away</option>
</select>
</p>
<p>Regular or Post Season<br />
    <select name="season">
        <option value="Regular">Regular</option>
        <option value="Post">Post</option>
</select>
</p>
<input type="submit" value="Submit">
</form>
EOT;
    print genHTML("Update Game", $body, $stylesheet);
?>