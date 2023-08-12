<?php
require_once 'dbhinc.php';
if ( isset($_POST['del']) && isset($_POST['id']) ) {
    $sql = "DELETE FROM games WHERE id = {$_REQUEST['id']}";

    if (mysqli_query($conn, $sql)) {
        header("location: index.php?error=delSuccessfully");
        exit();
      } else {
        header("location: index.php?error=delFailed");
        exit();
      }
      mysqli_close($conn);
}
