<?php
	//Add stat gets its data from stat_Form.php From there it takes the data and stores it in variables that are then set up with the
    //the real escape string to avoid SQL injection attacks. The variable from the real escape string is the inserted into the GAMES table.
    //if the insertion is succesful it redirects back to index.php.
    require ('Access.php');
	require ('webFunctions.php');
    
	$stylesheet = 'CardinalsStats.css';
    
//taking data that is sent from stat_Form.php and storing in a variable
	$varopponent = $_POST['Versing'] ? $_POST['Versing'] : "untitled";
    $varscore = $_POST['CardScore'] ? $_POST['CardScore'] : "untitled";
    $varopponentScore = $_POST['VersingScore'] ? $_POST['VersingScore'] : "untitled";
    $vardate = $_POST['matchDate'] ? $_POST['matchDate'] : "untitled";
    $varwinOrLose = $_POST['win'];
    $varhomeOrAway = $_POST['homeTeam'];
    $varregularOrPostSeason = $_POST['season'];
	// Create connection
	$connection = new mysqli($host, $user, $password, $db);
	// Check connection
	if ($connection->connect_error) {
		print genHTML("Stats (Error)", generateErrorPage($connection->connect_error), $stylesheet);
		exit;
	}
//prevent insertion attack
	$opponent = $connection->real_escape_string($varopponent);
	$score = $connection->real_escape_string($varscore);
    $opponentScore = $connection->real_escape_string($varopponentScore);
    $date = $connection->real_escape_string($vardate);
    $win = $connection->real_escape_string($varwinOrLose);
    $homeOrAway = $connection->real_escape_string($varhomeOrAway);
    $season = $connection->real_escape_string($varregularOrPostSeason);
//send sql info inside sql riable
	$sql = "INSERT INTO Games(Versing, CardScore, VersingScore, matchDate, win, homeTeam, season) VALUES ('$opponent', '$score', '$opponentScore', '$date', '$win', '$homeOrAway', '$season')";
	$result = $connection->query($sql);
	if ($result) {
		// insert successfull, redirect browser to index.php to see list of tasks
		redirect("index.php");
	} else {
		print genHTML("Add Game (Error)", generateErrorPage($connection->error . " using SQL: $sql"), $stylesheet);
		exit;
	}
?>