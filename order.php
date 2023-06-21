<!DOCTYPE html>
<html>
    <?php include("header.php");?>
    <body>
        <div class="container mt-4 py-5 border b3r border-info">
            <h2 class="text-center text-info mb-2">Order Details</h2>
            <form class="p-4" role="from" method="post" action="placeorder.php">
            <input type="hidden" name="total_price" value="<?php echo $_GET['total_price']?>">
            <input type="hidden" name="products" value="<?php echo $_GET['products']?>">
                <div class="from-group mb-2">
                    <div class="form-row">
						<div class="col">
                            <label for="customer_name" class="text-info font-weight-bold">First Name</label>
							<input class="form-control" type="text" placeholder="First Name" name="customer_name" required>
						</div>
						<div class="col">
                            <label for="customer_lastname" class="text-info font-weight-bold">Last Name</label>
							<input class="form-control" type="text" placeholder="Last Name" name="customer_lastname" required>
						</div>
					</div>
                </div>
                <label for="email" class="text-info font-weight-bold">Email</label>
                <div class="form-group mb-2">
                    <input class="form-control" type="email" placeholder="Email" name="email" required>
                </div>
                <label for="phone_number" class="text-info font-weight-bold">Phone Number</label>
                <div class="form-group mb-2">
                    <input class="form-control" type="tel" placeholder="Phone Number" name="phone_number" required>
                </div>
                <label for="address" class="text-info font-weight-bold">Address</label>
                <div class="form-group mb-2">
                    <input class="form-control" type="text" placeholder="Address" name="address" required>
                </div>
                <div class="from-group">
                    <div class="form-row mb-2">
						<div class="col">
                            <label for="city" class="text-info font-weight-bold">City</label>
							<input class="form-control" type="text" placeholder="City" name="city" required>
                        </div>
                        <div class="col">
                            <label for="country" class="text-info font-weight-bold">Country</label>
                            <?php include("country.php");?>
                        </div>
						<div class="col">
                            <label for="zip" class="text-info font-weight-bold">ZIP Code</label>
							<input class="form-control" type="text" placeholder="ZIP Code" name="zip" required>
						</div>
					</div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <span class="text-info h3">In your order: </span><span class="text-light"><?php echo $_GET["products"];?></span>
                    </div>
                    <div class="col-4">
                        <h3 class="text-light"><b class="text-success">Total Price: </b>$<?php echo $_GET['total_price']?></h3>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-success w-100 mt-5">Place Order <i class="fas fa-clipboard-check"></i></button>
                
            </form>
        </div>
    </body>
    <?php include("footer.php");?>
</html>