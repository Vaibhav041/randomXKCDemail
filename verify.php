<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email'];
    $currOtp = $_POST['OTP'];
    $originalOtp = $_SESSION['otp'];
    if ($currOtp == $originalOtp) {  // if verified then subscribe the user
        // entry in database
        include("DB.php");
        $sql = "INSERT INTO `user` (`Email`) VALUES ('$email')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location: congrats.php');
        }
        else {
            echo "user already subscribed";
        }
    }
    else {
        echo "INVALID";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <title>Document</title> 
  <style>
    body {
        text-align:center;
    }
    .form {
        background-color: #fff;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px 20px;
            box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
    }
    #form-control {
            text-align: left;
            margin-bottom: 25px;
        }
        #form-control label {
            display: block;
            margin-bottom: 10px;
        }
        #form-control input {
            border: 1px solid #777;
            border-radius: 2px;
            font-family: inherit;
            padding: 10px;
            display: block;
            width: 95%;
        }
        button {
            background-color: #05c46b;
            border: 1px solid #777;
            border-radius: 2px;
            font-family: inherit;
            font-size: 21px;
            display: block;
            width: 100%;
            margin-top: 50px;
            margin-bottom: 20px;
        }
  </style> 
</head>
<body>
<div class="container">
    <h1>Verification</h1>
    <form class="form" action="/project/verify.php" method="post">
        <div id="form-control">
            <label for="email" class="label">Enter OTP</label>
            <input type="text" name="OTP" id="otp" class="input">
            <button>Verify OTP</button>
        </div>
    </form>
 </div>
</body>
</html>