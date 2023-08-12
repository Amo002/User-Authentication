<?php

function emptyInputSingup($username, $email, $pwd)
{

    $result = false;

    if (empty($username) || empty($email) || empty($pwd)) {

        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidusername($username)
{

    $result = false;


    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{

    $result = false;


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{

    $result = false;


    if ($pwd !== $pwdRepeat) {

        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $username, $email)
{
    $sql = "SELECT * FROM usert WHERE usersName = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: Sing up.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function  creatUser($conn, $username, $email, $pwd)
{
    $sql = "INSERT INTO usert (usersName,usersEmail,usersPwd) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: Sing up.php?error=stmtfaild");
        exit();
    }

    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: Sing up.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd)
{

    $result = false;

    if (empty($username) || empty($pwd)) {

        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists = $uidExists = usernameExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location:login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location:login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersName"];
        header("location:index.php");
        exit();
    }
}

function emptyInputaddgame($name, $price)
{

    $result = false;

    if (empty($name) || empty($price)) {

        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function gameExists($conn, $name, $price)
{
    $sql = "SELECT * FROM games WHERE name = ? OR price = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $price);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function  insertgame($conn, $name, $price)
{
    $sql = "INSERT INTO games (name,price) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:index.php?error=none");
    exit();
}
