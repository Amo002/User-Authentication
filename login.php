<?php
require_once 'header.php';
?>

<div class="Log-in-form">
    <h1>Log In</h1>

    <div class="form">
    <form action="logininc.php" method="POST">
        <input type="text" name="username" placeholder="User Name/Email">
        <input type="password" name="password" placeholder="Password">
        <br>
        <button class='button-31' style="vertical-align:middle" type="submit" name="submit">Log In</button>
    </form>
    </div>
    <?php
if (isset($_GET["error"])) {

    if ($_GET["error"] == "emptyinput") {
        echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Fill in all fields!</p>";
    } else if ($_GET["error"] == "wronglogin") {
        echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Incorrect login information!</p>";
    }
}
?>
</div>







</body>

</html>