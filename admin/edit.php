<!DOCTYPE html>
<html>
    <?php 
        include("header.php");
        include("db_connect.php");
    ?>

    <body>
    <?php
		if(!isset($_SESSION['user']))
		{
			header("Location: logout.php");
		}
		else
		{	
    ?>

        <div class="container-fluid mt-2 py-2 pb-5 mb-5">
        <div class="d-flex justify-content-center">
            <?php

            $action = $_GET["action"];

            //EDIT PRODUCT
            if($action == "edit_product")
            {//if

                $query = 'SELECT * FROM product WHERE pid='.$_GET['pid'];
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result))
                {   //while open
                    $pid= $row['pid'];
                    $bid = $row['bid'];
                    $pname= $row['name'];
                    $description= $row['description'];
                    $color = $row['color'];
                    $price = $row['price'];
                    $photo1 = $row['photo1'];
                    $photo2 = $row['photo2'];
                }
            ?>
            <form class="border b3r border-primary p-5 text-center" role="form" method="post" action="transac.php?action=edit_product">
            <h2 class="text-center text-primary p-3">Edit Product</h2>
                <label for="brand" class="text-light font-weight-bold">Select Brand</label>
                <div class="form-group">
                    <select class="w-100" name="brand" value="<?php echo $bid?>" required>
                    <option selected disabled>Brand</option>
                    <?php
                        $query = "SELECT * FROM brand";
                        $result = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result))
                        {
                            echo ("<option value='".$row['bid']."'>".$row['name']."</option>");
                        }
                    ?>
                    </select>
                </div>
                <label for="instrument" class="text-light font-weight-bold">Select Instrument</label>
                <div class="form-group">
                    <select class="w-100" name="instrument" value="<?php echo $iid?>" required>
                    <option selected disabled>Instrument</option>
                    <?php
                        $query = "SELECT * FROM instrument";
                        $result = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result))
                        {
                            echo ("<option value='".$row['iid']."'>".$row['name']."</option>");
                        }
                    ?>
                    </select>
                </div>
                <div class='form-group'>
                    <input type='hidden' name='pid' value="<?php echo $pid?>">
                </div>
                <label for="name" class="text-light font-weight-bold">Name</label>
                <div class="form-group">
                    <input class="from-control w-100" type="text" placeholder="<?php echo $pname?>" value="<?php echo $pname?>" name="pname" >
                </div>
                <label for="description" class="text-light font-weight-bold">Description</label>
                <div class="form-group">                    
                    <textarea class="from-control w-100" rows="10" placeholder="<?php echo $description?>" value="<?php echo $description?>" name="description" ></textarea>
                </div>
                <label for="color" class="text-light font-weight-bold">Color</label>
                <div class="form-group">                    
                    <input class="from-control w-100" type="text" placeholder="<?php echo $color?>" value="<?php echo $color?>" name="color" >
                </div>
                <label for="price" class="text-light font-weight-bold">Price</label>
                <div class="form-group">
                    <input class="from-control w-100" type="text" placeholder="$<?php echo $price?>" value="<?php echo $price?>" name="price" >
                </div>
                <?php if($photo1 != NULL) { ?>
                <label for="photo1" class="text-light font-weight-bold">Photo1: <?php echo $photo1;?></label>
                <div class="form-group">
                    <img name="photo1" src="../images/<?php echo $photo1;?>" width="200px">
                </div>
                <?php } if($photo2 != NULL) { ?>
                <label for="photo2" class="text-light font-weight-bold">Photo2: <?php echo $photo2;?></label>
                <div class="form-group">
                    <img name="photo2" src="../images/<?php echo $photo2;?>" width="200px">
                </div>
                <?php }?>
                
                <div class="text-center">
                    <a class="btn btn-outline-success w-75" href="upload.php?pid=<?php echo $pid?>">Upload Image <i class="fas fa-file-upload"></i></a>
                    <button type="submit" class="btn btn-outline-primary w-100 my-2">Save Product <i class="fas fa-save"></i></button>
                    <button type="reset" class="btn btn-outline-info w-50">Reset <i class="fas fa-redo-alt"></i></button>
                <div>
            </form>


            <?php
            }//end if
            
            //EDIT BRAND
            if($action == "edit_brand")
            {//if

                $query = 'SELECT * FROM brand WHERE bid='.$_GET['bid'];
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result))
                {   //while open
                    $bid= $row['bid'];
                    $bname= $row['name'];
                }
            ?>
            <form class="border b3r border-danger p-5 text-center" role="form" method="post" action="transac.php?action=edit_brand">
            <h2 class="text-center text-danger p-2">Edit Brand</h2>
                <div class='form-group'>
                    <input type='hidden' name='bid' value="<?php echo $bid?>">
                </div>
                <div class="form-group">
                    <input class="from-control w-100" type="text" placeholder="<?php echo $bname?>" value="<?php echo $bname?>" name="bname" >
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary w-100 my-2">Save Brand <i class="fas fa-save"></i></button>
                    <button type="reset" class="btn btn-outline-info w-50">Reset <i class="fas fa-redo-alt"></i></button>
                <div>
            </form>


            <?php
            }//end if
            
            //EDIT INSTRUMENT
            if($action == "edit_instrument")
            {//if

                $query = 'SELECT * FROM instrument WHERE iid='.$_GET['iid'];
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result))
                {   //while open
                    $iid= $row['iid'];
                    $fid=$row['fid'];
                    $iname= $row['name'];
                }
            ?>
            <form class="border b3r border-warning p-5 text-center" role="form" method="post" action="transac.php?action=edit_instrument">
            <h2 class="text-center text-warning p-2">Edit Instrument</h2>
                <div class="form-group">
                    <select class="w-100" name="fid" value="<?php echo $fid?>" required>
                    <?php
                        $query = "SELECT * FROM family";
                        $result = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result))
                        {
                            echo ("<option value='".$row['fid']."'>".$row['name']."</option>");
                        }
                    ?>
                    </select>
                </div>
                
                <div class='form-group'>
                    <input type='hidden' name='iid' value="<?php echo $iid?>">
                </div>

                <div class="form-group">
                    <input class="from-control w-100" type="text" placeholder="<?php echo $iname?>" value="<?php echo $iname?>" name="iname" >
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary w-100 my-2">Save Instrument <i class="fas fa-save"></i></button>
                    <button type="reset" class="btn btn-outline-info w-50">Reset <i class="fas fa-redo-alt"></i></button>
                <div>
            </form>


            <?php
            }//end if

            ?>

        </div>

    </body>
    <?php
        }//close admin check
        include("footer.php");
    ?>

</html>