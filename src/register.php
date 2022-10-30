<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
    <link rel="stylesheet" href="form.css">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
</head>
<body>
<div class="box">
        <h2>Registrierung</h2>
        <form action="">
            <div class="inputBox">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            
            <div class="inputBox">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>

            <div class="inputBox">
                <input type="text" name="password" required>
                <label>Passwort</label>
            </div>

            <div class="inputBox">
                <input type="text" name="confirm-password" required>
                <label>Passwort bestätigen</label>
            </div>
            <div class="buttons">
          
          <input type="submit" name="submit" value="Submit">
          <a href="index.php">Login</a>
          </div>
  
        </form>

</div>


    
</body>
</html>