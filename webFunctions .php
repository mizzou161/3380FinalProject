<?php
//make the html page itself
function genHTML($title, $body, $stylesheet) {
	$html = <<<EOT
<!DOCTYPE html>
<html>
<head>
<title>$title</title>
<link rel="stylesheet" type="text/css" href="$stylesheet">
<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('form1');
    form.action = action;
    form.submit();
  }
</script>
</head>
<body>
$body
</body>
</html>
EOT;
	return $html;
}
//redirects to sent URL
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
//error page html util
function generateErrorPage($error) {
	$html = <<<EOT
<h1>Stats</h1>
<p>An error occurred: $error</p>
<p><a class='statButton' href='Games.html'>Add game</a><a class='statButton' href='index.php'>View games</a></p>
EOT;
	return $html;
	}
?>