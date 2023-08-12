<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["repassword"];

    require_once 'dbhinc.php';
    require_once 'funinc.php';

    if(emptyInputSingup($username,$email,$pwd)!== false){
        header("location: Sing up.php?error=emptyinput");
        exit();
    }
    if(invalidusername($username)!== false){
        header("location: Sing up.php?error=invalidusername");
        exit();
    }
    if(invalidEmail($email)!== false){
        header("location: Sing up.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd, $pwdRepeat)!== false){
        header("location: Sing up.php?error=invalidpassword");
        exit();
    }
    if(usernameExists($conn,$username,$email)!== false){
        header("location: Sing up.php?error=usernametaken");
        exit();
    }

    creatUser($conn, $username,$email,$pwd);

} else {
    header("location: Sing up.php");
    exit();
}
