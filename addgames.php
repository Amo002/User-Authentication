<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];

    include_once('dbhinc.php');
    include_once('funinc.php');

    if(emptyInputaddgame($name,$price)!== false){
        header("location: index.php?error=emptyinput");
        exit();
    }
    if(gameExists($conn, $name, $price)!== false){
        header("location: index.php?error=gameExists");
        exit();
    }
    
    insertgame($conn, $name,$price);

}else
{
    header("location:index.php");
    exit();
}