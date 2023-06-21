<?php
    include("db_connect.php");

    $query = "INSERT INTO contact(first_name,last_name,email,message) VALUES('".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["email"]."','".$_POST["message"]."')";
    mysqli_query($conn,$query) or die(mysqli_error());

    mail("shlem56@gmail.com","test1","test1");

    header("Location: index.php");
?>