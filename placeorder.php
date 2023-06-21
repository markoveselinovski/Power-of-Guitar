<?php
    include("db_connect.php");

    

    $query = "INSERT INTO invoice VALUES(NULL,'".$_POST['products']."','".$_POST['total_price']."','".$_POST['customer_name']."','".$_POST['customer_lastname']."','".$_POST['email']."','".$_POST['phone_number']."','".$_POST['address']."','".$_POST['city']."','".$_POST['country']."','".$_POST['zip']."')";

    mysqli_query($conn,$query) or die("Error inserting".mysqli_error());

    include("emptycart.php");
    header("Location: index.php");
?>
