<?php
include 'config.php';
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php");
    die();
}
$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);

?>
    <div class="box">

        <div style="width:320px">
            <iframe src="https://giphy.com/embed/xUOrw1avEiJvQJlo76" width="320" height="320" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
        </div> <br>
        <h2><?php echo $row['username'] ?></h2> <br> <a href='logout.php'>Ausloggen</a>
    </div>
<?php ;
} ?>