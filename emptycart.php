<?php
    session_start();
    include("db_connect.php");
    $sid = session_id();

    
    $query = "DELETE FROM cart WHERE sid='$sid'";
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    header("Location: cart.php"); 

    session_unset();
    session_destroy();
?>