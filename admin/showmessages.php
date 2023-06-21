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
            <h2 class="text-info text-center">Messages</h2>
            <div class="table-responsive border border-info">
                    <table class="table table-hover table-dark table-striped">
                        <thead>    
                            <tr>
                                <th>Message ID</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("db_connect.php");                            
                                $query = 'SELECT * FROM contact';
                                $result = mysqli_query($conn,$query);
                               
                                if(mysqli_num_rows($result)>0)
                                {//numrows open

                                while($row = mysqli_fetch_assoc($result))
                                {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row['mid'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['first_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['last_name'] ?>
                                    </td>
                                    <td>
                                            <?php echo $row['email'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['message'] ?>
                                    </td>
                                    <td class="text-right">
                                        <a  type="button" class="btn btn-xs btn-danger" href="transac.php?action=delete&type=message&mid='<?php echo $row["mid"]?>'">DELETE</a> 
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