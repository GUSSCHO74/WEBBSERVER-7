<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	session_start();
	if (isset($_SESSION["username"]) && !empty($_SESSION["username"])) {
		echo "<h1>Välkommen!</h1>";
        echo "Du är inloggad som " . $_SESSION["username"] . ".";
        echo "<br><br><a href='logout.php'>Logga ut</a><br><br>";
	}
?>
<br><br>
 <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload" />
    <br><br>
    <input type="submit" value="Ladda upp" name="submit" />
</form>
</body>
</html>