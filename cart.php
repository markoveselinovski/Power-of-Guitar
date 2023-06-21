<!DOCTYPE html>
<html>

    <?php include("header.php") ?>
    <body>
        

    <div class="container py-5 mt-5>">
				<?php
                        include("db_connect.php");
                        $sid = session_id();
                        $query = "SELECT cart.*, product.*, brand.name AS bname FROM cart,product,brand WHERE cart.pid=product.pid AND brand.bid=product.bid";
                        $result = mysqli_query($conn,$query) or die(mysqli_error());
                        if(mysqli_num_rows($result) == 0)
                        {
                        ?>
                            <div class="d-flex justify-content-center">
                                <h2 class='text-danger text-align-center'>The Cart is Empty <i class="fa fa-shopping-cart"></i></h2>
                            </div>
                        <?php
                        }
                        else
                        {
                            $total = 0;
                            $products = "";
                        ?>
                            <h2 class="text-success text-center pb-2">Order Details</h2>
                            <div class="table-responsive">
                                <table class="table table-hover table-dark table-striped">
                                    <tr>
                                        <th class="text-danger">Brand</th>
                                        <th class="text-primary">Product</th>
                                        <th class="text-success">Price</th>
                                        <th></th>
                                    <?php
                                        while($row=mysqli_fetch_array($result))
                                        {//while open
                                        ?>
                                            <tr>
                                                <td><?php echo $row["bname"]?></td>
                                                <td><?php echo $row["name"]?></td>
                                                <td>$<?php echo $row["price"]?></td>
                                                <td><a href="details.php?pid=<?php echo $row['pid']?>"><img src='images/<?php echo $row["photo1"]?>' width="50px" height="50px"></td>
                                            </tr>
                                         <?php
                                            $total += $row["price"];
                                            $products .= $row["bname"]." ".$row["name"].", \n";
                                        }//while close
                                        ?>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td><b class="text-sucess">Total price: </b>$<?php echo $total?></td>
                                            <td><a href='emptycart.php' class='btn btn-lg btn-outline-danger'>Empty Cart <i class="fas fa-cart-arrow-down"></i></a></td>
                                        </tr>
                                                                
                                </table>
                                <a href="order.php?total_price=<?php echo $total;?>&products=<?php echo $products;?>" class="btn btn-lg btn-success w-100">Place Order <i class="fas fa-dollar-sign"></i></a>
                    <?php
                        }//else close // order.php?total_price=<?php echo $total."&products=".$products
                    ?>
            <a href="index.php" class="btn btn-lg btn-primary w-100 mt-3">Return to Catalog <i class="fas fa-home"></i></a>
            </div>		
	</div>   
    </body>
    <?php include("footer.php");?>
</html>