<?php
  session_start();
?>

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
  if($_SESSION["username"] == "holros") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $sql = "INSERT INTO uploads (filename, user, uploadtime, snuskig)
    VALUES ('$filename', '" . $_SESSION["username"] . "', NOW(), TRUE)";
    $conn->query($sql);
  } 
    
  function fileDataForUpload($uploadUsername, $uploadFileName ){
    $FileLog = fopen("fileuploadinformation.txt", "a+") or die("Unable to open file!");
    fwrite($FileLog, $uploadUsername.";".$uploadFileName."\n");
    fclose($FileLog);
  }

  if($_SESSION["username"]){
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ".basename($_FILES["fileToUpload"]["name"])." has been uploaded.";
      fileDataForUpload($_SESSION["username"], basename($_FILES["fileToUpload"]["name"]) );
    }
    else {
      echo "Sorry, there was an error uploading your file.";
    }
    echo "<br><br><a href='logout.php'>Logga ut</a><br><br>";
  }
  else {
    echo "User is not logged in!";
  }
?>
</body>
</html>