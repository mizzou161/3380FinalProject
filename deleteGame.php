<?php
    require ('Access.php');
    require ('webFunctions.php');
    $stylesheet = 'CardinalsStats.css';
    $id = $_POST['id'];
//if no ID, throw error page
    if (!$id) {
        $message = "No game was selected to delete a player from!";
        print genHTML("Add Player (Error)", generateErrorPage($message), $stylesheet);
        exit;
    }
    else {
			// Create connection
			$mysqli = new mysqli($host, $user, $password, $db);
			// Check connection
			if ($mysqli->connect_error) {
				$message = $mysqli->connect_error;
			}
			 else {
				$id = $mysqli->real_escape_string($id);
				$sql = "DELETE FROM Games WHERE id = $id";
                $sql1 = "DELETE FROM Players WHERE GameID = $id";
				if ( $result = $mysqli->query($sql) && $result1 = $mysqli->query($sql1)){
                    redirect("index.php");
                }
				 else {
                    //error page if sql fails
					print genHTML("Delete Game (Error)", generateErrorPage($mysqli->error . " using SQL: $sql"), $stylesheet);
                    exit;
				}
            
				$mysqli->close();
			}
    }
           
		
?>				