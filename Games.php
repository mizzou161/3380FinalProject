<!DOCTYPE html>
//games landing page
<html>
<head>
<title>Add Game</title>
<link rel="stylesheet" type="text/css" href="CardinalsStats.css">
    <style>
        h1, h2, p {
            color: white;
        }
    </style>
</head>
<body>
<h1>Add Game</h1>
<form action="addGame.php" method="post">

<h2>Game Stats</h2>
<p>Game Opponent<br />
<input type="text" name="Versing" value="" placeholder="" maxlength="255" size="80"></p>
<p>Score<br />
<input type="number" name="CardScore" value="" min="0"></p>
<p>Opponent Score<br />
<input type="number" name="VersingScore" value="" min="0"></p>
<p>Date<br />
<input type="date" name="matchDate" value=""></p>
<p>Win or Lose<br />
<select name="win">
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
</body>
</html>
