<?php
    session_start();
    include("db_connect.php");
    $sid = session_id();

    $pid = $_GET["pid"];
    $name = $_GET["name"];
    $price = $_GET["price"];
    $date = date("Y-m-d H:i:s", time());

    $query = "INSERT INTO cart VALUES(NULL,'$sid',$pid,$price,'$date')";
    mysqli_query($conn,$query) or die("Error inserting".mysqli_error());

    header("Location: cart.php"); 
?>