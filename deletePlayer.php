<?php
    require ('Access.php');
    require ('webFunctions.php');
    $stylesheet = 'CardinalsStats.css';
    $id = $_POST['playerid'];
//if no ID, throw error page
    if (!$id) {
        $message = "No player was selected to delete a player!";
        print genHTML("Add Player (Error)", generateErrorPage($message), $stylesheet);
        exit;
    } else {
			// Create connection
			$mysqli = new mysqli($host, $user, $password, $db);
			// Check connection
			if ($mysqli->connect_error) {
				$message = $mysqli->connect_error;
			} else {
				$id = $mysqli->real_escape_string($id);
				$sql = "DELETE FROM Players WHERE id = $id";
				if ( $result = $mysqli->query($sql) ) {
                        redirect("index.php");
                    }
				else {
                    //print error page if sql fails
					print genHTML("Delete Player (Error)", generateErrorPage($conn->error . " using SQL: $sql"), $stylesheet);
                    echo $id;
                    exit;
				}
				$mysqli->close();
			}
		}
?>