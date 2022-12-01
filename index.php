<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpMailer/Exception.php';
    require 'phpMailer/PHPMailer.php';
    require 'phpMailer/SMTP.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $otp = rand(pow(10, 3), pow(10, 4) - 1);
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        
        // send mail
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vaibhavsahni2001@gmail.com';
        $mail->Password = 'tggyeswmljoahvya';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('vaibhavsahni2001@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Email Verification";
        $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>";
        $mail->send();

        
        // go to verification page
        header('Location: verify.php');
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
  <!-- <script src="script.js"></script> -->
 <div class="container">
    <h1>Subscribe to our mailing list</h1>
    <form class="form" action="/project/index.php" method="post">
        <div id="form-control">
            <label for="email" class="label">Enter your email</label>
            <input type="text" name="email" id="email" placeholder="Ex: abc@gmail.com" class="input">
            <button class="input"><span>Subscribe</span></button>
        </div>
    </form>
 </div>


</body>
</html>