<?php   
require ('Access.php');
require ('webFunctions.php');

$stylesheet = 'CardinalsStats.css';

$sqliConnection = new mysqli($host, $user, $password, $db);

if($sqliConnection->connect_error){
    echo genHTML("Stats (Error)", "<p> Connection failed: " . $sqliConnection->connect_error . "</p>", $stylesheet);
}

///gets info from Games

$query = "SELECT * FROM Games";
$result = $sqliConnection->query($query);
$games = array();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        array_push($games, $row);
    }
}
echo'connected();';
//sqliConnection->close();

print genHTML("Games", genTable($games), $stylesheet);


//more

function genTable($games){
    $html = "<h1>Stats for Game</h1><br>";
    
       $html .= "<form id='form1' method='post'>";
       //form buttons to add the different table functions.
       $html .= "<input type='button' onclick=submitForm('http://mizzou161.epizy.com/final3380/Games.php') value='Add Game'/>";
       $html .= "<input type='button' onclick=submitForm('http://mizzou161.epizy.com/final3380/deleteGame.php') value='Delete Game'/>";
       $html .= "<input type='button' onclick=submitForm('http://mizzou161.epizy.com/final3380/updateGameForm.php') value='Update Game'/>";
        $html .= "<input type='button' onclick=submitForm('http://mizzou161.epizy.com/final3380/playerForm.php') value='Add Player' />";
        $html .= "<input type='button' onclick=submitForm('http://mizzou161.epizy.com/final3380/playerIndex.php') value='View Players'/> <br>\n";
		if (count($games) < 1) {
			$html .= "<p>No games to display!</p>\n";
			return $html;
		}
                 
		$html .= "\n<table>\n";
		$html .= "<tr><th>Select Game</th><th>Opponent</th><th>Score</th><th>Opponent Score</th><th>Date</th><th>Win/Lose</th><th>Home/Away</th><th>Regular/Post Season</th></tr>\n";
		foreach ($games as $game) {
			$id = $game['id'];
			$opponent = $game['Versing'];
			$score = $game['CardScore'];
            $opponentScore = $game['VersingScore'];
			$date = ($game['matchDate']);
            $winOrLose = $game['win'];
            $homeOrAway = $game['homeTeam'];
            $regularOrPostSeason = $game['season'];
            //add tables values to html table
			$html .= "<tr><td><input type='radio' name='id' value='$id' /></td><td>$opponent</td><td>$score</td><td>$opponentScore</td><td>$date</td><td>$winOrLose</td><td>$homeOrAway</td><td>$regularOrPostSeason</td></tr>\n";
		}
		$html .= "</form></table>\n";
		return $html;
	}
?>		
