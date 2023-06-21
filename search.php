<!DOCTYPE html>
<html>

    <?php include("header.php") ?>
    <body>
        

        <div class="container py-5">
            <h2 class='text-info text-center'>Results for "<?php echo $_GET["search"]?>"</h2>
            <div class="row">
            <?php 
                 include("db_connect.php");
                $query = "SELECT brand.name AS bname, brand.bid, product.* FROM product, brand WHERE product.bid = brand.bid AND (product.name LIKE '%".$_GET["search"]."%' OR brand.name LIKE '%".$_GET["search"]."%')";
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($result))
                { //while open
            ?>   
                <div class="col-md-4" title="<?php echo $row['name'] ?>">
                    <div class="card m-4 shadow bg-info">
                        <a id="cardlink" href="details.php?pid=<?php echo $row["pid"]?>">
                            <img class="card-img-top" style="height: 300px; width: 100%; display: block;" src="images/<?php echo $row['photo1'];?>">                    
                        </a>
                        <div class="card-body">
                            <h4 class="card-title text-light"><?php echo $row['bname'] ?></h4>
                            <h5 class="card-title text-light text-truncate"><?php echo $row['name'] ?></h5>
                            <p class="card-text line-clamp text-light"><?php echo $row['description']?></p>
                            <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-outline-light center" href="addtocart.php?pid=<?php echo $row['pid']."&name=".$row['name']."&price=".$row['price']; ?>">Add to Cart <i class="fas fa-cart-plus"></i></a>
                                    <p class='h5 text-light'>$<?php echo $row['price']?></p>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } //while close ?>
            </div><!--row close-->
        </div><!--container close-->    
    </body>
    <?php include("footer.php");?>
</html>