<?php
    include("db_connect.php");
    $checklocation=0;
    switch($_GET["action"])
    {//switch open

        //ADD TO DATABASE
        case "add_product":
            $query = 'INSERT INTO product(bid,iid,name,description,color,price) VALUES('.$_POST['brand'].','.$_POST['instrument'].',"'.$_POST['pname'].'","'.$_POST['description'].'","'.$_POST['color'].'","'.$_POST['price'].'")';
            mysqli_query($conn,$query) or die(mysqli_error());
        break;

        case "add_brand":
            $query = "INSERT INTO brand(name) VALUES('".$_POST["bname"]."')";
            mysqli_query($conn,$query) or die(mysqli_error());
        break;
            
        case "add_instrument":
            $query = "INSERT INTO instrument(name,fid) VALUES('".$_POST["iname"]."','".$_POST['family']."')";
            mysqli_query($conn,$query) or die(mysqli_error());
        break;
        
        //UPDATE DATABASE
        case "edit_product":
            $query = 'UPDATE product SET bid="'.$_POST['brand'].'", iid="'.$_POST['instrument'].'", name="'.$_POST['pname'].'", description="'.$_POST['description'].'", color="'.$_POST['color'].'", price="'.$_POST['price'].'" WHERE pid='.$_POST['pid'];
            mysqli_query($conn,$query) or die(mysqli_error());
        break;

        case "edit_brand":
            $query = "UPDATE brand SET name='".$_POST["bname"]."' WHERE bid=".$_POST["bid"];
            mysqli_query($conn,$query) or die(mysqli_error());
        break;

        case "edit_instrument":
            $query = "UPDATE instrument SET name='".$_POST["iname"]."', fid='".$_POST["fid"]."' WHERE iid=".$_POST["iid"];
            mysqli_query($conn,$query) or die(mysqli_error());
        break;

        case "delete":
            if($_GET["type"]=="product")
            {
                $query = "DELETE FROM product WHERE pid=".$_GET['pid'];
                mysqli_query($conn,$query) or die(mysqli_error());
            }
            if($_GET["type"]=="brand")
            {
                $query = "DELETE FROM brand WHERE bid=".$_GET['bid'];
                mysqli_query($conn,$query) or die(mysqli_error());
            }
            if($_GET["type"]=="instrument")
            {
                $query = "DELETE FROM instrument WHERE iid=".$_GET['iid'];
                mysqli_query($conn,$query) or die(mysqli_error());
            }
            if($_GET["type"]=="order")
            {
                $query = "DELETE FROM invoice WHERE oid=".$_GET['oid'];
                mysqli_query($conn,$query) or die(mysqli_error());
                $checklocation=1;
            }
            if($_GET["type"]=="message")
            {
                $query = "DELETE FROM contact WHERE mid=".$_GET['mid'];
                mysqli_query($conn,$query) or die(mysqli_error());
                $checklocation=2;
            }
        break;

        //UPLOAD PHOTO

        case 'upload_image':
            $file_name = basename($_FILES["fileToUpload"]["name"]);

            if($_GET["type"]=="photo1")
            {
                $query = "UPDATE product SET photo1 ='".$file_name."' WHERE pid='".$_POST["pid"]."'";
                mysqli_query($conn, $query) or die(mysqli_error());
            }
            if($_GET["type"]=="photo2")
            {
                $query = "UPDATE product SET photo2 ='".$file_name."' WHERE pid='".$_POST["pid"]."'";
                mysqli_query($conn, $query) or die(mysqli_error());
            }

        break;    
    }//switch close

    if($checklocation==1)
    {
        header("Location: showorders.php");
    }
    else if($checklocation==2)
    {
        header("Location: showmessages.php");
    }
    else
    {
        header("Location: admin.php");
    }
?>