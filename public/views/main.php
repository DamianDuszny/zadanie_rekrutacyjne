<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./styles/main.css">
</head>
<body>
	<!-- SESSION CONTROLL BUTTONS -->
	<?php if(!isset($_SESSION["user"])){ include("./public/views/login_panel.php");}
	else echo "<button><a href=\"/zadanie/logout\">Wyloguj</a></button>";
	?>


<?php
@include($request.".php");

?>
</body>
</html>

