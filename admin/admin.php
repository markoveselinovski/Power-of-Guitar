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

    <!--PRODUCT TABLE-->
        <div class="container py-5 mt-2 mb-5">
            <div class="d-flex justify-content-center mb-5">
                <a class="btn btn-lg btn-outline-success w-50" href="showorders.php">Check Orders</a>
                <a class="btn btn-lg btn-outline-info w-50" href="showmessages.php">Check Messages</a>
            </div>
   
            <h2 class="text-primary text-center">Products</h2>
            <div class="table-responsive border border-primary">
                <table class="table table-hover table-dark table-striped">
                    <thead>    
                        <tr>
                            <th>Instrument</th>
                            <th>Brand</th>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Photo1</th>
                            <th>Photo2</th>

                            <th class="text-right"><a href="add.php?action=add_product" type="button" class="btn btn-xs btn-primary">Add New Product <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = 'SELECT product.* , brand.name as bname, brand.bid , instrument.name as iname, instrument.iid FROM product,brand,instrument WHERE product.bid = brand.bid AND product.iid = instrument.iid';
                            $result = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $row['iname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['bname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <span class="d-inline-block text-truncate" style="max-width: 200px;">
                                        <?php echo $row['description'] ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $row['color'] ?>
                                </td>
                                <td>
                                    $<?php echo $row['price'] ?>
                                </td>
                                <td>
                                    <?php echo $row['photo1'] ?>
                                </td>
                                <td>
                                    <?php echo $row['photo2'] ?>
                                </td>
                                <td class="text-right">
                                <div class="btn-group">
                                    <a  type="button" class="btn btn-xs btn-warning font-weight-bold" href="edit.php?action=edit_product&pid='<?php echo $row["pid"]?>'">EDIT <i class="fas fa-edit"></i></a>
                                    <a  type="button" class="btn btn-xs btn-danger" href="transac.php?action=delete&type=product&pid='<?php echo $row["pid"]?>'">DELETE <i class="fas fa-trash"></i></a></td>
                                </div>            
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--BRAND TABLE-->
        <div class="container py-5 my-4">
            <h2 class="text-danger text-center">Brands</h2>
            <div class="table-responsive border border-danger">
                <table class="table table-hover table-dark table-striped">
                    <thead>    
                        <tr>
                            <th>Brand</th>
                            <th class="text-right"><a href="add.php?action=add_brand" type="button" class="btn btn-xs btn-primary">Add New Brand</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = 'SELECT * FROM brand';
                            $result = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td class="text-right">
                                <div class="btn-group">
                                    <a  type="button" class="btn btn-xs btn-warning font-weight-bold" href="edit.php?action=edit_brand&bid='<?php echo $row["bid"]?>'">EDIT <i class="fas fa-edit"></i></a>
                                    <a  type="button" class="btn btn-xs btn-danger" href="transac.php?action=delete&type=brand&bid='<?php echo $row["bid"]?>'">DELETE <i class="fas fa-trash"></i></a></td>
                                </div>            
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--INSTRUMENT TABLE-->
        <div class="container py-2 mb-5">
            <h2 class="text-warning text-center">Instruments</h2>
            <div class="table-responsive border border-warning">
                <table class="table table-hover table-dark table-striped">
                    <thead>    
                        <tr>
                            <th>Instrument</th>
                            <th>Instrument Family</th>
                            <th class="text-right"><a href="add.php?action=add_instrument" type="button" class="btn btn-xs btn-primary">Add New Instrument</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = 'SELECT instrument.name AS iname, family.name AS fname, iid, family.fid, instrument.fid FROM instrument,family WHERE family.fid=instrument.fid';
                            $result = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $row['iname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['fname'] ?>
                                </td>
                                <td class="text-right">
                                <div class="btn-group">
                                    <a  type="button" class="btn btn-xs btn-warning font-weight-bold" href="edit.php?action=edit_instrument&iid='<?php echo $row["iid"]?>'">EDIT <i class="fas fa-edit"></i></a>
                                    <a  type="button" class="btn btn-xs btn-danger" href="transac.php?action=delete&type=instrument&iid='<?php echo $row["iid"]?>'">DELETE <i class="fas fa-trash"></i></a></td>
                                </div>           
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>

    <?php 
    }//close admin check
    include("footer.php"); ?>
</html>