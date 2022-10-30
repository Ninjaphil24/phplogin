<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require '../vendor/autoload.php';
include 'config.php';
$msg = "";
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
    $code = mysqli_real_escape_string($conn, md5(rand()));
    if (mysqli_num_rows(mysqli_query($conn, "SELECT*FROM   users WHERE email='{$email}'")) > 0) {
        $msg = "<div class = 'alert alert-danger'>{$email} - This email is already in use!</div>";
    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO users (username, email,password,code) 
            VALUES ('{$username}','{$email}', '{$password}','{$code}')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<div style='display:none;'>";
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                try {
                //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                //Enable verbose debug output
                    $mail->isSMTP();
                //Send using SMTP
                    $mail->Host = 'smtp.gmail.com';
                //Set the SMTP server to send through
                    $mail->SMTPAuth = true;
                //Enable SMTP authentication
                    $mail->Username = 'automod24@gmail.com';
                //SMTP username
                    $mail->Password = 'phzneerhhwtwjfml';
                //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                //Enable implicit TLS encryption
                    $mail->Port = 465;
                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('automod24@gmail.com', 'Phil Mod');
                    $mail->addAddress($email);
                //Content
                    $mail->isHTML(true);
                //Set email format to HTML
                    $mail->Subject = 'Please do not reply to this email!';
                    $mail->Body = 'Please click on the following link to verify your registration <b><a href="http://localhost/phplogincest/?verification=' . $code . '">http://localhost/phplogincest/?verification=' . $code . '</a></b>';
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $msg = "<div class = 'alert alert-info'>We've sent a verification link to your email address.</div>";
            } else {
                $msg = "<div class = 'alert alert-danger>Something went wrong!</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password and Confirm Password don't match!</div>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="box">
        <h2>Registrierung</h2> <br>
        <?php echo $msg; ?>
        <form action="" method="post">
            <div class="inputBox">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>

            <div class="inputBox">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>

            <div class="inputBox">
                <input type="password" name="password" required>
                <label>Passwort</label>
            </div>

            <div class="inputBox">
                <input type="password" name="confirm-password" required>
                <label>Passwort bestätigen</label>
            </div>
            <div class="buttons">

          <button type="submit" name="submit" value="Submit">Registrieren</button>
          <a href="index.php">Login</a>
          </div>

        </form>

</div>



</body>
</html>
