// Add styling only
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <title>Document</title>
  </head>
<body>
    <h1>UnSubscribed</h1>
<?php
$email = $_GET['email'];
// DELETE FROM `user` WHERE `user`.`Email` = 'vaibhav';
$servername = "localhost";
$username = "root";
$password = "";
$database = "randomcomicmailer";
$conn = mysqli_connect($servername, $username, $password, $database);
$sql = "DELETE FROM `user` WHERE `user`.`Email` = $email";
$result = mysqli_query($conn, $sql);
?>
</body>
</html>

