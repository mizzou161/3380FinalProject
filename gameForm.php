<!DOCTYPE html>
<html>
<head>
<title>Add Game</title>
<link rel="stylesheet" type="text/css" href="sportsstats.css">
</head>
<body>
<h1>Add Game</h1>
<form action="add_stat.php" method="post">


   <!-- game stat form to add a game to the games table -->

    <h2>Game Stats</h2>
    <p>Game Opponent<br />
    <input type="text" name="Opponet" value="" placeholder="" maxlength="255" size="80"></p>

    <p>Score<br />
    <input type="number" name="Score" value="" min="0"></p>

    <p>Opponent Score<br />
    <input type="number" name="OpponentScore" value="" min="0"></p>

    <p>Date<br />
    <input type="date" name="Date" value=""></p>

     <p>Win or Lose<br />
        <select name="winOrLose">
            <option value="Win">Win</option>
            <option value="Lose">Lose</option>
    </select>
    </p>

    <p>Home or Away<br />
        <select name="homeOrAway">
            <option value="Home">Home</option>
            <option value="Away">Away</option>
    </select>
    </p>

    <p>Regular or Post Season<br />
        <select name="regularOrPostSeason">
            <option value="Regular">Regular</option>
            <option value="Post">Post</option>
    </select>
    </p>

  <input type="submit" value="Submit">
</form>
</body>
</html>