<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "login");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require '../vendor/autoload.php';
// Initialize msg variable
$msg = "";
// On registration submit
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
                    $mail->Subject = 'Bitte antworten Sie nicht auf diese Email!';
                    $mail->Body = 'Bitte klicken Sie auf den folgenden Link, um Ihre Registrierung zu bestätigen 
                    <b><a href="http://localhost/phplogin/src/?verification=' . $code . '">
                    http://localhost/phplogin/src/?verification=' . $code . '</a></b>';
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $msg = "<div class = 'alert alert-info'>Wir haben einen Bestätigungslink 
                an Ihre E-Mail-Adresse gesendet. Bitte überprüfen Sie auch Ihren Spam-Ordner.</div>";
            } else {
                $msg = "<div class = 'alert alert-danger>Etwas ist schief gelaufen!</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Passwort und Passwort Bestätigung sind nicht gleich!</div>";
        }
    }
}

// On verification
if (isset($_GET['verification'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE users SET code = '' WHERE code='{$_GET['verification']}'");

        if ($query) {
            $msg = "<div class='alert alert-success'>Die Kontoverifizierung wurde 
            erfolgreich abgeschlossen! Sie können sich jetzt unten einloggen:</div>";
        }
    } else {
        header("Location: index.php");
    }
}

// On login

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (empty($row['code'])) {
            $_SESSION['SESSION_EMAIL'] = $email;
            header("Location: welcome.php");
        } else {
            $msg = "<div class='alert alert-info'>Bestätigen Sie zuerst Ihr Konto und versuchen Sie es erneut.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Falsche Email oder Passwort!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
