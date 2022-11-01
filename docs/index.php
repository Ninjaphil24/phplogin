<?php
include "config.php";
?>

<title>Login</title>
</head>

<body>
    <div class="box">
        <h2>Login</h2> <br>
        <?php echo $msg; ?>
        <form action="" method="post">

            <div class="inputBox">
                <input type="email" name="email" required>
                <label for="email">Email</label>
            </div>

            <div class="inputBox">
                <input type="password" name="password" required>
                <label for="password">Passwort</label>
            </div>

            <h4>Kein Konto?</h4>
            <div class="buttons">

                <button type="submit" name="login" value="Login"><label for="login">Login</label></button>
                <a href="register.php">Registrierung</a>

            </div>
        </form> <br>

    </div>



</body>

</html>