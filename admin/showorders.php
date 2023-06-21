<!DOCTYPE html>
<html>
    <?php include("header.php"); ?>
    <body>
    <?php
		if(!isset($_SESSION['user']))
		{
			header("Location: logout.php");
		}
		else
		{	
    ?>
        <div class="container my-5">
            <h2 class="text-success text-center">Placed Orders</h2>
            <div class="table-responsive border border-success">
                    <table class="table table-hover table-dark table-striped">
                        <thead>    
                            <tr>
                                <th>Order ID</th>
                                <th>Products</th>
                                <th>Customer Name</th>
                                <th>Customer Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>ZIP</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("db_connect.php");                            
                                $query = 'SELECT * FROM invoice';
                                $result = mysqli_query($conn,$query);
                                if(mysqli_num_rows($result)>0)
                                {//numrows open

                                    while($row = mysqli_fetch_assoc($result))
                                    {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row['oid'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['products'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['customer_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['customer_lastname'] ?>
                                    </td>
                                    <td>
                                            <?php echo $row['email'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['phone_number'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['address'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['city'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['country'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['zip'] ?>
                                    </td>
                                    <td>
                                        $<?php echo $row['total_price'] ?>
                                    </td>
                                    <td class="text-right">
                                        <a  type="button" class="btn btn-xs btn-danger" href="transac.php?action=delete&type=order&oid='<?php echo $row["oid"]?>'">DELETE</a> 
                                    </td>
                                    </td>
                                </tr>
                            <?php
                                }//while close
                            }//numrows close
                            else{
                                echo "<td colspan='11' class='text-center'>No orders</td>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <?php 
    } //close admin check
    include("footer.php");
     ?>
</html>