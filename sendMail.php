<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "randomcomicmailer";
 $conn = mysqli_connect($servername, $username, $password, $database);
 $sql = "SELECT Email from user";
 $result = $conn->query($sql);

 
 if ($result->num_rows > 0) {
    $random = (rand() % (2500 - 1)) + 1;
    $url = 'https://xkcd.com/'.$random.'/info.0.json';
    $json = file_get_contents($url);
    $json = json_decode($json);
    var_dump($json);
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo $row['Email'];
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vaibhavsahni2001@gmail.com';
        $mail->Password = 'tggyeswmljoahvya';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('vaibhavsahni2001@gmail.com');
        $mail->addAddress($row['Email']);
        $mail->isHTML(true);
        $mail->Subject = "Subscibed!!";
        $m = $row['Email'];
        $link = "http://localhost/project/unsubscribe.php?email='$m'";
        $mail->Body .= "<p>Dear user, </p> <h3>your subsciption is successfull<br></h3>";
        $mail->Body .= '<img src='.$json->img.'> <br>';
        $mail->Body .= '<a href=$link>UnSubscribe</a>';
        $mail->addStringAttachment(file_get_contents($json->img),'img_name.png');
        // $mail->Body = '<img src='.$json->img.'> <br>';
        // $mail->Body = "";
        $mail->send();
    }
  }
?>