<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dobbmo</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>


    <div class="main-nav">
       
        <nav  class="shift"">
        <a href="index.php"><img src="LOGO.png" alt="Dobbmo Logo"></a> 
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                if(isset($_SESSION["useruid"])){
                    echo"<li><a href='logoutinc.php'>Log out</a></li>";
                }else{
                    echo"<li><a href='login.php'>Log In</a></li>";
                    echo"<li><a href='Sing up.php'>Sign Up</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>