<!DOCTYPE html>
<html>

    <?php include("header.php") ?>
    <body>
        

        <div class="container mt-2 py-5 mb-5">
            <div class="row align-items-center">
            <?php 
                 include("db_connect.php");
                        
                $query = "SELECT brand.name AS bname, brand.bid, product.* FROM product, brand WHERE product.bid = brand.bid AND pid=".$_GET['pid'];
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($result))
                { //while open
            ?>   
                <div class="col-lg-6">
                <div id="carouselControls" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="carousel-image" src="images/<?php echo $row['photo1'];?>">
                        </div>
                        <div class="carousel-item">
                        <img class="carousel-image" src="images/<?php echo $row['photo2'];?>">                    
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                        <span class="fas fa-chevron-left text-dark"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                        <span class="fas fa-chevron-right text-dark"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="text-danger font-weight-bold"><?php echo $row["bname"];?></h2>
                    <h3 class="text-primary font-weight-italic"><?php echo $row["name"];?></h3>
                    <p class="lead text-info"><?php echo $row["description"]; ?></p>
                    <h1 class="lead text-light"><b>Color: </b> <?php echo $row["color"];?></h1>
                </div>
            </div><!--row close-->
            <div class="row align-items-center pt-3">
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-md btn-outline-success center w-50" href="addtocart.php?pid=<?php echo $row['pid']."&name=".$row['name']."&price=".$row['price']; ?>">Add to Cart <i class="fas fa-cart-plus"></i></a>
                        <p class='h3 text-success'><b>Price: </b>$<?php echo $row['price']?></p>
                    </div>
                </div>
            </div>
            <?php } //while close ?>
        </div><!--container close-->    
    </body>
    <?php include("footer.php");?>
</html>