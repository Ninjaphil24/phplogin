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
                <label>Email</label>
            </div>

            <div class="inputBox">
                <input type="password" name="password" required>
                <label>Passwort</label>
            </div>
            
        <div class="buttons">
          
        <button type="submit" name="login" value="Login">Login</button>
        <a href="register.php">Registrierung</a>
        </div>
        </form> <br>

</div>


    
</body>
</html>
