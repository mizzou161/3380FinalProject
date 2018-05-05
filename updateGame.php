<?php
    require ('Access.php');
	require ('webFunctions.php');
    $stylesheet = 'CardinalsStats.css';
    $id = $_POST['id'];
//throws error if there is no id sent
    if (!$id) {
        $message = "No game was specified to update.";
        print genHTML("Update Game (Error)", generateErrorPage($message), $stylesheet);
        exit;
    }
//send game data to POST
	$vopponent = $_POST['Opponent'] ? $_POST['Opponent'] : "untitled";
    $vscore = $_POST['Score'] ? $_POST['Score'] : "untitled";
    $vopponentScore = $_POST['VersingScore'] ? $_POST['VersingScore'] : "untitled";
    $vdate = $_POST['Date'] ? $_POST['Date'] : "untitled";
    $vwinOrLose = $_POST['winOrLose'];
    $vhomeOrAway = $_POST['homeTeam'];
    $vregularOrPostSeason = $_POST['season'];
			// Create connection
			$mysqli = new mysqli($host, $user, $password, $db);
			// Check connection
			if ($mysqli->connect_error) {
				print genHTML("Game (Error)", generateErrorPage($mysqli->connect_error), $stylesheet);
		        exit;
			} else {
                //escapes data to prevent injection
                $opponent = $mysqli->real_escape_string($vopponent);
                $score = $mysqli->real_escape_string($vscore);
                $opponentScore = $mysqli->real_escape_string($vopponentScore);
                $date = $mysqli->real_escape_string($vdate);
                $winOrLose = $mysqli->real_escape_string($vwinOrLose);
                $homeOrAway = $mysqli->real_escape_string($vhomeOrAway);
                $regularOrPostSeason = $mysqli->real_escape_string($vregularOrPostSeason);
				$sql = "UPDATE Games SET Versing='$opponent', CardScore='$score', VersingScore='$opponentScore', matchDate='$date', win='$winOrLose', homeTeam='$homeOrAway', season='$regularOrPostSeason' WHERE id = $id";
                //send query
				if ( $result = $mysqli->query($sql) ) {
					redirect("index.php");
				} else {
                    //error page if fails
					print genHTML("Update Game (Error)", generateErrorPage($conn->error . " using SQL: $sql"), $stylesheet);
                    
                    echo $opponent. " " . $score. " " . $opponentScore. " " . $date. " " . $winOrLose. " " . $homeOrAway. " " . $regularOrPostSeason. " " . $id ;
                    exit;
				}
				$mysqli->close();
			}
?>
