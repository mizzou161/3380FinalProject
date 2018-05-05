<?php
   
    require ('Access.php');
	require ('webFunctions.php');

	$stylesheet = 'CardinalsStats.css';

    $id = $_POST['id'];

    if (!$id) {
        $message = "User has not selcted a game to add a player to!";
        print genHTML("Add Player (Error)", generateErrorPage($message), $stylesheet);
        exit;
    }

    //taking data from playerForm
    $varid = $_POST['id'];
    $varatbats = $_POST['atbats'] ? $_POST['atbats'] : "untitled";
    $varplayer = $_POST['Name'] ? $_POST['Name'] : "untitled";
    $varnumber = $_POST['Number'] ? $_POST['Number'] : "untitled";
    $varposition = $_POST['Position'];
    $varhomeruns = $_POST['homeruns'] ? $_POST['homeruns'] : "untitled";
    $varrbi = $_POST['rbi'] ? $_POST['rbi'] : "untitled";
    $varinningsPlayed = $_POST['innings'] ? $_POST['innings'] : "untitled";
    $varhits=$_POST['Hits'] ? $_POST['Hits']: "0";
	$conn = new mysqli($host, $user, $password, $db);

	
	if ($conn->connect_error) {
		print generatePageHTML("Stats (Error)", generateErrorPageHTML($conn->connect_error), $stylesheet);
		exit;
	}
   
    $id = $conn->real_escape_string($varid);
    $player = $conn->real_escape_string($varplayer);
    $number = $conn->real_escape_string($varnumber);
    $position = $conn->real_escape_string($varposition);
    $inningsPlayed = $conn->real_escape_string($varinningsPlayed);
    $homeruns = $conn->real_escape_string($varhomeruns);
    $hits = $conn->real_escape_string($varhits);
    $rbi = $conn->real_escape_string($varrbi);
    $atbats = $conn->real_escape_string($varatbats);
    
    //insert data into table
	$sql = "INSERT INTO Players (gameID, Name, Number, Position, InningsPlayed, HomeRuns, Hits, RBI, atBats) VALUES ('$varid', '$varplayer', '$varnumber', '$varposition', '$varinningsPlayed', '$varhomeruns', '$varhits', '$varrbi', '$varatbats')";

	$result = $conn->query($sql);
	if ($result) {
		redirect("index.php");
	} else {
		print genHTML("Add Player (Error)", generateErrorPage($conn->error . " using SQL: $sql"), $stylesheet);
		exit;
	}
?>
	