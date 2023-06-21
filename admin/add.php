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

        <div class="container my-2 py-2">
        <div class="d-flex justify-content-center">
            <?php

            $action = $_GET["action"];

            //ADD PRODUCT
            if($action == "add_product")
            {//if
            ?>
            <form class="border b3r border-primary p-5"role="form" method="post" action="transac.php?action=add_product">
            <h2 class="text-center text-primary mb-3">Add Product</h2>
                <div class="form-group">
                    <select name="brand" class="w-100" required>
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
                <div class="form-group">
                    <select name="instrument" class="w-100" required>
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

                <div class="form-group">
                    <input class="from-control w-100" type="text" placeholder="Name" name="pname" required>
                </div>
                <div class="form-group">
                    <textarea cols="23" rows="10" class="from-control w-100" placeholder="Description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <input class="from-control w-100" type="text" placeholder="Color" name="color" required>
                </div>
                <div class="form-group">
                    <input class="from-control w-100" type="text" placeholder="Price" name="price" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary w-100 my-2">Save Product <i class="fas fa-save"></i></button>
                    <button type="reset" class="btn btn-outline-info w-50">Reset <i class="fas fa-redo-alt"></i></button>
                <div>
            </form>

            <?php
            }//end if
            
            //ADD BRAND
            if($action == "add_brand")
            {//if
            ?>
            <form class="border b3r border-danger p-5" role="form" method="post" action="transac.php?action=add_brand">
            <h2 class="text-center text-danger mb-3">Add Brand</h2>

                <div class="form-group">
                    <input class="from-control w-100" type="text" placeholder="Brand Name" name="bname" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary w-100 my-2">Save Brand <i class="fas fa-save"></i></button>
                    <button type="reset" class="btn btn-outline-info w-50">Reset <i class="fas fa-redo-alt"></i></button>
                <div>
            </form>


            <?php
            }//end if
            
            //ADD INSTRUMENT
            if($action == "add_instrument")
            {//if
            ?>
            <form class="border b3r border-warning p-5" role="form" method="post" action="transac.php?action=add_instrument">
            <h2 class="text-center text-warning mb-3">Add Instrument</h2>
                <div class="form-group">
                    <select name="family" class="w-100">
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
                <div class="form-group">
                    <input class="from-control w-100" type="text" placeholder="Instrument Name" name="iname" required>
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