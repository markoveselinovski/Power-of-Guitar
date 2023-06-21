<?php
    session_start();
    include("db_connect.php");

    //Login Variables
    $username = $_POST["username"];
    $password = $_POST["password"];

    //On-the-fly hashing of the password
    $password = sha1($password);

    //query
    $query = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'";

    //executing query
    $result = mysqli_query($conn, $query) or die(mysqli_error());

    $numRows = mysqli_num_rows($result);

    if($numRows == 0)
    {
        header("Location: ../index.php");
    }
    else
    {
        $_SESSION['user'] = $username;
        header("Location: admin.php");

    }
?>