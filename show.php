<!DOCTYPE html>
<html>

    <?php include("header.php") ?>
    <body>
        

        <div class="container py-5">
            <?php 
                include("db_connect.php");
                $action=$_GET["action"];

                if($action == "show_instruments")
                {//if open
                $query="SELECT * FROM instrument WHERE iid=".$_GET['iid'];
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($result))
                {
                    echo "<h1 class='display-4 text-warning text-center'>".$row['name']."s</h2>";
                    echo "<div class='row'>";
                }
                
                $query = "SELECT instrument.name as iname, brand.name AS bname, instrument.iid, brand.bid, product.* FROM product, brand, instrument WHERE product.iid = instrument.iid AND product.iid=".$_GET['iid']." AND product.bid=brand.bid ORDER BY product.name ASC";
                $result = mysqli_query($conn,$query);
                
                while($row = mysqli_fetch_array($result))
                { //while open
            ?>  
             
                <div class="col-md-4">
                    <div class="card m-4 shadow bg-warning">
                    <a id="cardlink" href="details.php?pid=<?php echo $row["pid"]?>">
                        <img class="card-img-top" style="height: 300px; width: 100%; display: block;" src="images/<?php echo $row['photo1'];?>">
                    </a>                        
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['bname'] ?></h4>
                            <h5 class="card-title"><?php echo $row['name'] ?></h5>
                            <p class="card-text line-clamp"><?php echo $row['description']?></p>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-sm btn-outline-dark center" href="addtocart.php?pid=<?php echo $row['pid']."&name=".$row['name']."&price=".$row['price']; ?>">Add to Cart <i class="fas fa-cart-plus"></i></a>
                                <p class='h5'>$<?php echo $row['price']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } //while close 
                }//if close

                if($action == "show_brands")
                {//if open
                $query="SELECT * FROM brand WHERE bid=".$_GET['bid'];
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($result))
                {
                    echo "<h1 class='display-4 text-danger text-center'>".$row['name']."</h2>";
                    echo "<div class='row'>";
                }
                
                $query = "SELECT brand.name AS bname, brand.bid, product.* FROM brand,product WHERE product.bid=brand.bid AND product.bid='".$_GET["bid"]."' ORDER BY product.name ASC";
                $result = mysqli_query($conn,$query);


                while($row = mysqli_fetch_array($result))
                { //while open
            ?>   
                <div class="col-md-4">
                    <div class="card m-4 shadow bg-danger">
                    <a id="cardlink" href="details.php?pid=<?php echo $row["pid"]?>">
                        <img class="card-img-top" style="height: 300px; width: 100%; display: block;" src="images/<?php echo $row['photo1'];?>">
                    </a>
                        <div class="card-body">
                            <h4 class="card-title text-light"><?php echo $row['bname'] ?></h4>
                            <h5 class="card-title text-light"><?php echo $row['name'] ?></h5>
                            <p class="card-text line-clamp text-light"><?php echo $row['description']?></p>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-sm btn-outline-light center" href="addtocart.php?pid=<?php echo $row['pid']."&name=".$row['name']."&price=".$row['price']; ?>">Add to Cart <i class="fas fa-cart-plus"></i></a>
                                <p class='h5 text-light'>$<?php echo $row['price']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } //while close 

                }//if close
            ?>
            </div><!--row close-->
        </div><!--container close-->    
    </body>
    <?php include("footer.php");?>
</html>