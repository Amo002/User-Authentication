<?php
require_once 'header.php';
?>

<div class="sing-up-form">
    <h1>Sing Up</h1>

    <div class="form">
        <form action="singupinc.php" method="POST">
            <input type="text" name="username" placeholder="User Name">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="repassword" placeholder="Repeat Password">
            <br>
            <button  class='button-31' type="submit" name="submit">Sign Up</button>
        </form>
    </div>
    <?php
if (isset($_GET["error"])) {

    if ($_GET["error"] == "emptyinput") {
        echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Fill in all fields!</p>";
    } else if ($_GET["error"] == "invalidusername") {
        echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Choose a proper username!</p>";
    } else if ($_GET["error"] == "invalidemail") {
        echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Choose a proper email!</p>";
    } else if ($_GET["error"] == "invalidpassword") {
        echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Passwords doesn't match!</p>";
    } else if ($_GET["error"] == "usernametaken") {
        echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Username already taken!</p>";
    } else if ($_GET["error"] == "stmtfaild") {
        echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Something went wrong,try again!</p>";
    } else if ($_GET["error"] == "none") {
        echo "<p style = 'text-align: center;font-size: 30px;color: #adb0fa; font-weight: bold;'>You have sigend up</p>";
    }
}
?>
</div>
</body>

</html>