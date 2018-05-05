<?php
    require ('Access.php');
    require ('webFunctions.php');
    
   $stylesheet = 'CardinalsStats.css';

    $id = $_POST['playerid'];
    $atBats = $_POST['atBats'];
    $Hits = $_POST['Hits'];
    $RBI = $_POST['RBI'];
    $HomeRuns = $_POST['HomeRuns'];
    $Position = $_POST['Position'];
    $Innings = $_POST['Innings'];
    $Number = $_POST['Number'];
    $Name = $_POST['Name'];
    
    //connect
    
            
    $mysqli = new mysqli($host, $user, $password, $db);

    	// Create connection

			// Check connection
			if ($mysqli->connect_error) {
				print genHTML("Player (Error)", generateErrorPage($mysqli->connect_error), $stylesheet);
			} 
          
			
			$sql = "UPDATE Players SET atBats='$atBats', Hits='$Hits', RBI='$RBI', HomeRuns='$HomeRuns', Position='$Position', InningsPlayed='$Innings', Number='$Number', Name='$Name' WHERE id = $id";
         
            echo $sql;
				if ($result = $mysqli->query($sql)) {
                        redirect("index.php");
				else {
                   //print error page if sql fails
					print genHTML("Update Player (Error)", generateErrorPage($conn->error . " using SQL: $sql"), $stylesheet);
				}
				$mysqli->close();
			
		
?>					
