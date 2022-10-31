<?php
include 'config.php';
?>

<title>Registrierung</title>
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
            <h4>Haben Sie schon Konto?</h4>
            <div class="buttons">
                <button type="submit" name="submit" value="Submit">Registrieren</button>
                <a href="index.php">Login</a>
            </div>

        </form>

    </div>



</body>

</html>