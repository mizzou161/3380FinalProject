<?php
    require ('Access.php');
	require ('webFunctions.php');
	$stylesheet = 'CardinalsStats.css';
    $id = $_POST['id'];
    if (!$id) {
        $message = "No game was selected to see players";
        print genHTML("View Players (Error)", generateErrorPage($message), $stylesheet);
        exit;
    }
    $conn = new mysqli($host, $user, $password, $db);
	// Check connection
	if ($conn->connect_error) {
		print genHTML("View Players (Error)", "<p>Connection failed: " . $conn->connect_error . "</p>", $stylesheet);
		exit;
	}
//selects players that are added to a game
	$sql = "SELECT * FROM Players WHERE gameID = $id";
	$result = $conn->query($sql);
	$players = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($players, $row);
		}
	}
    $conn->close();
    print genHTML("Players", genTable($players), $stylesheet);
//makes player table
    function genTable($players) {
    
    $html = "<h1>Player Stats</h1>\n";
    $html .= "<form id='form1' method='post'>";
    $html .= "<input type='button' onclick=submitForm('index.php') value='View Games'/>";
    //$html .= "<input type='button' onclick=submitForm('updatePlayerForm.php') value='Edit Player'/>";
    $html .= "<input type='button' onclick=submitForm('deletePlayer.php') value='Delete Player'/>";
        //if no results display error
    if (count($players) < 1) {
        $html .= "<p>No Players to display!</p>\n";
        return $html;
    }
    $html .= "<div id='Table'>";
    $html .= "\n<table>\n";
    $html .= "<tr><th>Select Player</th><th>Name</th><th>Position</th><th>
    At Bats</th><th>Hits</th><th>Rbi</th><th>Home Runs</th><th>Innings Played</th><th>Number</th></tr>\n";
    foreach ($players as $player) {
        
        $playerid = $player['id'];
        $gameid = $player['GameID'];
        $name = $player['Name'];
        $number = $player['Number'];
        $position = $player['Position'];
        $atBats = $player['atBats'];
        $Hits = $player['Hits'];
        $RBI = $player['RBI'];
        $InningsPlayed = $player['InningsPlayed'];
        $HomeRuns = $player['HomeRuns'];
        
        //add player data to player homepage index table
        $html .= "<tr><td><input type='radio' name='playerid' value='$playerid'/><td>$name</td><td>$position</td><td>$atBats</td><td>$Hits</td><td>$RBI</td><td>$HomeRuns</td><td>$InningsPlayed</td><td>$number</td></tr>\n";
    }
    $html .= "<input type='hidden' name='id' value='$gameid'/>";
    $html .= "</form></table></div>\n";
    return $html;
}
?>	