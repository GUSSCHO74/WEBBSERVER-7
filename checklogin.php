<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sho bror!</h1>
    <?php
        session_start();
        if (isset($_SESSION["username"]) && !empty($_SESSION["username"])) {
            echo "Du är inloggad som " . $_SESSION["username"] . ".";
        }
        else {
            echo "Du är inte inloggad wallah!";
        }    
    ?>
    <br><br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload" required/>
        <br><br>
        <input type="submit" value="Ladda upp" name="submit" />
    </form>
    <br><br><a href='logout.php'>Logga ut</a><br><br>
</body>
</html>